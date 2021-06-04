<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use DB;
use Auth;
use App\Models\User;
class UserLogsActivityController extends Controller
{
	public function indexx(){
		
    $lastActivity = Activity::all()->last();
}


public function index(){
		
    $activity = Activity::all();
    // $activity = json_decode(Activity::all(), JSON_PRETTY_PRINT);
    
    

   $user = User::all();
   return view('logs.index',compact('activity','user'));
}

	

}
