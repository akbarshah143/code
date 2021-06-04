<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fund;
use Auth;
class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funds = Fund::where('id','>','0')->orderBy('id','desc')->simplePaginate(15);
        return view('funds.index',compact('funds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['fundcode' => 'required','description' => 'required']);
        $input = new Fund();
        $input->Fund = $request->get('fundcode');
        $input->FundDesc = $request->get('description');
        $input->user_id = Auth::id();
        $input->save();
        return redirect()->route('funds.index')->with('created','Record has been Created Suceefully.');

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
        $funds = Fund::findOrFail($id);
        return view('funds.edit',compact('funds'));
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
        $this->validate($request,['fundcode' => 'required','description' => 'required']);
        $funds = Fund::findOrFail($id);
        $funds->Fund = $request->get('fundcode');
        $funds->FundDesc = $request->get('description');
        $funds->update();
        return redirect()->route('funds.index')->with('updated','Record has been Updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $funds = Fund::findOrFail($id);
         $funds->delete();
         return redirect()->route('funds.index')->with('deleted','Recrod has been Deleted Suceefully.');
    }
}
