<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TypeOfMachine;
use App\Models\EngWork;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // profile
    public function myProfile()
    {
        $token = auth('api')->user();
        $user = User::with('works')->find($token->id);
        return response()->json([
            'status_code'=> 200, 
            'data' => $user
        ],200);
    }

    // update profile 
    public function updateProfile(Request $request)
    {

        $user = auth('api')->user();
        $validator = Validator::make($request->all(), [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'max:255'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone'    => ['required'],
            'address'  => ['required'],
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $data = [
            'name'     => $request->name,
            'email'    => $request->email,
            // 'password' => Hash::make($request['password']),
            'phone'    => $request->phone,
            'address'  => $request->address,
            'pdf_password' => $request->pdf_password
        ];
        $user->update($data);
        $scopeofWorks = EngWork::where('eng_id',$user->id)->delete();
        foreach($request->works as $work){
            $data = [
                'work_id' => $work,
                'eng_id' => $user->id
            ];
            EngWork::create($data);
        }
        $data = User::with('works')->find($user->id);
        return response()->json([
            'status_code'=> 200, 
            'data' => $data
        ],200);
    }
    public function updatePassword(Request $request)
    {
        $user = auth('api')->user();
        $hashedPassword = $user->password;
        if (\Hash::check($request->old_password , $hashedPassword )) {
            $user->password = bcrypt($request->password);
            User::where( 'id' , $user->id)->update( array( 'password' =>  $user->password));

            return response()->json([
                'status_code'=> 200, 
                'data' => 'password updated successfully',
            ],200);
        }else{
            return response()->json([
                'status_code'=> 404, 
                'message' => 'old password doesnt matched'], 404);
        }
    }
    // scopeOfWorks
    public function scopeOfWorks()
    {
        $data = TypeOfMachine::all();
        return response()->json([
            'status_code'=> 200, 
            'data' => $data
        ],200);
    }
    // all engs
    public function engs()
    {
        $engs = User::all();
        return response()->json([
            'status_code'=> 200, 
            'data' => ['engs' => $engs]
        ],200);
    }
}
