<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UpdateTask;
use App\Models\Task;
use App\Helper\Helpers;
class TaskController extends Controller
{
    // get eng tasks
    public function tasks(Request $request)
    {
        Helpers::calc_salary();
        $user = auth('api')->user();
        $tasks = Task::with('work_name','charge_per','machine_name','payment_method')
        ->where('eng_id',$user->id)
        ->where('end_task',$request->end_task)
        ->where('is_delete',null)
        ->get();
        return response()->json([
            'status_code'=> 200, 
            'data' => ['tasks' => $tasks]
        ],200);
    }

    // deletedTasks
    public function deletedTasks()
    {
        $user = auth('api')->user();
        $tasks = Task::with('work_name','charge_per','machine_name','payment_method')
        ->where('eng_id',$user->id)
        ->where('is_delete',1)
        ->get();
        return response()->json([
            'status_code'=> 200, 
            'data' => ['tasks' => $tasks]
        ],200);
    }

    // taskDetails
    public function taskDetails(Request $request)
    {
        $user = auth('api')->user();
        $task = Task::with('work_name','charge_per','machine_name','payment_method','certifications')
        ->where('eng_id',$user->id)->find($request->task_id);
        return response()->json([
            'status_code'=> 200, 
            'data' => $task
        ],200);
    }

    // update task from eng
    public function updateTask(Request $request)
    {
        $user = auth('api')->user();
        $task = Task::find($request->task_id);
        $data = [
            'client_location' => $request->client_location ,
            'date' => $request->date ,
            'note' => $request->note ,
            'num_of_trainees' => $request->num_of_trainees ,
        ];
        $updata = UpdateTask::where('task_id',$request->task_id)->first();
        if($updata == null){
            UpdateTask::create($data);
        }
        return response()->json([
            'status_code'=> 200, 
            'data' => 'updated successfully'
        ],200);
    }
    // end task 
    public function endTask($id)
    {
        $task = Task::find($id);
        $task->end_task = 1;
        $task->save();
        return response()->json([
            'status_code'=> 200, 
            'data' => 'done'
        ],200);
    }
}
