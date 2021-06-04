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
                                <p class="text-muted">Register New Roles for Employees & Permission Update.</p>
                            </div>
                     
             
                  {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                  @csrf
                  
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Role / Group Name</label>
               {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
               
              
                <div class="card ">
                  <div class="card-body text-center">
              
                     @foreach($permission as $value)
                  
                   
                   <label class="btn btn-outline-info waves-effect waves-light" for="btncheck1">
                    {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'form-check-input','id'=>'checkboxOne')) }}
                   <span> {{ $value->name }}</span></label>
                 
                @endforeach
                
                  </div>
              </div>
             <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary " align="center">{{ __('Update Roles') }}</button>
      </div>
    
       {!! Form::close() !!}
    
  </div>
 </div>


@endsection
