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
                                <h5 class="text-primary">Register New Bank Branch</h5>
                                <p class="text-muted">Register New Bank Branch for Employees .</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('branches.store') }}">
                                    @csrf
                                <div class="row ">
                                   
                                    <div class="mb-3">
                                        <label class="form-label" for="bankname">Bank Name</label>
                                            <select  class="form-control @error('bankname') is-invalid @enderror"
                                             name="bankname" value="{{ old('bankname') }}" id="bankname"
                                               placeholder="Enter Bank Name">
                                         @foreach($banks as $bank)
                                        <option value="{{$bank->id}}">{{$bank->BankName}}</option>
                                        @endforeach
                                     </select>
                                    @error('bankname')
                                   <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                 </span>
                               @enderror
                            </div>

                             <div class="mb-3">
                                        <label class="form-label" for="branchcode">Bank Branch Code</label>
                                            <input type="text"  class="form-control @error('branchcode') is-invalid @enderror"
                                             name="branchcode" value="{{ old('branchcode') }}" id="branchcode"
                                               placeholder="Enter Bank Branch Code">
                                
                                    @error('branchcode')
                                   <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                 </span>
                               @enderror
                            </div>


                            <div class="mb-3">
                                        <label class="form-label" for="branchname">Bank Branch Name</label>
                                            <input type="text"  class="form-control @error('branchname') is-invalid @enderror"
                                             name="branchname" value="{{ old('branchname') }}" id="branchname"
                                               placeholder="Enter Bank Branch Name">
                                
                                    @error('branchname')
                                   <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                 </span>
                               @enderror
                            </div>
                         <div class="btn center">
                     <button type="submit" class="btn btn-primary ">{{ __('Create Bank Branch') }}</button>
                 </div>
              </div>
           </form>
         </div>
      </div>
    </div>
   </div>
</div>
</div>
        <!-- end container -->
</div>
@endsection
