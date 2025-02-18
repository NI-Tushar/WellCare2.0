<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMamber extends Model
{
    use HasFactory;

    protected $fillable = [
        'relation',
        'user_id',
        'nid_name',
        'nid_number',
        'nid_image',
        'address',
    ];
}
