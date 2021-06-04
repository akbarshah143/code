@extends('layouts.master')
@section('title')
    @lang('translation.User')
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Roles @endslot
        @slot('title') Create Role @endslot
    @endcomponent
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-6">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Register New Roles</h5>
                                <p class="text-muted">Register New Roles for Employees & Permission.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('roles.store') }}">
                                    @csrf
                                <div class="row ">
                                   
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Role / Group Name</label>
               <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" id="username"
                                            placeholder="Enter Role / Group Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                

                        <div class="card ">
                  <div class="card-body text-center">
              
                    @foreach($permission as $value)
                 <label class="btn btn-outline-info waves-effect waves-light" for="btncheck1">
                {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</label>
                     
                    @endforeach

                  </div>
              </div>
           
            <div class="btn center">
            <button type="submit" class="btn btn-primary ">{{ __('Create account') }}</button>
          </div>
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
@endsection
