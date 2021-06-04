<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Notifications\Notifiable;
use App\Models\DDO;
use App\Models\User;
use App\Models\Fund;
use App\Models\District;
class DDO extends Model
{
    use HasFactory, LogsActivity, Notifiable;
    protected $fillable = ['DDO','DDODesc','Fund','District','user_id','fund_id'];

    protected static $logOnlyDirty = true;

    protected static $logAttributes = ['DDO','DDODesc','Fund','user_id'];
    protected static $logName = 'Ddo';

    protected static $recordEvents = ['created','updated','deleted'];

    public function getDescriptionForEvent(string $eventName): string
      {
        return "Ddo {$eventName} ";
      }
      protected static $submitEmptyLogs = false;


       public function getUsers(){
    return $this->belongsTo(User::class,'user_id');
   }

   public function getFund(){
    return $this->belongsTo(Fund::class,'fund_id');
   }

    public function getDistrict(){
    return $this->belongsTo(District::class,'District');
   }

}
