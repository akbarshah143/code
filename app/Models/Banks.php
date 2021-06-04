<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Banks extends Model
{
    use HasFactory , LogsActivity;
    protected $fillable = ['BankName','BankNo','user_id'];

    protected static $logOnlyDirty = true;


    protected static $logAttributes = ['BankName','BankNo'];
    protected static $logName = 'Bank';

    protected static $recordEvents = ['created','updated','deleted'];

    public function getDescriptionForEvent(string $eventName): string
      {
        return "Bank {$eventName} ";
      }
    protected static $submitEmptyLogs = false;


   public function getUsers(){
    return $this->belongsTo(User::class,'user_id');
   }

 }