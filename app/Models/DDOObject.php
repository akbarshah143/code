<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DDOObject extends Model
{
    use HasFactory;
    protected $fillable = ['DdoOjectid','ddo_id','user_id'];
}
