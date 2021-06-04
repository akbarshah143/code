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
        @slot('pagetitle') Funds @endslot
        @slot('title') Departments of Baluchistan @endslot
    @endcomponent
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-6">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Register New Fund/ Departments</h5>
                                <p class="text-muted">Register New Fund/ Departments Governament of baluchistan.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('funds.store') }}">
                                    @csrf
                                <div class="row ">
                                   
                            <div class="mb-3">
                        <label class="form-label" for="fundcode">Fund Code</label>
                <input type="text" class="form-control @error('fundcode') is-invalid @enderror"
    name="fundcode" value="{{ old('fundcode') }}" id="fundcode" placeholder="Enter Fund /Departments Code">
             @error('fundcode')
              <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>
        <div class="mb-3">
                        <label class="form-label" for="description">Departments Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror"
    name="description" value="{{ old('description') }}" id="description" placeholder="Enter Fund / Departments Description">
             @error('description')
              <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>

                        
           
            <div class="btn center">
            <button type="submit" class="btn btn-primary ">{{ __('Create Fund / Department') }}</button>
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
@endsection
@endsection
