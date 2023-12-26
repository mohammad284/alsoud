<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Salary;
use App\Models\Rebate;
use App\Helper\Helpers;
use Carbon\Carbon;
use Dompdf\Dompdf;
use PDF;
use Illuminate\Support\Facades\Mail;
class SalaryController extends Controller
{
    public function salary()
    {
        $end_of_month = Carbon::now()->subMonth()->endOfMonth()->toDateString();
        if($end_of_month == now()->toDateString()){
            Helpers::send_salary();
        }
        if(request('page_size')){
            $page_size = request('page_size');
        }else{
            $page_size = 10;
        }
        Helpers::calc_salary();
        $eng = auth('api')->user();    
        // $salary = Salary::where('eng_id',$eng->id)->get(); ->orderBy('id', 'desc')->first();
        $pagination = self::pagination(Salary::where('eng_id',$eng->id)->orderBy('id', 'desc')->get(),$page_size );
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
    }
    // get salary ditails
    public function salaryDetails($id)
    {
        $eng = auth('api')->user(); 
        $salary = Salary::find($id);
        $data = Salary::with(['rebates.vacation' => function ($q) use ($salary){
            $q->with('kind_of_leave')->where('eng_id',$salary->eng_id)->whereMonth('created_at', '=', $salary['created_at']->month)->get();

        }])->find($id);
        return response()->json([
            'status_code'=> 200, 
            'data' => $data
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
    // public function salaryDetails($id)
    // {
    //     $eng = auth('api')->user(); 
    //     $salary = Salary::with(['salary'])->find($id);
    //     $rebates = Rebate::with('vacation.kind_of_leave')->whereMonth('created_at', '=', $salary['created_at']->month)
    //         ->where('eng_id',$eng->id)->get();
    //     $final = array_push( $salary, $rebates);
    //     return response()->json([
    //         'status_code'=> 200, 
    //         'data' => $final
    //     ],200); 
    // }
}
