<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Employees;
use App\Models\User;
class Beneficiaries extends Model
{
    use HasFactory;

    protected $fillable = ['EmployeeHeirCNIC','EmployeeHeirName','RelationID','BankID','BranchID','AccountID','Increase','Amount','user_id','EmployeeID'];

    public function Employees(){
    	return $this->belongsTo(Employees::class,'EmployeeID');
    }
     public function Users(){
    	return $this->belongsTo(User::class,'user_id');
    }

}
