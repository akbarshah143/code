<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class BankBranches extends Model
{
    use HasFactory , LogsActivity;

    protected $fillable = ['BankDesc','BankID','BranchID','user_id'];

     protected static $logOnlyDirty = true;


    protected static $logAttributes = ['BankDesc','BranchID'];
    protected static $logName = 'Bank Branch';

    protected static $recordEvents = ['created','updated','deleted'];

    public function getDescriptionForEvent(string $eventName): string
      {
        return "Bank branch {$eventName} ";
      }
    protected static $submitEmptyLogs = false;


   public function getUsers(){
    return $this->belongsTo(User::class,'user_id');
   }

   public function getBanks(){
    return $this->belongsTo(Banks::class,'BankID');
   }

}
