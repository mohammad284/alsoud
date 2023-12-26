<?php

namespace App\Http\Controllers\Api;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacation;
use App\Models\VacationReason;
use App\Models\User;
use App\Models\Rebate;
use App\Models\Salary;
use Carbon\Carbon;
use App\Models\PayloadNot;
use App\Models\Notification;
use App\Models\Leave;
use Image;
use Validator;
use App\Helper\Helpers;
class VacationController extends Controller
{

    public function uplodeImage(Request $request)
    {
        if($request->file('image')){
            $image = $request->file('image');
            $input['name'] = $image->getClientOriginalName();
            $path = 'images/photo/';
            $destinationPath = 'images/photo/';
            $img = Image::make($image->getRealPath());
            $img->resize(1200, 1200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.time().$input['name']);
            $name = $path.time().$input['name'];
            // return response()->json([
            //     'status_code'=> 200, 
            //     'data' => $name
            // ],200);
            $domin = $_SERVER['SERVER_NAME'];
            return response()->json([
                'status_code'=> 200, 
                'data' => "$domin/$name"
            ],200);
        }
    }
    // get eng vacations
    public function engVacation()
    {
        if(request('page_size')){
            $page_size = request('page_size');
        }else{
            $page_size = 10;
        }
        Helpers::calc_salary();
        $user = auth('api')->user();      
        
        $vacation = Vacation::where('eng_id',$user->id)
        ->whereIn('type',['worthy','beginning'])
        ->orderBy('id', 'desc')->first();
        $now = Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now());
        if($now > $vacation['to_date']){ // add vacation + sallary 
            $last_vacation = Vacation::whereIn('type',['accept','worthy','beginning'])
            ->where('eng_id',$user->id)->orderBy('id', 'desc')->first();

            $new_vacation = new Vacation;
            $new_vacation->eng_id = $vacation->eng_id;
            $new_vacation->from_date = $vacation->to_date;
            $to_date = Carbon::createFromFormat('Y-m-d H:s:i', $vacation['to_date'])->addMonth(1);
            $new_vacation->to_date = $to_date;
            $new_vacation->type = 'worthy';
            $new_vacation->accept = 0;
            $new_vacation->num_of_day = 2.5;
            $new_vacation->rest = $last_vacation['rest'] + 2.5;
            $new_vacation->save();
        }
        // $vacations = Vacation::with('kind_of_leave','alternative')->where('eng_id',$user->id)
        // ->where('type','!=','beginning')
        // ->get();
        $pagination = self::pagination(Vacation::with('kind_of_leave','alternative')->where('eng_id',$user->id)
        ->where('type','!=','beginning')
        ->orderBy('id', 'desc')
        ->get(),$page_size );
        return response()->json([
            'status_code'=> 200, 
            'data' => [
                'nots' => $pagination->paginated,
                'total' => $pagination->total,
                'currentPage' => $pagination->currentPage,
                'last_page' => $pagination->last_page,
                'perPage' => $pagination->perPage,
            ]
        ],200);
        return response()->json([
            'status_code'=> 200, 
            'data' => ['vacations' => $vacations]
        ],200);
    }

    // get vacation by id
    public function vacation($id)
    {
        $vacation = Vacation::with('kind_of_leave','alternative')->find($id);
        return response()->json([
            'status_code'=> 200, 
            'data' => $vacation
        ],200); 
    }
    // rest vacation
    public function restVacation()
    {
        $user = auth('api')->user();
        $vacation = Vacation::where('eng_id',$user->id)
        ->whereIn('type',['worthy','beginning'])
        ->orderBy('id', 'desc')->first();
        return response()->json([
            'status_code'=> 200, 
            'data' => $vacation
        ],200);
    }
    // take vacation 
    public function takeVacation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from_date' => ['required'],
            'to_date'   => ['required'],
            'leave_id'  => ['required'],
            'alternative_eng' => ['required'],
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $vac_image = $request->image;
        $i = 0;
        $user = auth('api')->user();
        $last_vacation = Vacation::where('eng_id',$user->id)
        ->where('type','!=','request')
        ->orderBy('id', 'desc')->first();

        $startTime = Carbon::parse($request->from_date); // Replace with your start date or time
        $endTime = Carbon::parse($request->to_date);   // Replace with your end date or time
        $diffInDays = $endTime->diffInDays($startTime);
        // find num of days without friday and saturday
        while ($i <= $diffInDays) {
            $name_of_day = $startTime->format('l'); 
            if($name_of_day == 'Saturday' | $name_of_day == 'Friday'){
                $diffInDays-= 1;
            }
            $startTime->addDay(1);
            $i++;
        }
        $rest_of_leaves = $last_vacation->rest - $diffInDays;
        if($rest_of_leaves < 0){
            $discount_days = abs($rest_of_leaves);
            $rest_of_leaves = 0;
            $data = [
                'eng_id' => $user->id,
                'from_date' => $request->from_date,
                'to_date'   => $request->to_date,
                'type'      => 'request',
                'leave_id'  => $request->leave_id,
                'num_of_day'=> $diffInDays,
                'rest'      => $rest_of_leaves,
                'accept'    => 0,
                'reason'    => null,
                'note'      => $request->note,
                'alternative_eng' => $request->alternative_eng,
                'image' => $vac_image
            ];
            $vac = Vacation::create($data);
            // $data_rebate = [
            //     'eng_id' => $user->id,
            //     'vacation_id' => $vac->id,
            //     'num_of_day' => $discount_days,
            //     'discount' => 0,
            // ];
            // Rebate::create($data_rebate);
        }else{
            $data = [
                'eng_id' => $user->id,
                'from_date' => $request->from_date,
                'to_date'   => $request->to_date,
                'type'      => 'request',
                'leave_id'  => $request->leave_id,
                'num_of_day'=> $diffInDays,
                'rest'      => $rest_of_leaves,
                'accept'    => 0,
                'reason'    => null,
                'note'      => $request->note,
                'alternative_eng' => $request->alternative_eng,
                'image' => $vac_image
            ];
            $vac = Vacation::create($data);
        }
        $not = [
            'notification' => "تم طلب اجازة من قبل المهندس {$user->name}",
            'eng_id'  => $user->id,
            'admin_read' => 0,
            'to_admin' => 1
        ];
        $not = Notification::create($not);
        $payload = [
            'type' => 'vacation',
            'type_id' => $vac->id,
            'not_id' => $not->id
        ];
        PayloadNot::create($payload);
        return response()->json([
            'status_code'=> 200, 
            'data' => $vac
        ],200);
    }

    //  type of leaves
    public function leaves()
    {
        $leaves = Leave::all();
        return response()->json([
            'status_code'=> 200, 
            'data' => $leaves
        ],200);
    }
    private static function pagination($collection, $perPage )
    {
        $page = (int)request('page');

        $start = ($page == 1) ? 0 : ($page - 1) * $perPage;

        $total = $collection->count();

        $pages_count = (int)$total / (int)$perPage;

        $page_counter = is_double($pages_count) ? (int)$pages_count + 1 : $pages_count;

        $data['total'] = $total;

        $data['paginated'] = $page == 0 ? $collection : $collection->slice($start, $perPage);

        $data['currentPage'] = $page == 0 ? 1 : $page;

        $data['perPage'] = $perPage;

        $data['last_page'] = $pages_count >= 1 ? $page_counter : 1;

        return (object)$data;
    }
}
