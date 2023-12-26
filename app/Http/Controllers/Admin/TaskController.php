<?php

namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use App\Models\Task;
    use App\Models\PayloadNot;
    use App\Models\Certificate;
    use App\Models\Notification;
    use App\Models\User;
    use App\Models\TypeOfMachine;
    use App\Models\TypeOfPayment;
    use App\Models\TypeOfWork;
    use App\Models\Client;
    use App\Models\Charge;
    use Validator;
    use Dompdf\Dompdf;
    use PDF;
    use Illuminate\Support\Facades\View;
class TaskController extends Controller
{
   // admin login 
   public function __construct()
   {
       $this->middleware('auth:admin');
   }
   // tasks 
   public function tasks()
   {
        $tasks = Task::with('eng_name','work_name','machine_name','payment_method','charge_per')
        ->where('is_delete',null)
        ->latest()->paginate(10);
        // ->orderBy('id', 'desc')->get();
        return view('dashboard.tasks.tasks',[
            'tasks' => $tasks
        ]);
   }
   // Add Task Page
   public function addTask()
   {
        $engs = User::where('type','eng')->get();
        $machines = TypeOfMachine::all();
        $payments = TypeOfPayment::all();
        $works    = TypeOfWork::all();
        $charges    = Charge::all();
        return view('dashboard.tasks.add-tasks',[
            'engs'     => $engs,
            'machines' => $machines,
            'payments' => $payments,
            'works'    => $works,
            'charges'  => $charges,
        ]);
   }
   // save task
   public function saveTask(Request $request)
   {
    $validator = Validator::make($request->all(), [
        'focal_point'     => 'required',
        'client_name'     => 'required',
        'client_number'   => 'required',
        'client_location' => 'required',
        'eng_id'          => 'required',
        'work_id'         => 'required',
        'machine_id'      => 'required',
        'date'            => 'required',
        'payment_id'      => 'required',
        'num_of_trainees' => 'required',
        'price'           => 'required',
    ]);
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
    }
    $client_id = Task::latest('id')->pluck('client_id')->first() + 1;
    $task_ID = Task::latest('id')->pluck('client_id')->first() + 1;
    $year =  now()->format('Y');
    
    $data = [
        'client_name'     => $request->client_name,
        'client_number'   => $request->client_number,
        'focal_point'     => $request->focal_point,
        'client_location' => $request->client_location,
        'eng_id'          => $request->eng_id,
        'work_id'         => $request->work_id,
        'machine_id'      => $request->machine_id,
        'date'            => $request->date,
        'note'            => $request->note,
        'payment_id'      => $request->payment_id,
        'task_ID'         => "$task_ID/$year",
        'num_of_trainees' => $request->num_of_trainees,
        'price'           => $request->price,
        'LPO'             => $request->LPO,
        'LPO_num'         => $request->LPO_num,
        'Quote'           => $request->Quote,
        'Quote_num'       => $request->Quote_num,
        'walk_in_costomer'=> $request->walk_in_costomer,
        'walk_in_costomer_num'=> $request->walk_in_costomer_num,
        'charge_base'     => $request->charge_base,
        'admin_id'        => Auth()->user()->id,
        'client_ID'       => $client_id,
        'end_task'       => 0,
    ];
    $save = Task::create($data);
    // create notification with paylode 
    $not = [
        'notification' => 'تم ارسال مهمة تدريب جديدة',
        'eng_id'  => $save->eng_id,
        'admin_read' => 0,
        'to_admin' => 0
    ];
    $not = Notification::create($not);
    $payload = [
        'type' => 'tasks',
        'type_id' => $save->id,
        'not_id' => $not->id
    ];
    PayloadNot::create($payload);
    
    $previous_client = Client::where('client_name',$request->client_name)
    ->where('client_number',$request->client_number)
    ->where('focal_point',$request->focal_point)
    ->first();
    if($previous_client == null){
        $data_client =[
            'client_name'     => $request->client_name,
            'client_number'   => $request->client_number,
            'focal_point'     => $request->focal_point,
            'task_id'         => $save->id,
        ];
        Client::create($data_client);
    }

