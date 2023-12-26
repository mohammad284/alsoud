<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngMessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'eng_id',
        'msg_id',
        'status', // 1 accept , 0 reject
        'reason'
    ];

    public function message()
    {
        return $this->belongsTo('App\Models\ManagementMessage','msg_id','id');
    }
    public function eng()
    {
        return $this->belongsTo('App\Models\User','eng_id','id');
    }
}
