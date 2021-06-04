<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\DDO;
use App\Models\Fund;
use App\Models\SdepObject;
class ExtraController extends Controller
{
    public function Titlecreate()
    {
        $ddos = DDO::where('id','>','0')->pluck('DDODesc','id');
        $funds = Fund::where('id','>','0')->pluck('FundDesc','id');
        return view('title.title',compact('ddos','funds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
}
