<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeOfWork;
use Validator;
class TypeOfWorkController extends Controller
{
    // admin login 
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // all work
    public function works()
    {
        $works = TypeOfWork::with('admin')->get();
        return view('dashboard.works.works',[
            'works' => $works
        ]);
    } 
    // add new work 
    public function addWork ( Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'type'  => 'required',
            'number'  => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $work =  TypeOfWork::create([
            'type' => $request->type,
            'number' => $request->number,
            'admin_id' => Auth()->user()->id,
        ]);
        return redirect()->back()->withErrors("added successfully");
    }

    // update work 
    public function updateWork(Request $request)
    {
        $work = TypeOfWork::find($request->id);
        $work->type = $request->type;
        $work->number = $request->number;
        $work->save();
        return redirect()->back()->withErrors("updated successfully");
    }
}
