<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'eng_id',
        'degree' , // 1 : success , 2 : fall
        'trainee_name',
        'trainee_phone',
        'company_name',
        'trainee_ID', // from controller 
        'from_date',
        'to_date',
        'number_of_days',
        'job_title',
        'machine_id',
        'certificate_code', // from controller 
        'QR_code', // from controller 
        'trainee_image',
        'front_ID_image',
        'back_ID_image',
        'front_driving_image',
        'back_driving_image',
        'other_certificate',
        'experience_certificate',
        'task_id'
    ];
    
    public function eng()
    {
        return $this->belongsTo('App\Models\User','eng_id','id');
    }
    public function machine()
    {
        return $this->belongsTo('App\Models\TypeOfMachine','job_title','id');
    }
    public function work()
    {
        return $this->belongsTo('App\Models\TypeOfWork','machine_id','id');
    }
    public function task()
    {
        return $this->belongsTo('App\Models\Task', 'task_id', 'id');
    }
}
