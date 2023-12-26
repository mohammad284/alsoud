<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivacyTerm;
class PrivacyController extends Controller
{
    // admin login 
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function privacy()
    {
        $privacy = PrivacyTerm::first();
        return view('dashboard.privacy',[
            'privacy' => $privacy
        ]);
    }
    // upload file
    public function changePrivacy(Request $request)
    {
        if($request->hasFile('file')){
            
            $file=$request->file('file');
            $input['file'] = $file->getClientOriginalName();
            $path = 'files';
            $path=$file->storeAs($path,$input['file']);
            $name = $path;
           $data['file'] =  $name;
        }
        $privacy = PrivacyTerm::first();
        $privacy->file = $data['file'];
        $privacy->save();
        return redirect()->back();
    }
    
    // download files
    public function downloadFile()
    {
        $file_path = PrivacyTerm::first();
        $filePath = public_path($file_path->file);
        $headers = ['Content-Type: application/pdf'];
        $fileName = time().'.pdf';

        return response()->download($filePath, $fileName, $headers);
    }
}
