<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Relations;
use Auth;
class RelationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relations = Relations::where('id','>','0')->orderBy('id','ASC')->simplePaginate(16);
        return view('relation.index',compact('relations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('relation.create');
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
                      
                        'relation' => 'required',
                    ]);
        $relation = new Relations();
       
        $relation->RelationDesc = $request->get('relation');
        $relation->user_id = Auth::id();
        $relation->save();
        return redirect()->route('relation.index')->with('created','Record has been Created Successfully.');
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
        $relation = Relations::findOrFail($id);
        return view('relation.edit',compact('relation'));
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
        $relation = Relations::findOrFail($id);
        $this->validate($request,[
                       
                        'relation' => 'required'
                    ]);
      
        $relation->RelationDesc = $request->get('relation');
        $relation->user_id = Auth::id();
        $relation->update();
        return redirect()->route('relation.index')->with('updated','Record has been Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $relation = Relations::findOrFail($id);
        $relation->delete();
        return redirect()->route('relation.index')->with('deleted','Record has been Deleted Successfully.');
    }
}
