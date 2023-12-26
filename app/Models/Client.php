<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_name',
        'client_number',
        'focal_point',
        'task_id'
    ];

    public function tasks()
    {
        return $this->belongsTo('App\Models\Task','task_id','id');
    }
}
