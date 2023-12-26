<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Charge;
class ChargePerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // all charge per
    public function charges()
    {
        $charges = Charge::with('admin')->get();
        return view('dashboard.charge.charge',[
            'charges' => $charges
        ]);
    }
    // add charge per
    public function addCharge(Request $request)
    {
        $data = [
            'name'  => $request->name,
            'admin_id' => Auth()->user()->id,
        ];
        Charge::create($data);
        return redirect()->back()->withErrors("added successfully");
    }
    // update Charge
    public function updateCharge(Request $request)
    {
        $charge = Charge::find($request->id);
        $data = [
            'name'  => $request->name,
        ];
        $charge->update($data);
        return redirect()->back()->withErrors("updated successfully");
    }
    // delete Charge
    public function deleteCharge($id)
    {
        $charge = Charge::find($id)->delete();
        return redirect()->back()->withErrors("deleted successfully");
    }
}