    $task = Task::with('eng_name','work_name','machine_name','payment_method','charge_per')
    ->find($save->id);
    $data_pdf = [
        'task' => $task,
    ];
    $pdf = Pdf::loadView('dashboard.pdf.task', $data_pdf);  
    $eng = User::find($request->eng_id);
    // return $eng;
    Mail::send('dashboard.emails.task', $data, function($message)use($data,$pdf,$eng ) {
        $message->to($eng['email'], 'alsaud')
        ->subject('NEW-TASk')
        ->attachData($pdf->output(), "alsaud.pdf");
    });
    return redirect()->back()->withErrors("added successfully");
   }
   // task details 
   public function detailsTask($id)
   {
        $task = Task::with('eng_name','work_name','machine_name','payment_method','charge_per','updateTask')
        ->where('id',$id)->first();
        return view('dashboard.tasks.details-task',[
            'task'=>$task
        ]);
   }
    // Edit Task
    public function editTask($id)
    {
        $task = Task::with('eng_name','work_name','machine_name','payment_method','charge_per')
        ->find($id);
        $engs = User::where('type','eng')->get();
        $machines = TypeOfMachine::all();
        $payments = TypeOfPayment::all();
        $works    = TypeOfWork::all();
        $charges    = Charge::all();
        return view('dashboard.tasks.edit-task',[
            'engs'     => $engs,
            'machines' => $machines,
            'payments' => $payments,
            'works'    => $works,
            'task'     => $task,
            'charges'  => $charges,
        ]);
    }
    // update Task
    public function updateTask (Request $request ,$id)
    {
        $validator = Validator::make($request->all(), [
            'focal_point'     => 'required',
            'client_name'     => 'required',
            'client_number'   => 'required',
            'client_location' => 'required',
            'eng_id'          => 'required',
            'work_id'         => 'required',
            'machine_id'      => 'required',
            'date'            => 'required',
            'payment_id'      => 'required',
            'num_of_trainees' => 'required',
            'price'           => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $data = [
            'client_name'     => $request->client_name,
            'client_number'   => $request->client_number,
            'focal_point'     => $request->focal_point,
            'client_location' => $request->client_location,
            'eng_id'          => $request->eng_id,
            'work_id'         => $request->work_id,
            'machine_id'      => $request->machine_id,
            'date'            => $request->date,
            'note'            => $request->note,
            'payment_id'      => $request->payment_id,
            'num_of_trainees' => $request->num_of_trainees,
            'price'           => $request->price,
            'LPO'             => $request->LPO,
            'LPO_num'         => $request->LPO_num,
            'Quote'           => $request->Quote,
            'Quote_num'       => $request->Quote_num,
            'walk_in_costomer'=> $request->walk_in_costomer,
            'walk_in_costomer_num'=> $request->walk_in_costomer_num,
            'charge_base'     => $request->charge_base,
        ];
        
        $task = Task::with('eng_name','work_name','machine_name','payment_method','charge_per')
        ->find($id);
        $task->update($data);
        $not = [
            'notification' => 'تم تعديل المهمة ',
            'type'    => 1,
            // 'payload' => $task->id,
            'eng_id'  => $task->eng_id,
            'admin_read' => 0,
            'to_admin' => 0
        ];
        $not = Notification::create($not);
        $payload = [
            'type' => 'tasks',
            'type_id' => $task->id,
            'not_id' => $not->id
        ];
        PayloadNot::create($payload);

        $data_pdf = [
            'task' => $task,
        ];
        $pdf = Pdf::loadView('dashboard.pdf.task', $data_pdf);  
        $eng = User::find($request->eng_id);
        
        Mail::send('dashboard.emails.task', $data, function($message)use($data,$pdf,$eng ) {
            $message->to($eng['email'], 'alsaud')
            ->subject('NEW-TASk')
            ->attachData($pdf->output(), "alsaud.pdf");
        });
      return redirect()->back()->withErrors("updated successfully");
    }
    // delete Task 
    public function deleteTask(Request $request)
    {

        $task = Task::where('id',$request->id)->first();
        $task->is_delete = 1;
        $task->delete_reason = $request->reason;
        $task->save();
        $eng = User::find($task->eng_id);
        $data = [
            'task' => $task
        ];
        Mail::send('dashboard.emails.deleted-task', $data, function($message)use($data,$eng ) {
            $message->to("mohammadhussein769@gmail.com", 'alsaud')
            ->subject('DELETED-TASk');
        });
        return redirect()->back();
    }
    // Deleted tasks 
    public function deletedTasks()
    {
        $tasks = Task::where('is_delete',1)->get();
        return view('dashboard.tasks.deleted-tasks',[
            'tasks' => $tasks
        ]);
        
    }

    // certifications task
    public function certificateTask($id)
    {
        $certificates = Certificate::with('eng')
        ->where('task_id',$id)
        ->latest()->paginate(10);
        return view('dashboard.certificates.certificates',[
            'certificates' => $certificates
        ]);
    }
    // ended tasks 
    public function endedTasks()
    {
        $tasks = Task::with('eng_name','work_name','machine_name','payment_method','charge_per')
        ->where('is_delete',null)
        ->where('end_task',1)
        ->latest()->paginate(10);
        // ->orderBy('id', 'desc')->get();
        return view('dashboard.tasks.tasks',[
            'tasks' => $tasks
        ]);
    }
}
