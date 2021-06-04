<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\DDO;
use App\Models\Fund;
use App\Models\SdepObject;
use App\Models\GroupInsuraceRate;

use App\Models\ Beneficiaries;
use Auth;
use DB;
class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $employees = Employees::where('status','submit')->orderBy('id','desc')->simplePaginate(15);
      return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $ddos = DDO::where('id','>','0')->get(); 
      $funds = Fund::where('id','>','0')->get();
      $status = DB::table('marital')->get();
      $titles = DB::table('sdep_objects')->get();
      $grades = DB::table('grades')->get();
      $types = DB::table('group_insurace_types')->get();
      return view('employees.create',compact('ddos','funds','status','titles','grades','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //variable for retirments to assinge to self value must be one;
      $self = 1;
      $this->validate($request,[
            
           
            'prno' => 'required|max:9|unique:employees,PersonalNumber',
            'name' => 'required',
            'father' => 'required',
            'cnic' => 'min:15|max:15|unique:employees,EmployeeCNIC|required',
            'birth' => 'required',
            'ddos' => 'required',
            'marital' => 'required',
            'funds' => 'required',
            'grads' => 'required', 
            'title' => 'required',
            'insurance' => 'required',
            'deathOretir' => 'required',
            
            'age' => 'required',
            'enddate' => 'required',
            'contribution' => 'required',
             ]);

      
     
      $employees = new Employees();
      $employees->PersonalNumber = $request->get('prno');
      $employees->EmployeeName = $request->get('name');
      $employees->EmployeeFatherHusbandName = $request->get('father');
      $employees->EmployeeCNIC = str_replace('-', '',$request->get('cnic'));

      $orgDate = $request->get('birth');
      $date = str_replace('/"', '-', $orgDate); 
      $newDate = date("Y-m-d", strtotime($date));
      $employees->DateBirth = $newDate;
      $employees->DeptID = $request->get('funds');
      $employees->MaritalStatusID = $request->get('marital');
      $employees->DDO = $request->get('ddos');

      $employees->Grade = $request->get('grads');
      $employees->SDetObj = $request->get('title');
      $employees->GITypeID = $request->get('insurance');
  
      $DeathOrretirmentDate = $request->get('enddate');
      $DRdate = str_replace('/"', '-', $DeathOrretirmentDate); 
      $enddates = date("Y-m-d", strtotime($DRdate));
     

     if(2 == $request->get('deathOretir')){
          $employees->DateDeath = $enddates;
          $employees->LegalHeirs = $request->get('beni');
             
     }else{
      
          $employees->DateRetirement = $enddates;
           $employees->LegalHeirs = $self;
     }

     $employees->AgeOnDate = $request->input('age');
     $employees->Contribution = $request->input('contribution');
     $employees->Status = "submit";
     $employees->user_id = Auth::id();
     $employees->save();
     return redirect()->to(url('/index/employees/beneficiary/create',$employees->id));
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empid = Employees::findOrFail($id);
        $employeeid = $empid->id;
       
        $beneficiares = Beneficiaries::where('EmployeeID','=',$employeeid)->get();
    
     return view('employees.view',compact('empid','beneficiares'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $UserId = Employees::findOrFail($id);
      $ddos = DDO::where('id','>','0')->get(); 
      $funds = Fund::where('id','>','0')->get();
      $status = DB::table('marital')->get();
      $titles = DB::table('sdep_objects')->get();
      $grades = DB::table('grades')->get();
     $types = DB::table('group_insurace_types')->get();
      return view('employees.edit',compact('ddos','funds','status','titles','grades','types','UserId'));
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $employees = Employees::findOrFail($id);
      $self = 1;
      $this->validate($request,[
            
           
            'prno' => 'required|max:9|unique:employees,PersonalNumber,'.$employees->id,
            'name' => 'required',
            'father' => 'required',
            'cnic' => 'min:15|max:15|unique:employees,EmployeeCNIC,'.$employees->id,
            'birth' => 'required',
            'ddos' => 'required',
            'marital' => 'required',
            'funds' => 'required',
            'grads' => 'required', 
            'title' => 'required',
            'insurance' => 'required',
            'deathOretir' => 'required',
            
            'age' => 'required',
            'enddate' => 'required',
            'contribution' => 'required',
             ]);
      
      $employees->PersonalNumber = $request->get('prno');
      $employees->EmployeeName = $request->get('name');
      $employees->EmployeeFatherHusbandName = $request->get('father');
      $employees->EmployeeCNIC = str_replace('-', '',$request->get('cnic'));

      $orgDate = $request->get('birth');
      $date = str_replace('/"', '-', $orgDate); 
      $newDate = date("Y-m-d", strtotime($date));
      $employees->DateBirth = $newDate;
      $employees->DeptID = $request->get('funds');
      $employees->MaritalStatusID = $request->get('marital');
      $employees->DDO = $request->get('ddos');

      $employees->Grade = $request->get('grads');
      $employees->SDetObj = $request->get('title');
      $employees->GITypeID = $request->get('insurance');
  
      $DeathOrretirmentDate = $request->get('enddate');
      $DRdate = str_replace('/"', '-', $DeathOrretirmentDate); 
      $enddates = date("Y-m-d", strtotime($DRdate));
     

     if(2 == $request->get('deathOretir')){
          $employees->DateDeath = $enddates;
          $employees->LegalHeirs = $request->get('beni');
             
     }else{
      
          $employees->DateRetirement = $enddates;
           $employees->LegalHeirs = $self;
     }

     $employees->AgeOnDate = $request->input('age');
     $employees->Contribution = $request->input('contribution');
     
     $employees->user_id = Auth::id();
     $employees->update();
 return redirect()->route('employees.index')->with('updated','Employee Recored Has Been Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
      $employees = Employees::findOrFail($id);

        $beneficiares =  Beneficiaries::where('EmployeeID',$employees->id)->get();
        // Beneficiary::where('id', '=' ,$beneficiares->id)->delete();
       foreach($beneficiares as $beneficiary){
          $beneficiary->delete();

       }
    $employees->delete();
    return redirect()->route('employees.index')->with('deleted','Employee insurace record has been deleted with beneficiary successflly');
    }
}
