<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngWork extends Model
{
    use HasFactory;
    protected $fillable = [
        'eng_id',
        'work_id',
    ];

    public function work_name()
    {
        return $this->belongsTo('App\Models\TypeOfMachine', 'work_id', 'id');
    }
}
