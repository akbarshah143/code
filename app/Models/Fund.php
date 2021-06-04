<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employees;
class Fund extends Model
{
    use HasFactory;

    protected $fillable = ['Fund','FundDesc','user_id'];


    public function getUsers(){
    return $this->belongsTo(User::class,'user_id');
    }
    public function getDepartment(){
        return $this->belongsTo(Employees::class,'Fund');
    }
}
