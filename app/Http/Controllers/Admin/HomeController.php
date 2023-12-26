<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\Task;
use App\Models\TypeOfMachine;
use App\Models\TypeOfPayment;
use App\Helper\Helpers;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Helpers::calc_salary();
        // dd(Auth()->user()->id);
        $eng_count = User::where('type','eng')->count();
        $tasks_count = Task::all()->count();
        $machine_count = TypeOfMachine::all()->count();
        $payment_methods = TypeOfPayment::all()->count();
        return view('dashboard.index',[
            'eng_count' => $eng_count,
            'tasks_count' => $tasks_count,
            'machine_count' => $machine_count,
            'payment_methods' => $payment_methods,
        ]);
    }
    // get notifications
}