<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Employees;
use App\Models\Relations;
use App\Models\Banks;
use App\Models\BankBranches;
use App\Models\Beneficiaries;
use App\Models\GroupInsuraceRate;
use App\Models\tmpfile;
use DB;
use Auth;
use Form;

class BeneficiaryController extends Controller
{
    public function create($employeeid){
      $ides = Employees::where('id',$employeeid)->first();
      $relation = Relations::all();
      $banks = Banks::All();
    	//$subbanks = BankBranches::all();
     
    	return view('beneficiary.create',compact('ides','relation','banks'));
    }
     
    public function store(Request $request){
      $ides =  $request->get('id');
      $userid =  Auth::id();
      $employees = Employees::findOrFail($ides);
      $RetirDate = $employees->DateRetirement;
      $deathDate = $employees->DateDeath;
      $InsuraceType = $employees->GITypeID;
      $Grade = $employees->Grade;
      $legalhire = $employees->LegalHeirs;
      $EmployeesContirbution = $employees->Contribution;
      $SpacificStartDate = date("Y-m-d", strtotime('01-07-2007'));
      $SpacificEndDate = date("Y-m-d", strtotime('31-12-2008'));
                            
    if ("two" === $request->one){
      
        $this->validate($request,[
        "name" =>'required|string',

        "cnic" =>'min:15|max:15|unique:beneficiaries,EmployeeHeirCNIC|required',
      
        'relation' => 'required',
        'bank'  => 'required',
        'branch'  => 'required|min:0|max:4',
        'account' => 'required|regex:/([0-9])+/|min:8|max:9',

        "name1" =>'required|string',

        "cnic1" =>'min:15|max:15|unique:beneficiaries,EmployeeHeirCNIC|required',
      
        'relation1' => 'required',
        'bank1'  => 'required',
        'branch1'  => 'required|min:0|max:4',
        'account1' => 'required|regex:/([0-9])+/|min:8|max:9'
         ]);
       $quantities = $request->all();
       //$Endate = GroupInsuraceRate::pluck('EndDate');
       // $getdate =  GroupInsuraceRate::FindClosestDate($Endate,$deathDate);
       // $rateData = GroupInsuraceRate::where('EndDate','<=',$getdate)
       //                               ->where('Grade','=',$Grade)->get();
       // $function = GroupInsuraceRate::GetValues($rateData); 
       

        $rateData = GroupInsuraceRate::whereYear('EndDate','=',$deathDate)
                                      ->whereMonth('EndDate','<=', '12')
                                      ->where('Grade','=',$Grade)->get();
        $function = GroupInsuraceRate::GetValues($rateData); 
if($function->BeginDate >= $SpacificStartDate && $function->EndDate <= $SpacificEndDate){

        
        $amountTotal = $function->Death + $EmployeesContirbution;
        $LegalHeirsAmount = $amountTotal/$legalhire;
      }else{

         $LegalHeirsAmount = $function->Death/$legalhire;
      }


          Beneficiaries::create([
        'EmployeeID' =>   $ides,
        'EmployeeHeirCNIC' => $quantities['cnic'],
        'EmployeeHeirName' => $quantities['name'],
        'RelationID' => $quantities['relation'],
        'BankID' =>  $quantities['bank'],
        'BranchID' => $quantities['branch'],
        'AccountID' => $quantities['account'],
        'Increase' => "0",
         'status' => 'Normal',
        'Amount' => $LegalHeirsAmount,
        'user_id' =>$userid,

    
          ]);
           Beneficiaries::create([
        'EmployeeID' =>  $ides,
        'EmployeeHeirCNIC' => $quantities['cnic1'],
        'EmployeeHeirName' => $quantities['name1'],
        'RelationID' => $quantities['relation1'],
        'BankID' =>  $quantities['bank1'],
        'BranchID' => $quantities['branch1'],
        'AccountID' => $quantities['account1'],
        'Increase' => "0",
         'status' => 'Normal',
        'Amount' => $LegalHeirsAmount,
        'user_id' =>$userid,
         ]);
       
     return redirect()->route('employees.index')->with('created','Record has been Created Successfully.');
     }
    elseif("three" === $request->one){
      
        $this->validate($request,[
        "name" =>'required|string',

        "cnic" =>'min:15|max:15|unique:beneficiaries,EmployeeHeirCNIC|required',
      
        'relation' => 'required',
        'bank'  => 'required',
        'branch'  => 'required|min:0|max:4',
        'account' => 'required|regex:/([0-9])+/|min:8|max:9',

        "name1" =>'required|string',

        "cnic1" =>'min:15|max:15|unique:beneficiaries,EmployeeHeirCNIC|required',
        'relation1' => 'required',
        'bank1'  => 'required',
        'branch1'  => 'required|min:0|max:4',
        'account1' => 'required|regex:/([0-9])+/|min:8|max:9',
        "name2" =>'required|string',

        "cnic2" =>'min:15|max:15|unique:beneficiaries,EmployeeHeirCNIC|required',
      
        'relation2' => 'required',
        'bank2'  => 'required',
        'branch2'  => 'required|min:0|max:4',
        'account2' => 'required|regex:/([0-9])+/|min:8|max:9',
         ]);
       $quantities = $request->all();
      // $Endate = GroupInsuraceRate::pluck('EndDate');
      // $getdate =  GroupInsuraceRate::FindClosestDate($Endate,$deathDate);
       //$rateData = GroupInsuraceRate::where('EndDate','<=',$getdate)
                                     // ->where('Grade','=',$Grade)->get();
       // $function = GroupInsuraceRate::GetValues($rateData); 
       //$amount = $function->Death/$legalhire;
       $rateData = GroupInsuraceRate::whereYear('EndDate','=',$deathDate)
                                      ->whereMonth('EndDate','<=', '12')
                                      ->where('Grade','=',$Grade)->get();
        $function = GroupInsuraceRate::GetValues($rateData); 
if($function->BeginDate >= $SpacificStartDate && $function->EndDate <= $SpacificEndDate){

        
        $amountTotal = $function->Death + $EmployeesContirbution;
        $LegalHeirsAmount = $amountTotal/$legalhire;
      }else{

         $LegalHeirsAmount = $function->Death/$legalhire;
      }

          Beneficiaries::create([
        'EmployeeID' =>   $ides,
        'EmployeeHeirCNIC' => $quantities['cnic'],
        'EmployeeHeirName' => $quantities['name'],
        'RelationID' => $quantities['relation'],
        'BankID' =>  $quantities['bank'],
        'BranchID' => $quantities['branch'],
        'AccountID' => $quantities['account'],
        'Increase' => "0",
         'status' => 'Normal',
        'Amount' => $LegalHeirsAmount,
        'user_id' =>$userid,

    
          ]);
           Beneficiaries::create([
        'EmployeeID' =>  $ides,
        'EmployeeHeirCNIC' => $quantities['cnic1'],
        'EmployeeHeirName' => $quantities['name1'],
        'RelationID' => $quantities['relation1'],
        'BankID' =>  $quantities['bank1'],
        'BranchID' => $quantities['branch1'],
        'AccountID' => $quantities['account1'],
        'Increase' => "0",
         'status' => 'Normal',
        'Amount' => $LegalHeirsAmount,
        'user_id' =>$userid,
         ]);
          Beneficiaries::create([
        'EmployeeID' =>  $ides,
        'EmployeeHeirCNIC' => $quantities['cnic2'],
        'EmployeeHeirName' => $quantities['name2'],
        'RelationID' => $quantities['relation2'],
        'BankID' =>  $quantities['bank2'],
        'BranchID' => $quantities['branch2'],
        'AccountID' => $quantities['account2'],
        'Increase' => "0",
         'status' => 'Normal',
        'Amount' =>$LegalHeirsAmount,
        'user_id' =>$userid,
         ]);

       
      return redirect()->route('employees.index')->with('created','Record has been Created Successfully.');
  
       }else{
           if("on" === $request->get('special')){
       $this->validate($request,[
            "name" =>'required|string',

            "cnic" =>'required|min:15|max:15',
      
            'relation' => 'required',
            'bank'  => 'required',
            'branch'  => 'required|min:0|max:4',
            'account' => 'required|regex:/([0-9])+/|min:8|max:9'
         ]);
     }else{
      $this->validate($request,[
            "name" =>'required|string',

            "cnic" => 'min:15|max:15|unique:beneficiaries,EmployeeHeirCNIC|required',
      
            'relation' => 'required',
            'bank'  => 'required',
            'branch'  => 'required|min:0|max:4',
            'account' => 'required|regex:/([0-9])+/|min:8|max:9'
         ]);
     }
    
      $insuraceRate = new Beneficiaries();
      if($InsuraceType === "3" ||$InsuraceType === "2" ){
      // $Endate = GroupInsuraceRate::pluck('EndDate');
       // $getdate =  GroupInsuraceRate::FindClosestDate($Endate,$deathDate);
       $rateData = GroupInsuraceRate::whereYear('EndDate','=',$deathDate)
                                      ->whereMonth('EndDate','<=', '12')
                                      ->where('Grade','=',$Grade)->get();
        $function = GroupInsuraceRate::GetValues($rateData); 
if($function->BeginDate >= $SpacificStartDate && $function->EndDate <= $SpacificEndDate){

        $insuraceRate->Amount = $function->Death + $EmployeesContirbution;
      }
      else{
           $insuraceRate->Amount = $function->Death;
      }

      }else{
      // $Endate = GroupInsuraceRate::pluck('EndDate')->toArray();
      //  $getdate =  GroupInsuraceRate::FindClosestDate($Endate,$RetirDate);
       $rateData = GroupInsuraceRate::whereYear('EndDate','=',$RetirDate)
                                       ->whereMonth('EndDate','<=', '12')
                                       ->where('Grade','=',$Grade)->get();
        

    $function = GroupInsuraceRate::GetValues($rateData); 
if($function->BeginDate >= $SpacificStartDate && $function->EndDate <= $SpacificEndDate){
  $insuraceRate->Amount = $function->Retirement + $EmployeesContirbution;
}else{
   $insuraceRate->Amount = $function->Retirement;
}
       
      }
     $insuraceRate->EmployeeHeirName= $request->get('name');
     $insuraceRate->EmployeeHeirCNIC = $request->get('cnic');
     $insuraceRate->RelationID = $request->get('relation');
     $insuraceRate->BankID= $request->get('bank');
     $insuraceRate->BranchID = $request->get('branch');
     $insuraceRate->AccountID = $request->get('account');
     if("on" === $request->get('special')){
       $insuraceRate->status = "Special";
     }else{
      $insuraceRate->status = "Normal";
     }
     $insuraceRate->Increase = "0";
     $insuraceRate->user_id = Auth::id();
     $insuraceRate->EmployeeID = $request->get('id');
     $insuraceRate->save();
     return redirect()->to(url('/index/employees/beneficiary/documents',$employees->id));
   }

    }
  
   
   public function Document(Request $request,$empid){
   $employees = Employees::where('id',$empid)->get();
   return view('employeeDocument.index',compact('employees'));
   }

