<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Auth;
use App\Models\EmpDocuments;
use App\Models\tmpfile;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empId = $request->emplId;
        $userId = Auth::id();
      $tempfile = tmpfile::where('folder',$request->file)->first();
       if($tempfile) {
      Storage::copy('public/avaitar/'.$tempfile->folder.'/'.$tempfile->filename, 'public/document/'.$request->file.'/'.$tempfile->filename);
          

          EmpDocuments::create([
                 'empId' => $empId,
                 'folder' => $tempfile->folder,
                 'filename' => $tempfile->filename,
                 'user_id' => $userId,
          ]); 

          // Storage::delete('public/avaitar/'.$request->file.'/'.$tempfile->filename));
          Storage::deleteDirectory('public/avaitar/'.$tempfile->folder);
          $tempfile->delete();
          return redirect()->route('employees.index')->with('created','Employee record with Documents has been Created Suceefully.');
      }else{
        return back()->with('deleted','Attachments is not attached, Pleas try again');
     } 
         

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
