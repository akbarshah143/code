<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banks;
use Auth;
class BankNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $banks = Banks::where('id','>','0')->orderBy('id', 'asc')->simplePaginate(12);
       return view('Banks.index',compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banks.create');
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
                         'bankcode' => 'required'
                     ]);
        $banks = new Banks();
       
        $banks->BankName = $request->get('bankname');
        $banks->BankNo = $request->get('bankcode');
        $banks->user_id = Auth::id();
        $banks->save();
      
        return redirect()->route('banks.index')->with('created','Record has been Created Successfully.');
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
        $banks = Banks::findOrFail($id);
        return view('banks.edit',compact('banks'));
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
        $banks = Banks::findOrFail($id);
      
        $banks->BankName = $request->get('bankname');
        $banks->BankNo = $request->get('bankcode');
        $banks->user_id = Auth::id();
        $banks->update();
        return redirect()->route('banks.index')->with('updated','Record has been Updated Succssfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banks = Banks::findOrFail($id);
        $banks->delete();
        return redirect()->route('banks.index')->with('deleted','Recode has been Deleted Succssfully.');
    }
}
