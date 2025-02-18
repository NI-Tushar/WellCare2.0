<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serviceoffer extends Model
{
    use HasFactory;
    protected $table = 'service_offer';
    protected $primaryKey = 'id';

    public function user(){
        return $this->belongsTo(User::class,'taker_id');
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function taker(){
        return $this->belongsTo(User::class,'taker_id');
    }
    public function giver(){
        return $this->belongsTo(User::class,'giver_id');
    }
}
