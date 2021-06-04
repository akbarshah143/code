<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\GroupInsuraceRate;
use Illuminate\Support\Arr;
use DB;
use Auth;
class GroupInsuranceRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $grates = GroupInsuraceRate::where('id','>','0')->orderBy('id','desc')->simplePaginate(12);
         return view('groupinsurancerate.index',compact('grates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades =DB:: table('grades')->pluck('Grade','id');
        return view('groupinsurancerate.create',compact('grades'));
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
                      'Grade_From' => 'required',
                      'Grade_To' => 'required',
                      'Retirement' => 'required',
                      'Death' => 'required',
                      'startdate' => 'required',
                      'enddate' => 'required'
                  ]);
        $grade = DB::table('grades')->pluck('Grade');
        $from = $request->get('Grade_From');
        $to = $request->get('Grade_To');
        $range = range($from,$to);
        $userid = Auth::id();
        $retirment = $request->get('Retirement');
        $death = $request->get('Death');
        $takStartDate = $request->startdate;
        $start = date("Y-m-d", strtotime($takStartDate));
        $end = date("Y-m-d", strtotime($request->enddate));
        $mix = array($retirment,$death,$start, $end );
       foreach($range as $index => $i)
        { 
        
           $record = array('Grade'=> $range[$index],'Retirement'=>$retirment, 'Death' =>$death,
            'BeginDate'=>$start,'EndDate'=>$end,'user_id'=>$userid );
           GroupInsuraceRate::create($record); 
        }
        return redirect()->route('grouprate.index')->with('created','Record has been Created Successfully.');
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
        $rate = GroupInsuraceRate::findOrFail($id);
        $grade =DB:: table('grades')->pluck('Grade','id');
        return view('groupinsurancerate.edit',compact('rate','grade'));
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
                        'Grade_From' => 'required',
                        'Retirement' => 'required',
                        'Death' => 'required',
                        'startdate' => 'required',
                        'enddate' => 'required'

                    ]);
       $rates = GroupInsuraceRate::findOrFail($id);
       $rates->Grade = $request->get('Grade_From');
       $rates->Retirement = $request->get('Retirement');
       $rates->Death = $request->get('Death');
       $rates->BeginDate = date("Y-m-d", strtotime($request->startdate));
       $rates->EndDate = date("Y-m-d", strtotime($request->enddate));
       $rates->user_id = Auth::id();
       $rates->update();
       return redirect()->route('grouprate.index')->with('updated','Record has been Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rates = GroupInsuraceRate::findOrFail($id);
        $rates->delete();
        return redirect()->route('grouprate.index')->with('deleted','Record has been Deleted Successfully.');
    }
}
