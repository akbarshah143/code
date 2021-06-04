@extends('layouts.master')
@section('title')
    @lang('translation.User')
@endsection
@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
   
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Users @endslot
        @slot('title') User List @endslot
    @endcomponent
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-6">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Register Account</h5>
                                <p class="text-muted">Get your Employees account now.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('users.store') }}">
                                    @csrf
                                <div class="row ">
                                   <div class="col-md-8 col-lg-6 col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="username">User Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" id="username"
                                            placeholder="Enter username">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="userpassword" placeholder="Enter password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" id="password_confirmation"
                                            placeholder="Enter confirm password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                     <div class="mb-3">
                                       
                                    <label class="form-label">Select Department</label>
                                    <select class="form-control select2" name="department">
                                        <option>Select</option>
                                       
                                            @foreach($funds as $fund)
                                            <option value="{!!$fund->Fund!!}">{!!$fund->FundDesc!!}
                                            </option>
                                            @endforeach
                                       
                                       
                                    </select>

                               
                                        @error('department')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    


                                </div>
                                <div class="col-md-8 col-lg-6 col-xl-6">
                                     <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" id="email" placeholder="Enter email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="cnic">National ID</label>
                                        <input type="text" class="form-control @error('cnic') is-invalid @enderror"
                                            name="cnic" value="{{ old('cnic') }}" id="cnic"
                                            placeholder="Enter Natonal ID No" maxlength="13" pattern="\d{13}">
                                        @error('cnic')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Phone No</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" value="{{ old('phone') }}" id="phone"
                                            placeholder="Enter Phone name" maxlength="11" pattern="\d{11}" min="0">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                     <div class="mb-3">
                                       
                                    <label class="form-label">Selet Job title/Position</label>
                                    <select class="form-control select2" name="position">
                                        <option>Select</option>
                                       
                                            @foreach($titles as $title)
                                            <option value="{!!$title->SDetObj!!}">
                                               {!!$title->SDetObjDesc!!}
                                           </option>
                                            @endforeach
                                       
                                    </select>

                               
                                        @error('position')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
                            </div>


                                   <div class="mb-3">
                                        <label class="form-label" for="department">Select Roles/Group Name for Users</label>
                                        <select  name="roles" id="role" class="form-control @error('roles') is-invalid @enderror" 
                                         placeholder="Enter roles name" required>
                                         @foreach($roles as $role)
                                         <option value="{{$role->id}}">{{$role->name}}</option>
                                          @endforeach
                                         </select>

                                    
                                        @error('roles')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mt-3 text-end" align="text-center">
                                        <button class="btn btn-primary w-sm waves-effect waves-light"
                                            type="submit">Register</button>
                                    </div>

                                   
                                   
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    @section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
   <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
@endsection

@endsection
