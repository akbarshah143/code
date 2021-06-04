<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BankBranches;
use App\Models\Banks;
use Auth;
class BankBranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = BankBranches::where('id','>','0')->orderBy('id','asc')->simplePaginate(12);
        return view('branches.index',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Banks::where('id','>','0')->get();
        return view('branches.create',compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                 
                    'bankname' => 'required',
                    'branchname' => 'required',
                    'branchcode' => ' required'
                ]);
        $branch = new BankBranches();
        $branch->BankID = $request->get('bankname');
        $branch->BankDesc = $request->get('branchname');
        $branch->BranchID = $request->get('branchcode');
        $branch->user_id  = Auth::id();
        $branch->save();
        return redirect()->route('branches.index')->with('created','Record has been Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = BankBranches::findOrFail($id);
        $list = Banks::where('id','>','0')->get();
       
        return view('branches.edit',compact('branch','list'));
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
        $this->validate($request,[
                      'bankname'=> 'required',
                      'branchname' => 'required',
                      'branchcode' => 'required',
                     ]);
        $branch = BankBranches::findOrFail($id);
         $branch->BankDesc = $request->get('branchname');
        $branch->BankID = $request->get('bankname');
        $branch->BranchID = $request->get('branchcode');
        $branch->user_id = Auth::id();
        $branch->update();
        return redirect()->route('branches.index')->with('updated','Record has been Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = BankBranches::findOrFail($id);
        $branch->delete();
        return redirect()->route('branches.index')->with('deleted','Record has been Deleted Successfully.');
    }
}
