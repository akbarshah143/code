<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Arr;
use App\Models\District;
use Auth;
use DB;
class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::where('id','>','0')->orderBy('id','ASC')->simplePaginate(12);
        return view('district.index',compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('district.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['district' => 'required']);
       
        $districts = new District();
        $districts->district =  $request->input('district');
        $districts->user  = Auth::id();
        $districts->save();
         return redirect()->route('district.index')->with('created','District careated successfully.');

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
        $district = District::findOrFail($id);
         return view('district.edit',compact('district'));
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
        $district = District::findOrFail($id);
        $userId = Auth::id();
        $this->validate($request,[
                        'district' => 'required']);
        $district->district = $request->input('district');
        $district->user = $userId;
        $district->update();
        return redirect()->route('district.index')
                        ->with('updated','District Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $district = District::findOrFail($id);
      $district->delete();
       return redirect()->route('district.index')
                        ->with('deleted','District deleted successfully.');
    }
}
