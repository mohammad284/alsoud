<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'focal_point',
        'client_number',
        'client_name',
        'client_location',
        'eng_id',
        'work_id',
        'machine_id',
        'date',
        'note',
        'client_ID',
        'payment_id',
        'task_ID',
        'num_of_trainees',
        'price',
        'LPO',
        'LPO_num',
        'Quote',
        'Quote_num',
        'charge_base',
        'admin_id',
        'walk_in_costomer',
        'walk_in_costomer_num',
        'is_delete',
        'delete_reason',
        'end_task'
    ];
    public function eng_name()
    {
        return $this->belongsTo('App\Models\User', 'eng_id', 'id');
    }
    public function work_name()
    {
        return $this->belongsTo('App\Models\TypeOfWork', 'work_id', 'id');
    }
    public function charge_per()
    {
        return $this->belongsTo('App\Models\Charge', 'charge_base', 'id');
    }
    public function machine_name()
    {
        return $this->belongsTo('App\Models\TypeOfMachine', 'machine_id', 'id');
    }
    public function payment_method()
    {
        return $this->belongsTo('App\Models\TypeOfPayment', 'payment_id', 'id');
    }
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'admin', 'id');
    }
    public function updateTask()
    {
        return $this->hasOne('App\Models\UpdateTask', 'task_id', 'id');
    }
    public function certifications()
    {
        return $this->hasMany('App\Models\Certificate', 'task_id', 'id');
    }
}
