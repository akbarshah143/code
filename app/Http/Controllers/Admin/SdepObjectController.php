<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SdepObject;
use App\Models\User;
use App\Models\DDO;
use App\Models\Fund;
use Auth;

class SdepObjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = SdepObject::where('id','>','0')->orderBy('id','desc')->simplePaginate(12);
        return view('title.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('title.create');
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
                    
                    'jobcode' => 'required',
                    'jobtitle' => 'required'
                    ]);
        $title = new SdepObject();
       
        $title->user_id = Auth::id();
        $title->SDetObj = $request->get('jobcode');
        $title->SDetObjDesc = $request->get('jobtitle');
        $title->save();
        return redirect()->route('title.index')->with('created','Record has been Created Successfully.');
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
       $jobs = SdepObject::findOrFail($id);
       return view('jobtitle.edit',compact('jobs'));
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
                    'Title_ID' => 'required',
                    'description' => 'required'
                    ]);
        $title = SdepObject::findOrFail($id);
        $title->SDetObj = $request->get('Title_ID');
        $title->SDetObjDesc = $request->get('description');
        $title->save();
        return redirect()->route('title.index')->with('updated','Record has been Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
       $jobs = SdepObject::findOrFail($id);

       $jobs->delete();
       return redirect()->route('title.index')->with('deleted','Record has been Deleted Successfully.');
    }
}
