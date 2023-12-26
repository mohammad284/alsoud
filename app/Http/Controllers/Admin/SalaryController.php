<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rebate;
use App\Models\Salary;
class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // get history for salaries
    public function salaries()
    {
        $salaries = Salary::with('eng_name')->get();
        return view('dashboard.salary.salaries',[
            'salaries' => $salaries
        ]);
    }
    // salary details
    public function salaryDetails($id)
    {
        $salary = Salary::find($id);
        $details = Rebate::with('vacation.kind_of_leave')->whereMonth('created_at', '=', $salary['created_at']->month)
            ->where('eng_id',$salary->eng_id)->get();
        return view('dashboard.salary.details',[
            'details' => $details
        ]);
    }
    // go to date 
    public function goToDateForSalary(Request $request)
    {
        $start =  date('d-m-Y', strtotime($request->date));
        $timestamp = strtotime($start);
        $month = date('m', $timestamp);
        $years = date('Y', $timestamp);

        $salaries = Salary::with('eng_name')
        ->whereMonth('created_at', '=',$month)
        ->whereYear('created_at', '=',$years)
        ->get();
        return view('dashboard.salary.salaries',[
            'salaries' => $salaries
        ]);
    }
}
