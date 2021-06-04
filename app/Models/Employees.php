<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Fund;
class Employees extends Model
{
    use HasFactory;
    protected $fillable = ['DDO','PersonalNumber','EmployeeCNIC','EmployeeName','DateBirth','DeptID','MaritalStatusID','EmployeeFatherHusbandName','SDetObj','Grade','GITypeID','DateRetirement','DateDeath','AgeOnDate','LegalHeirs','Contribution','Status','user_id'];

      public function getUsers(){
    return $this->belongsTo(User::class,'user_id');
   }

   
}
