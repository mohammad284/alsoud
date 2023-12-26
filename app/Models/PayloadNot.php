<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayloadNot extends Model
{
    use HasFactory;
    protected $fillable = [
        'not_id',
        'type',
        'type_id',
    ];

    public function not()
    {
        return $this->belongsTo('App\Models\Notification','not_id','id');
    }
}
