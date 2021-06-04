<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class GroupInsuraceRate extends Model
{
    use HasFactory;
    protected $fillable = ['Grade','Retirement','Death','BeginDate','EndDate','user_id'];

     public function getUsers(){
    return $this->belongsTo(User::class,'user_id');
   }

   Public static function FindClosestDate($dates_array, $fordate){
    $mostRecent= 0;

      foreach($dates_array as $date){
        $curDate = $date;
        if ($curDate >= $mostRecent && $curDate <= $fordate) {
         $mostRecent = $curDate;
         }
      }
    return $mostRecent;
  }

  public static function GetValues($array){
     $returnvalue = 0;
     foreach($array as $values){
        $returnvalue = $values;
      }
      return $returnvalue;
  }

    Public static function SpecificDate($dates_array, $fordate){
      $SpecificDate = 0;
      $specificStartDate = date("Y-m-d", strtotime('1-07-2007'));
      $specificEndtDate = date("Y-m-d", strtotime('31-12-2008'));
      foreach($dates_array as $date){
        $SysDate = $date;
        if ($SysDate >=  $specificStartDate && $SysDate <= $specificEndtDate) {
         $SpecificDate = $fordate;
         }
      }
    return  $SpecificDate;
  }

  


}
