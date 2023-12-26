<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ManagementMessage;
use App\Models\Notification;
use App\Models\PayloadNot;
use App\Models\User;
class ManagementController extends Controller
{
    // admin login 
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // get all management message 
    public function managementMessage()
    {
        $messages = ManagementMessage::with('admin','replies.eng:id,email')
        ->latest()->paginate(10);
        $count = ManagementMessage::count();
        return view('dashboard.management.messages',[
            'messages' => $messages,
            'count' => $count
        ]);
    }

    // get Send form 
    public function sendTemplate()
    {
        $count = ManagementMessage::count();
        return view('dashboard.management.send-message',[
            'count' => $count
        ]);
    }

    // send management message 
    public function sendMessage(Request $request)
    {
        $engs =  User::where('type','eng')->get();
        $request->validate([
            'title'   => 'required',
            'body'   => 'required',
        ]);
        $payload = ManagementMessage::create([
            'title' => $request->title,
            'body' => $request->body,
            'admin_id' => Auth()->user()->id,
        ]);
        foreach($engs as $eng){
            $not = [
                'notification' => 'تم ارسال رسالة جديدة من الادارة',
                'eng_id'  => $eng->id,
                'admin_read' => 0,
                'to_admin' => 0
            ];
            $not = Notification::create($not);
            $paylo = [
                'type' => 'management',
                'type_id' => $payload->id,
                'not_id' => $not->id
            ];
            PayloadNot::create($paylo);
        }
        
        return redirect('/admin/managementMessage');
    }

    
}