   public function SaveDocument(Request $request,$id){
     $emp = Employees::findOrFail($id);
     $userid = Auth::id();
     if($request->hasFile('file')){
      $file = $request->file('file');
      $filename = $file->getClientOriginalName();
      $folder = Auth::id(). '-'.now()->timestamp;
      $file->storeAs('avaitar/'. $folder, $filename,'public');
        tmpfile::create([
                   
                   'folder' => $folder,
                   'filename' => $filename,
                  
                        ]);
      return $folder;
     }
     return "";
     }

   
   

 public function chunckDocument(Request $request,$id){
 $folder = $id.'-'.now()->timestamp;
  Storage::put('avaitar/'.$folder);
 
   file_put_contents(storage_path('avaitar/'.$folder.'/file.part'),'');
    return $folder;
     }

     public function Upload(Request $request,$id){
      $path = storage_path('app/public/avaitar/'.$request->query('PATCH') . '/file.part');
      File::append($path, $request->getContent());
      if(filesize($path) == $request->header('Upload-Length')){
        $name = $request->header('Upload-Length');
        File::move($path,storage_path('app/public/avaitar/'.$request->query('patch').'/'.$name));
        tmpfile::create([
                   
                   'folder' => $request->query('patch'),
                   'filename' => $name,
                  
                        ]);
      }
      return response()->json(['uploaded'=> true]);
      
     }
    
}
