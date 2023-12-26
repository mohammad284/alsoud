<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'notification',
        // 'type', // 1 : tasks not , 2 : salary nots , 3 : management not
        'eng_id',
        'admin_read',
        'to_admin'
    ];

    public function eng()
    {
        return $this->belongsTo('App\Models\User','eng_id','id');
    }
    public function payload()
    {
        return $this->hasOne('App\Models\PayloadNot','not_id','id');
    }
}
