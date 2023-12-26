<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Validator;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // all Admin
    public function admins()
    {
        $admins = Admin::where('status','admin')->get();
        return view('dashboard.admins.admin',[
            'admins' => $admins
        ]);
    }

    // add admin
    public function addAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'status' => 'admin',
            'password' => Hash::make($request['password']),
        ];
        Admin::create($data);
        return redirect()->back();
    }

    //delete admin
    public function deleteAdmin($admin_id){

        $admins = Admin::all();
        if(count($admins) == 1){
            return redirect()->back()->withErrors('there must be at least one admin');

        }else{
            $admin = Admin::where('id',$admin_id)->first();
            $admin->delete();
            return redirect()->back()->withErrors('The admin has been removed successfully');

        }
    }
    public function updateAdmin(Request $request){
        $admin = Admin::where('id',$request->id)->first();
        if ($admin->email != $request->email) {
            $simular_email = Admin::where('email',$request->email)->get();
            if (count($simular_email) > 0) {
                return redirect()->back()->withErrors('email has taken');
            }   
        }
        $validator = Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if($request->password == null){
            $data = [
                'name'          => $request['name'],
                'email'         => $request['email'],
            ];
        }else{
            $data = [
                'name'          => $request['name'],
                'email'         => $request['email'],
                'password'      => Hash::make($request['password']),
            ];
        }

        $admin->update($data);
        return redirect()->back()->withErrors('The admin has been modified successfully');

    }
}
