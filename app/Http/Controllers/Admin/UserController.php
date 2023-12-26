<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EngWork;
use App\Models\User;
use App\Models\ProviderLicence;
use Validator;
use App\Models\Vacation;
use App\Models\Salary;
use App\Models\Task;
use App\Models\TypeOfMachine;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // engineers
    public function engineers()
    {
        $engs = User::with('works.work_name')->where('type','eng')->get();
        // return $engs;
        return view('dashboard.users.engineers',[
            'engs' => $engs,
        ]);
    }
    // enginer add page
    public function addEngineer()
    {
        $machines = TypeOfMachine::all();
        return view('dashboard.users.add-eng',[
            'machines' => $machines
        ]);
    }
    // save engineer
    public function saveEngineer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email'  => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'  => ['required', 'unique:users'],
            'works'  => 'required',
            'salary'  => ['required', 'Numeric'],
            // 'job_id'  => ['required', 'unique:users'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()); 
            // return response()->json($validator->errors());
        }
        $eng = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'job_id'   => $request->job_id,
            'salary'   => $request->salary,
            'type'     => 'eng',
            'password' => Hash::make('0000'),
            'pdf_password' => 0000,
        ]);
        foreach($request->works as $work){
            $data = [
                'work_id' => $work,
                'eng_id' => $eng->id
            ];
            EngWork::create($data);
        }
        $vacation = [
            'eng_id' => $eng->id,
            'from_date' => $eng->created_at,
            'to_date' => $eng->created_at->addMonth(1),
            'type' => 'beginning',
            'num_of_day' => 0,
            'rest' => 0,
            'accept'=>0
        ];
        Vacation::create($vacation);
        Salary::create([
            'eng_id' => $eng->id,
            'total' => $request->salary,
            'net' =>  $request->salary,
        ]);
        return redirect('/admin/engineers');
    }
    // tasks engineer 
    public function tasksEngineer($id)
    {
        $eng = User::find($id);
        $tasks = Task::with('work_name','machine_name','payment_method')
        ->where('eng_id',$id)->get();
        return view('dashboard.users.tasks-engineer',[
            'tasks' => $tasks,
            'eng'   => $eng
        ]);
    }
    // Edit Enginner 
    public function EditEngineer($id)
    {
        $eng = User::with('works')->find($id);
        $machines = TypeOfMachine::all();
        // return $eng['works'];
        return view('dashboard.users.edit-enginner',[
            'eng' =>$eng,
            'machines'=>$machines
        ]);
    }
    // update Enginner
    public function updateEngineer(Request $request , $id)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email'  => ['required', 'string', 'email', 'max:255'],
            'phone'  => ['required'],
            'works'  => 'required',
            'salary'  => ['required', 'Numeric'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()); 
        }
        $eng = User::find($id);
        $eng->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'job_id' => $request->job_id,
            'salary' => $request->salary,
            'type' => 'eng'
        ]);
        
        $works = EngWork::where('eng_id',$id)->delete();
        foreach($request->works as $work){
            $data = [
                'work_id' => $work,
                'eng_id' => $eng->id
            ];
            EngWork::create($data);
        }
        $salary = Salary::find($eng->id);
        if($salary == null){
            Salary::create([
                'eng_id' => $eng->id,
                'total' => $request->salary,
                'net' =>  $request->salary,
            ]);
        }
        return redirect('/admin/engineers');
    }

    // get all vacations and rebates for eng
    public function vacRabEngineer($id)
    {
        $vacations = Vacation::with('rebate')
        ->where('type','!=','beginning')
        ->where('eng_id',$id)->get();
        // return $vacations;
        return view('dashboard.users.vacatios-eng',[
            'vacations' => $vacations
        ]);
    }

}
