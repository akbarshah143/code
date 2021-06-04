<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\Fund;
use App\Models\DDO;
use App\Models\BankBranches;
use App\Models\Employees;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }

    public function root()
    {
        return view('index');
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function FormSubmit(Request $request)
    {
        return view('form-repeater');
    }



     public function fetch(Request $request)
    {
         
      if($request->get('ddoid'))
      {
      $ddoid = $request->get('ddoid');
      //$fundid = Fund::findOrFail($fund_id);
      $ddos = DDO::where('DDO',$ddoid)->first();
      $funds = Fund::where('Fund',$ddos->Fund)->get();
       return $funds;
     
       
       
       }
    
    }

     public function bank(Request $request)
    {
         
     if($request->get('bankid'))
      {
      $bankid = $request->get('bankid');
      $data = BankBranches::where('BankID',$bankid)->get();
       return $data;
       
       }
    
    }


    public function numbers(Request $request)
      {

        if($request->get('pnumbers')){
         $Pno =  $request->get('pnumbers');
         $data = Employees::where('PersonalNumber',$Pno)->get();
         if($data->count() > 0 ){
            echo "<span class='text-danger'>Personal Number has been taken</span>";
         }else{
            echo "<span class='text-success'>Personal Number Available</span>";
         }
       }
   }

    public function cnicnumbers(Request $request)
      {

        if($request->get('cnicnumbers')){
       
         $Pno = str_replace('-', '',$request->get('cnicnumbers'));
         $data = Employees::where('EmployeeCNIC',$Pno)->get();
         if($data->count() > 0 ){
            echo "<span class='text-danger'>Personal CNIC Number has been taken</span>";
         }else{
            echo "<span class='text-success'>Personal CNIC Number Available</span>";
         }
       }
   }


   


}
