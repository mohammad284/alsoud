<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = [
        'eng_id',
        'total',
        'net', // الصافي
    ];

    public function eng_name()
    {
        return $this->belongsTo('App\Models\User', 'eng_id', 'id');
    }
    public function rebates()
    {
        return $this->hasMany('App\Models\Rebate', 'eng_id', 'eng_id');
    }
}
