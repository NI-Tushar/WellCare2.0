<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update_user_info extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $primaryKey = "id";

}
