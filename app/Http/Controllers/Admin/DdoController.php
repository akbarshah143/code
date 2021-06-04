<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Arr;
use App\Models\DDO;
use App\Models\District;
use App\Models\Fund;
use Auth;

class DdoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ddos = DDO::where('id','>','0')->orderBy('id','desc')->simplePaginate(15);
       
        return view('ddo.index',compact('ddos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $districts = District::where('id','>','0')->get();
         $funds = Fund::where('id','>','0')->get();
        return view('ddo.create',compact('districts','funds'));
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
                      'ddocode' => 'required',
                      'description' => 'required',
                      'department' => 'required',
                      'district' => 'required'
                  ]);
        $fund = Fund::findOrFail($request->department);
        $input = $request->all();
        $input['DDO'] = $request->ddocode;
        $input['DDODesc'] = $request->description;
        $input['Fund'] = $fund->Fund;
        $input['fund_id'] = $request->department;
        $input['District'] = $request->district;
        $input['user_id'] = Auth::id();
        DDO::create($input);
        return redirect()->route('ddos.index')->with('created','Record Has been Created Sucessfully. ');
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
        $ddos = DDO::findOrFail($id);
        $districts = District::where('id','>','0')->get();
        $funds = Fund::where('id','>','0')->get();
       
       
        return view('ddo.edit',compact('ddos','districts','funds'));
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
                      'ddocode' => 'required',
                      'description' => 'required',
                      'department' => 'required',
                      'district' => 'required'
                  ]);
        $fund = Fund::findOrFail($request->department);
        $input = $request->all();
        $input['DDO'] = $request->ddocode;
        $input['DDODesc'] = $request->description;
        $input['Fund'] = $fund->Fund;
        $input['fund_id'] = $request->department;
        $input['District'] = $request->district;
        $input['user_id'] = Auth::id();
        $ddos = DDO::findOrFail($id);
        $ddos->update($input);
        return redirect()->route('ddos.index')->with('updated','Record has been Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ddos = DDO::findOrFail($id);
        $ddos->delete();
        return redirect()->route('ddos.index')->with('deleted','Record has been Deleted Successfully.');
    }
}
