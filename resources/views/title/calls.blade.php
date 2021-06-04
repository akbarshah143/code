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
        @slot('pagetitle') Employees job Title @endslot
        @slot('title') Employees Title List @endslot
    @endcomponent
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-6">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Register New Employees Job Title</h5>
                                <p class="text-muted">Register Job Title.</p>
                            </div>
                            <div class="p-2 mt-4">
        {!! Form::open(array('route' => 'title.store','method'=>'POST')) !!}
              @csrf
    <div class="row ">
                                   
        <div class="mb-3">
                                       
     <label class="form-label">Select Departments</label>
     {!! Form::select('department', $funds, $funds, array('placeholder' => 'Select Department','class' => 'form-control select2')) !!}
      
         @error('department')
     <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="mb-3">
                                       
     <label class="form-label">Select DDO Office</label>
        {!! Form::select('ddo', $ddos, null , array('placeholder' => 'Select DDO Office ','class' => 'form-control select2')) !!}
         @error('ddo')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

  <div class="mb-3">
                                       
     <label class="form-label">Select DDO Office</label>
        {!! Form::select('jobcode', $jobscode, null, array('placeholder' => 'Select job Code ','class' => 'form-control select2','id'=>'jobcode')) !!}
         @error('jobcode')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

 

    <div class="mb-3">
                                       
     <label class="form-label">Select Job Title</label>
        {!! Form::select('jobtitle', $jobsdes, null, array('placeholder' => 'Select Job Title ','class' => 'form-control select2','id'=>'jobtitle')) !!}
         @error('jobtitle')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

       


                          
                                
                            
                                
           
            <div class="btn center">
            <button type="submit" class="btn btn-primary ">{{ __('Create Job Title') }}</button>
          </div>
           </div>

                                    

                                    
                                
                                   
                                </form>
                            </div>

                        </div>
                    </div>
                    

                </div>
            </div>
          

     @section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
   <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>


    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
   
    <script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>
   
@endsection
@endsection
