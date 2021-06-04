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
                            <a href="{!!route('ddos.index')!!}" class="btn btn-success waves-effect waves-light"><i
                                        class="mdi mdi-plus me-2"></i> Back to DDO list</a>
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Register New DDO Office</h5>
                                <p class="text-muted">Register New DDO Office for Departments.</p>

                            </div>
                            <div class="p-2 mt-4">
                               
                  {!! Form::model($ddos, ['method' => 'PATCH','route' => ['ddos.update',  $ddos->id]]) !!}
                  @csrf
                                <div class="row ">
                                   
                            <div class="mb-3">
                        <label class="form-label" for="ddocode">DDO Code</label>
                <input type="text" class="form-control @error('ddocode') is-invalid @enderror"
    name="ddocode" value="{{ $ddos->DDO }}" id="bankname" placeholder="Enter DDO Code">
             @error('ddocode')
              <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>
        <div class="mb-3">
                        <label class="form-label" for="description">DDO Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror"
    name="description" value="{{ $ddos->DDODesc }}" id="description" placeholder="Enter DDO Description">
             @error('description')
              <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>
         <div class="mb-3">
                       

     <label class="form-label">Select Department</label>
       <select class="form-control select2" name="department">
       
                                 
           @foreach($funds as $fund)
             <option value="{!!$fund->id!!}" @if($fund->id == $ddos->fund_id) ? selected="selected" @endif
              >{!!$fund->FundDesc!!}
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
            <option value="{{$district->id }}" @if($district->id == $ddos->District) ? selected="selected" @endif
              >{{$district->district}}</option>
            @endforeach
            </select>
             @error('district')
              <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>
                        
           
            <div class="btn center">
            <button type="submit" class="btn btn-primary ">{{ __('Create Update DDO Office') }}</button>
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
