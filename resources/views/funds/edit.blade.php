@extends('layouts.master')
@section('title')
    @lang('translation.User')
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Funds @endslot
        @slot('title') Departments of Baluchistan @endslot
    @endcomponent
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-6">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Register New Fund / Departments Form</h5>
                                <p class="text-muted">Update Funds / Departments.</p>
                            </div>
                     
             
                  {!! Form::model($funds, ['method' => 'PATCH','route' => ['funds.update',  $funds->id]]) !!}
                  @csrf
                  
                                    <div class="mb-3">
                                        <label class="form-label" for="fundcode">Update Fund / Department Code</label>
               {!! Form::text('fundcode', $funds->Fund, array('placeholder' => 'Fund/Departments code','class' => 'form-control')) !!}
                                        @error('fundcode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                              <div class="mb-3">
                                        <label class="form-label" for="description">Update Fund / Departments name</label>
               {!! Form::text('description', $funds->FundDesc, array('placeholder' => 'Fund/Departments name','class' => 'form-control')) !!}
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
               
              
               
             <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary " align="center">{{ __('Update Fund/ Departments') }}</button>
      </div>
    
       {!! Form::close() !!}
    
  </div>
 </div>


@endsection
