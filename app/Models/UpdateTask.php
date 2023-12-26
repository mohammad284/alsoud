<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateTask extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_id',
        'client_location',
        'date',
        'note',
        'num_of_trainees',
        'eng_id',
    ];

    public function eng_name()
    {
        return $this->belongsTo('App\Models\User', 'eng_id', 'id');
    }

    public function task()
    {
        return $this->belongsTo('App\Models\Task', 'task_id', 'id');
    }
}
