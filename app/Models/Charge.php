<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'admin_id'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'admin_id', 'id');
    }
}
