<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacation;
use App\Models\User;
use App\Models\Rebate;
use App\Models\Leave;
use App\Models\Salary;
use Carbon\Carbon;
use Helpers;
class VacationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        // Helper::calc_salary();
    }
    // get all engs vacations
    public function vacations()
    {
        Helpers::calc_salary();
        $vacations = Vacation::with('eng_name')->where('type','accept')->latest()->paginate(10);
        return view('dashboard.vacations.vacations',[
            'vacations' => $vacations
        ]);
    }
    // accept vacation
    public function acceptVacation($id)
    {
        $vacation = Vacation::find($id);
        $vacation->type = 'accept';
        $vacation->accept = 1;
        $leave_type = Leave::find($vacation->leave_id);
        $salary = User::find($vacation->eng_id)->salary;
        $vacation->save();
        $num_rebate_day = abs($vacation->num_of_day - $leave_type->off_days);
        $discount = $salary/30 * $num_rebate_day;
        $month_salary = Salary::whereMonth('created_at', '=', now()->month)
        ->where('eng_id',$vacation->eng_id)
        ->first();
        if($month_salary == null){
            $month_salary = Salary::create([
                'eng_id' => $vacation->eng_id,
                'total' => $salary,
                'net' =>  $salary,
            ]);
        }
        $month_salary->net = $month_salary->net - (int) $discount;
        $month_salary->save();
        $data = [
            'eng_id' => $vacation->eng_id,
            'vacation_id' => $vacation->id,
            'num_of_day' => $num_rebate_day,
            'discount' => (int) $discount
        ];
        Rebate::create($data);
        
        return redirect()->back()->withErrors("accepted successfully"); 
    }
    // get rebates
    public function rebates()
    {
        $rebates = Rebate::with('eng','vacation')->latest()->paginate(10);
        // return $rebates;
        return view('dashboard.rebates.rebates',[
            'rebates' =>$rebates
        ]);
    }

    // get all vacations request
    public function requestVacations()
    {
        $requests = Vacation::with('eng_name','kind_of_leave','alternative')
        ->where('type','request')->get();
        return view('dashboard.vacations.request-vacation',[
            'requests' => $requests
        ]);
    }

    // reject vacation
    public function rejecteVacation(Request $request)
    {
        $vacation = Vacation::find($request->id);
        $vacation->accept = 2;
        $vacation->reason = $request->reason;
        $vacation->type = 'rejected';
        $vacation->save();
        return redirect()->back()->withErrors("rejected successfully"); 
    }

    // Denied Vacations
    public function deniedVacations()
    {
        $rejects = Vacation::with('eng_name','kind_of_leave','alternative')
        ->where('type','rejected')->get();
        return view('dashboard.vacations.denied-vacation',[
            'rejects' => $rejects
        ]);
    }
}
