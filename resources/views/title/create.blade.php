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
    <label class="form-label" for="jobcode">Job title Code</label>
     <input type="text" class="form-control @error('jobcode') is-invalid @enderror"
       name="jobcode" value="{{ old('jobcode') }}" id="jobcode" placeholder="Enter job code">
             @error('jobcode')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>


    <div class="mb-3">
    <label class="form-label" for="jobtitle">Job Title</label>
     <input type="text" class="form-control @error('jobtitle') is-invalid @enderror"
       name="jobtitle" value="{{ old('jobtitle') }}" id="jobtitle" placeholder="Enter Job Title" min="0">
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
