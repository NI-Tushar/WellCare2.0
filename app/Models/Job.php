<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'giver_id',
        'taker_id',
        'post_id'
    ];
    public function post(){
        return $this->belongsTo(Job::class,'post_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'giver_id');
    }
}
