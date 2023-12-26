<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Image;
class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //  all setting
    public function setting()
    {
        $setting = Setting::first();
        return view('dashboard.setting.setting',[
            'setting' => $setting
        ]);
    }
    // change Setting
    public function change_setting(Request $request)
    {
        $setting = Setting::first();
        if($request->file('logo')){
            $image=$request->file('logo');
            $input['logo'] = $image->getClientOriginalName();
            $path = 'images/';
            $destinationPath = 'images/';
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.time().$input['logo']);
            $name = $path.time().$input['logo'];
            
            $data['image'] =  $name;
            $setting->logo = $data['image'];
        }
        
        $setting->title = $request->title;        
        $setting->save();
        return redirect()->back()->withErrors("Changed successfully");
    }
}
