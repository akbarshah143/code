@extends('layouts.master')
@section('title')
    @lang('translation.User')
@endsection

@section('content')
    @component('common-components.breadcrumb')
       @slot('pagetitle') District @endslot
        @slot('title') Baluchistan District Names @endslot
    @endcomponent
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-6">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Register New District Form</h5>
                                <p class="text-muted">Update Districts.</p>
                            </div>
                     
             
                  {!! Form::model($district, ['method' => 'PATCH','route' => ['district.update',  $district->id]]) !!}
                  @csrf
                  
                                    <div class="mb-3">
                                        <label class="form-label" for="district">Update District Name</label>
               {!! Form::text('district', $district->district, array('placeholder' => 'District name','class' => 'form-control')) !!}
                                        @error('district')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
               
              
               
             <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary " align="center">{{ __('Update District') }}</button>
      </div>
    
       {!! Form::close() !!}
    
  </div>
 </div>


@endsection
