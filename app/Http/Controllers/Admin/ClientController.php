<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
class ClientController extends Controller
{
    // admin login 
   public function __construct()
   {
       $this->middleware('auth:admin');
   }
   public function clients()
    {
        $clients = Client::with('tasks')->get();
        return view('dashboard.clients.clients',[
            'clients' => $clients
        ]);
    }
    // delete Client
    public function deleteClient($id)
    {
        Client::find($id)->delete();
        return redirect()->back()->withErrors("deleted successfully");
    }

    // search Client
    public function searchClient(Request $request)
    {
        $query = $request->input('query');

        $customers = Client::where('client_name', 'like', '%'.$query.'%')
            ->get();

        return response()->json($customers);
    }

    public function show($id)
    {
        $customer = Client::findOrFail($id);

        return response()->json($customer);
    }

}
