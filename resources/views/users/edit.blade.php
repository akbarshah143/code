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
                                <p class="text-muted">Get your Employees account Update.</p>
                            </div>
                            <div class="p-2 mt-4">
                                {!! Form::model($users, ['method' => 'PATCH','route' => ['users.update', $users->id]]) !!}
                                @csrf
                                     @method('PUT')
                                <div class="row ">
                                   <div class="col-md-8 col-lg-6 col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="username">User Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{$users->name }}" id="username"
                                            placeholder="Enter username">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                       
                                    <label class="form-label">Select Department</label>
                                    <select class="form-control select2" name="department">
                                        <option>{!! $users->department !!}</option>
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

                                    <div class="mb-3">
                                       
                                    <label class="form-label">Selet Job title/Position</label>
                                    <select class="form-control select2" name="position">
                                     <option>{{$users->position }}</option>
                                       
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
                                <div class="col-md-8 col-lg-6 col-xl-6">
                                     <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ $users->email }}" id="email" placeholder="Enter email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="cnic">National ID</label>
                                        <input type="text" class="form-control @error('cnic') is-invalid @enderror"
                                            name="cnic" value="{{ $users->cnic }}" id="cnic"
                                            placeholder="Enter Natonal ID No">
                                        @error('cnic')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Phone">Phone No</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" value="{{ $users->phone}}" id="position"
                                            placeholder="Enter Phone No">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Roles">Roles</label>
                                   {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple','id'=>'roles')) !!}
                                      
                                        @error('Roles')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                   

                                    <div class="mt-3 text-end" align="text-center">
                                        <button class="btn btn-primary w-sm waves-effect waves-light"
                                            type="submit">Update Account</button>
                                    </div>

                                   
                                   
                                </form>
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
