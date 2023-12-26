<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeOfPayment;
use Validator;
class TypeOfPaymentController extends Controller
{
    // admin login 
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    // all payments 
    public function payments()
    {
        $payments = TypeOfPayment::with('admin')->get();
        return view('dashboard.payments.payments',[
            'payments' => $payments
        ]);
    }
    public function addPayment(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'type'  => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $work =  TypeOfPayment::create([
            'type' => $request->type,
            'admin_id' => Auth()->user()->id,
        ]);
        return redirect()->back()->withErrors("added successfully");
    }
    // update Payment
    public function updatePayment(Request $request)
    {
        $payment = TypeOfPayment::find($request->id);
        $payment->type = $request->type;
        $payment->save();
        return redirect()->back()->withErrors("updated successfully");
    }
    // delete payments
    // delete Charge
    public function deletePayment($id)
    {
        $payment = TypeOfPayment::find($id)->delete();
        return redirect()->back()->withErrors("deleted successfully");
    }
}
