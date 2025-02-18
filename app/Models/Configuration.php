<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $fillable = ['logo', 'video', 'companydetail', 'phone', 'email', 'address', 'facebook', 'twitter', 'youtube', 'instagram'];
}
