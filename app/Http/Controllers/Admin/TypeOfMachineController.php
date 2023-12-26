<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\TypeOfMachine;
class TypeOfMachineController extends Controller
{
    // admin login 
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // all machines 
    public function machines()
    {
        $machines = TypeOfMachine::with('admin')->get();
        return view('dashboard.machines.machines',[
            'machines' => $machines
        ]);
    }
    public function addMachines(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $machines =  TypeOfMachine::create([
            'name' => $request->name,
            'admin_id' => Auth()->user()->id,
        ]);
        return redirect()->back()->withErrors("added successfully");
    }
    // update machine
    public function updateMachine(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $machine = TypeOfMachine::find($request->id);
        $machine->name = $request->name;
        $machine->save();
        return redirect()->back()->withErrors("updated successfully");
    }
    // delete machine
    public function deleteMachine($id)
    {
        TypeOfMachine::find($id)->delete();
        return redirect()->back()->withErrors("deleted successfully");
    }
}
