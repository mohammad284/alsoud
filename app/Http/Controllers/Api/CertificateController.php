<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use App\Models\Task;
use App\Models\Certificate;
use Image;
use URL;
use Validator;
class CertificateController extends Controller
{
    public function QR($id)
    {
        $url = URL::to("/");
        $request = $id;
        $image = QrCode::format('png')->size(300)->generate("$url/cerDetails/$request");
        $output_file = 'images/Qr-code/'.time() .$request. '.png';
        $file = Storage::disk('local')->put($output_file, $image);
        return $output_file;
    }

    // public function uplodeImage($file,$name)
    // {
    //     if($file != null){
    //         $image = $file;
    //         $input['name'] = $image->getClientOriginalName();
    //         $path = 'images/certificates/';
    //         $destinationPath = 'images/certificates/';
    //         $img = Image::make($image->getRealPath());
    //         $img->resize(1200, 1200, function ($constraint) {
    //             $constraint->aspectRatio();
    //         })->save($destinationPath.'/'.time().$input['name']);
    //         $name = $path.time().$input['name'];
    //         return $name;
    //     }
    // }
    // get certificate sending by eng_id
    public function engCertificates()
    {
        $user = auth('api')->user();
        $certificates = Certificate::where('eng_id',$user->id)
        ->get();
        return response()->json([
            'status_code'=> 200, 
            'data' => ['certificates' => $certificates]
        ],200);
    }

    // send new certificate 
    public function sendCertificate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_id' => ['required'],
            'degree'   => ['required'],
            'trainee_name'  => ['required'],
            'trainee_phone' => ['required'],
            'company_name' => ['required'],
            'from_date' => ['required'],
            'to_date' => ['required'],
            'number_of_days' => ['required'],
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $task = Task::find($request->task_id);
        $user = auth('api')->user();
        $trainee_image = $request->trainee_image;
        $front_ID_image =$request->front_ID_image;
        $back_ID_image = $request->back_ID_image;
        $front_driving_image = $request->front_driving_image;
        $back_driving_image  = $request->back_driving_image;
        $other_certificate   = $request->other_certificate;
        $experience_certificate = $request->experience_certificate;
        
        $data = [
            'eng_id'        => $user->id,
            'task_id'       => $request->task_id,
            'degree'        => $request->degree,
            'trainee_name'  => $request->trainee_name,
            'trainee_phone' => $request->trainee_phone,
            'company_name'  => $request->company_name,
            'from_date'     => $request->from_date,
            'to_date'       => $request->to_date,
            'number_of_days' => $request->number_of_days,
            'job_title'     => $task->work_id,
            'machine_id'    => $task->machine_id,
            'trainee_image' => $trainee_image,
            'front_ID_image' => $front_ID_image,
            'back_ID_image' => $back_ID_image,
            'front_driving_image' => $front_driving_image,
            'back_driving_image' => $back_driving_image,
            'other_certificate' => $other_certificate,
            'experience_certificate' => $experience_certificate,
        ];
        $cer = Certificate::create($data);
        $trainee_ID = "ASUD-TR-$cer->id";
        $certificate_code = "ASUD-C-$cer->id";
        $qr_code = $this->QR($cer->id);
        $cer->QR_code = $qr_code;
        $cer->trainee_ID = $trainee_ID;
        $cer->certificate_code = $certificate_code;
        $cer->save();

        return response()->json([
            'status_code'=> 200, 
            'data' => $cer
        ],200);
    }
}