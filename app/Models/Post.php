<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'family_member_id',
        'title',
        'description',
        'gender',
        'budget',
        'date',
        'time',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function job(){
        return $this->hasOne(Job::class,'post_id');
    }

}
