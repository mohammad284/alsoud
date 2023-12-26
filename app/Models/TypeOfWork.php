<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfWork extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'number',
        'admin_id'
    ];
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'admin_id', 'id');
    }
}
