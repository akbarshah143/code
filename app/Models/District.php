<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
class District extends Model
{
     use HasFactory, LogsActivity, Notifiable;

     protected $fillable = ['district','user'];

      protected static $logOnlyDirty = true;

    protected static $logAttributes = ['district','user'];
    protected static $logName = 'District';

    protected static $recordEvents = ['created','updated','deleted'];

    public function getDescriptionForEvent(string $eventName): string
      {
        return "District {$eventName} ";
      }
      protected static $submitEmptyLogs = false;

      public function getUsers(){
    return $this->belongsTo(User::class,'user');
   }

}
