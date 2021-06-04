<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpDocuments extends Model
{
    use HasFactory;

    protected $fillable = ['empId','folder','filename','user_id'];
}
