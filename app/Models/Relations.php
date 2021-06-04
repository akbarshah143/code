<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Relations extends Model
{
    use HasFactory;
     protected $fillable=['RelationDesc','user_id'];

       public function getUsers(){
    return $this->belongsTo(User::class,'user_id');
   }
}
