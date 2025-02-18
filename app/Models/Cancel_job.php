<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancel_job extends Model
{
    use HasFactory;
    protected $table = 'cancel_job';
    protected $primaryKey = 'id';
}