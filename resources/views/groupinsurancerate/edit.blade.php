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
        @slot('pagetitle') Group Insurance Rate @endslot
        @slot('title') Group Insurance List @endslot
    @endcomponent
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-6">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Register New Group Insurace Rate Form</h5>
                                <p class="text-muted">Register Group Rate.</p>
                            </div>
                            <div class="p-2 mt-4">
       {!! Form::model($rate, ['method' => 'PATCH','route' => ['grouprate.update', $rate->id]]) !!}
              @csrf
                   
    <div class="row ">
                                   
        <div class="mb-3">
                                       
     <label class="form-label">Select Grade </label>
     {!! Form::select('Grade_From', $grade, $rate->id , array('placeholder' => 'Grade select','class' => 'form-control')) !!}
      
         @error('Grade_From')
     <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        


    <div class="mb-3">
    <label class="form-label" for="Retirement">Retirement Rate</label>
     <input type="number" class="form-control @error('Retirement') is-invalid @enderror"
       name="Retirement" value="{{ $rate->Retirement }}" id="Retirement" placeholder="Enter Retirement Rate" min="0">
             @error('Retirement')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>

        <div class="mb-3">
    <label class="form-label" for="Death">Death Rate</label>
     <input type="number" class="form-control @error('Death') is-invalid @enderror"
       name="Death" value="{{ $rate->Death }}" id="Death" placeholder="Enter Death Rate" min="0">
             @error('Death')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>


                           <div class="mb-3">
                                    <label class="form-label">Start Date</label>
                                    <div class="input-group" id="datepicker2">
                                        <input type="text" name="startdate"  value="{{ $rate->BeginDate }}"
                                        class="form-control  @error('startdate') is-invalid @enderror" placeholder="dd M, yyyy"
                                            data-date-format="dd M, yyyy" data-date-container='#datepicker2'
                                            data-provide="datepicker" data-date-autoclose="true">

                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div><!-- input-group -->
                                     @error('startdate')
                                   <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                        </span>
                                           @enderror
                                </div>
                                
                            <div class="mb-3">
                                    <label class="form-label">End Date</label>
                                    <div class="input-group" id="datepicker2">
                                        <input type="text" name="enddate"  value="{{  $rate->EndDate }}" class="form-control @error('enddate') is-invalid @enderror" placeholder="dd M, yyyy"
                                            data-date-format="dd M, yyyy" data-date-container='#datepicker2'
                                            data-provide="datepicker" data-date-autoclose="true">

                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div><!-- input-group -->
                                 @error('enddate')
                                   <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                        </span>
                                           @enderror
                                </div>
                                
           
            <div class="btn center">
            <button type="submit" class="btn btn-primary ">{{ __('Update Group Insurance Rate Per Record') }}</button>
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
