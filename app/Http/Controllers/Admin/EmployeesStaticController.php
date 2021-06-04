<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\DDO;
use DB;
class EmployeesStaticController extends Controller
{

	public function index()
	{
	    //$employees = Employees::where('id','>','0')->orderBy('id','desc')->simplePaginate(15);
      // return view('employees.index',compact('employees'));
    return "index";
	}


	public function create()
	{
      
	    //$employees = Employees::where('id','>','0')->orderBy('id','desc')->simplePaginate(15);
       return "hello";
	
	}

   public function store()
   {

   }

    public function getCategory(Request $request)
     {
      if($request->get('query'))
      {
      $query = $request->get('query');
      $data = DB::table('d_d_o_s')
        ->where('DDO', 'LIKE', "%{$query}%")
        ->orwhere('DDODesc', 'LIKE',"%{$query}%")
        ->get();
       $output = '<ul class="dropdown-men" style="display:block; position:relative"  >';

       foreach($data as $row)
       {
       $output .= '
       <li><a href="#">'.$row->DDO.'</a></li>'.$row->DDODesc;
       }
       $output .= '</ul>';
       echo $output;
       }
    
      }

      public function getDep(Request $request)
     {
      if($request->get('query'))
      {
      $query = $request->get('query');
      $data = DB::table('funds')
        ->where('Fund', 'LIKE', "%{$query}%")
        ->orwhere('FundDesc', 'LIKE',"%{$query}%")
        ->get();
       $output = '<ul class="dropdown-men" style="display:block; position:relative"  >';

       foreach($data as $row)
       {
       $output .= '
       <li><a href="#">'.$row->Fund.'</a></li>'.$row->FundDesc;
       }
       $output .= '</ul>';
       echo $output;
       }
    
      }
   
 



   
}
