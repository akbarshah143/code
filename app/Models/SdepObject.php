<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\DDO;
use App\Models\Fund;
class SdepObject extends Model
{
    use HasFactory;
    protected $fillable = ['SDetObj','SDetObjDesc','ddo_id','user_id','department_id'];


     public function getUsers(){
    return $this->belongsTo(User::class,'user_id');
   }

   public function getDdo(){
   	return $this->belongsTo(DDO::class,'ddo_id');
   }

    public function getDepartment(){
   	return $this->belongsTo(Fund::class,'department_id');
   }
}
