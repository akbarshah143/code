@extends('layouts.master')
@section('title')
    @lang('translation.User')
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Banks @endslot
        @slot('title') Updating Banks @endslot
    @endcomponent
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-6">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Register New Bank</h5>
                                <p class="text-muted">Updating Bank Name for Employees need base.</p>
                            </div>
                     
             
                  {!! Form::model($banks, ['method' => 'PATCH','route' => ['banks.update',  $banks->id]]) !!}
                  @csrf
                  
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Update Bank Name</label>
               {!! Form::text('bankname', $banks->BankName, array('placeholder' => 'Bank name','class' => 'form-control')) !!}
                                        @error('bankname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="username">Update Bank Code</label>
               {!! Form::text('bankcode', $banks->BankNo, array('placeholder' => 'Bank code','class' => 'form-control')) !!}
                                        @error('bankcode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
               
              
               
             <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary " align="center">{{ __('Update Bank') }}</button>
      </div>
    
       {!! Form::close() !!}
    
  </div>
 </div>


@endsection
