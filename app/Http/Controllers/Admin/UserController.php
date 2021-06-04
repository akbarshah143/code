<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;
use Auth;
use DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->simplePaginate(12);
        return View('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::all();
      $funds = DB::table('funds')->get();
      
      $titles = DB::table('sdep_objects')->get();
      return view('users.register',compact('roles','funds','titles'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'cnic' => 'required|min:13|max:13|unique:users',
            'department' =>'required',
            'roles' => 'required',
            'position' => 'required'
            
                ]);
        $adduser = Auth::id();
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['admin_id'] = Auth::id();
        $input['role_id'] = $request->input('roles');
         $input[''] = $request->input('position');
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
         return redirect()->route('users.index')->with('created','User Has been Created Successfully.');

       
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
        $users = User::findOrFail($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $users->roles->pluck('name','name')->all();
       
        $funds = DB::table('funds')->get();
      
        $titles = DB::table('sdep_objects')->get();
        return view('users.edit',compact('users','roles','userRole','funds','titles'));

        
       
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
        $users = User::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
           
             'cnic' => 'required|digits:13|unique:users,cnic,'.$id,
            'department' =>'required'
                ]);
        $input = $request->all();
        
        $users->update($input);
         DB::table('model_has_roles')->where('model_id',$id)->delete();
        $users->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('updated','Employee Record updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->delete();
      DB::table('model_has_roles')->where('model_id',$id)->delete();
      return redirect()->route('users.index')->with('deleted','Record has been delete Successfully.');
    }
}
