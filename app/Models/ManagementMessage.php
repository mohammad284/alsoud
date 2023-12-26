<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementMessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'admin_id'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'admin_id', 'id');
    }
    public function replies()
    {
        return $this->hasMany('App\Models\EngMessage','msg_id','id');
    }
}
