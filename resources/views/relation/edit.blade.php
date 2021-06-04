@extends('layouts.master')
@section('title')
    @lang('translation.User')
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Relation Registry @endslot
        @slot('title') Created Relation List @endslot
    @endcomponent
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-6">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Register Form</h5>
                                <p class="text-muted">Registration of New Relation of Employees.</p>
                            </div>
                     
             
                  {!! Form::model($relation, ['method' => 'PATCH','route' => ['relation.update',   $relation->id]]) !!}
                  @csrf
                  
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Update Bank Name</label>
               {!! Form::text('relation',  $relation->RelationDesc, array('placeholder' => 'Relation Name','class' => 'form-control')) !!}
                                        @error('relation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
               
              
               
             <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary " align="center">{{ __('Update Relation') }}</button>
      </div>
    
       {!! Form::close() !!}
    
  </div>
 </div>


@endsection
