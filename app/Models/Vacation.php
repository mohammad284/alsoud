<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    use HasFactory;
    protected $fillable = [
        'eng_id',
        'from_date',
        'to_date',
        'type', //taken , worthy
        'leave_id',
        'num_of_day',
        'rest',
        'accept',//0 : request , 1:accept , 2 : rejected
        'reason',
        'note',
        'alternative_eng',
        'image'
    ];
    
    public function eng_name()
    {
        return $this->belongsTo('App\Models\User', 'eng_id', 'id');
    }

    public function details()
    {
        return $this->belongsTo('App\Models\VacationReason','vacation_id','id');
    }
    public function rebate()
    {
        return $this->hasOne('App\Models\Rebate','vacation_id','id');
    }
    public function kind_of_leave()
    {
        return $this->belongsTo('App\Models\Leave','leave_id','id');
    }
    public function alternative(){
        return $this->belongsTo('App\Models\User', 'alternative_eng', 'id');
    }
}
