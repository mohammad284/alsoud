<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
class NotificationControlller extends Controller
{
    // admin login 
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // all notifications
    public function nots()
    {
        $nots = Notification::where('admin_read',0)->update(['admin_read' => 1]);
        $nots = Notification::with('payload','eng')->latest()->paginate(10);
        // return $nots;
        return view('dashboard.notification',[
            'nots' => $nots
        ]);
    }
}
