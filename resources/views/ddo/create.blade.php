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
        @slot('pagetitle') DDO Office @endslot
        @slot('title') Create DDO @endslot
    @endcomponent
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-6">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Register New DDO Office</h5>
                                <p class="text-muted">Register New DDO Office for Departments.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('ddos.store') }}">
                                    @csrf
                                <div class="row ">
                                   
                            <div class="mb-3">
                        <label class="form-label" for="ddocode">DDO Code</label>
                <input type="text" class="form-control @error('ddocode') is-invalid @enderror"
    name="ddocode" value="{{ old('ddocode') }}" id="bankname" placeholder="Enter DDO Code">
             @error('ddocode')
              <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>
        <div class="mb-3">
                        <label class="form-label" for="description">DDO Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror"
    name="description" value="{{ old('description') }}" id="description" placeholder="Enter DDO Description">
             @error('description')
              <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>
         <div class="mb-3">
                                       
     <label class="form-label">Select Department</label>
       <select class="form-control select2" name="department">
        <option>Select</option>
                                       
           @foreach($funds as $fund)
             <option value="{!!$fund->id!!}">{!!$fund->FundDesc!!}
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
           <label class="form-label" for="district">Select District</label>
        <select  class="form-control select2" name="district"  id="district">
            @foreach($districts as $district)
            <option value="{{$district->id }}">{{$district->district}}</option>
            @endforeach
            </select>
             @error('district')
              <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>
                        
           
            <div class="btn center">
            <button type="submit" class="btn btn-primary ">{{ __('Create DDO Office') }}</button>
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
