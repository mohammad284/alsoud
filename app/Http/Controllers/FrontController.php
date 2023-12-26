<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;
use App\Models\Certificate;
class FrontController extends Controller
{
    public function cerDetails($id)
    {
        $details = Certificate::with('eng','work')->find($id);
        return view('front.certificate.details',[
            'details' => $details
        ]);
    }
}
