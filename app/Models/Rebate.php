<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rebate extends Model
{
    use HasFactory;
    protected $fillable = [
        'eng_id',
        'vacation_id',
        'num_of_day',
        'discount',
    ];


    public function eng()
    {
        return $this->belongsTo('App\Models\User','eng_id','id');
    }
    public function vacation()
    {
        return $this->belongsTo('App\Models\Vacation','vacation_id','id');
    }
    public function salary()
    {
        return $this->belongsTo('App\Models\Salary','id','id');
    }
}
