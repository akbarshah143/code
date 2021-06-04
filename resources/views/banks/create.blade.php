@extends('layouts.master')
@section('title')
    @lang('translation.User')
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Roles @endslot
        @slot('title') Create Role @endslot
    @endcomponent
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-6">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Register New Bank</h5>
                                <p class="text-muted">Register New Bank for Employees & Permission.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('banks.store') }}">
                                    @csrf
                                <div class="row ">
                                   
                                    <div class="mb-3">
                                        <label class="form-label" for="bankname">Bank Name</label>
               <input type="text" class="form-control @error('bankname') is-invalid @enderror"
                                            name="bankname" value="{{ old('bankname') }}" id="bankname"
                                            placeholder="Enter Bank Name">
                                        @error('bankname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
        <div class="mb-3">
     <label class="form-label" for="bankname">Bank Code</label>
        <input type="text" class="form-control @error('bankcode') is-invalid @enderror"
         name="bankcode" value="{{ old('bankcode') }}" id="bankcode"
                 placeholder="Enter Bank Code">
                 @error('bankcode')
             <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
 </div>
                        
           
            <div class="btn center">
            <button type="submit" class="btn btn-primary ">{{ __('Create Bank') }}</button>
          </div>
           </div>

                                    

                                    
                                
                                   
                                </form>
                            </div>

                        </div>
                    </div>
                    

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
