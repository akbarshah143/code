@extends('layouts.master')
@section('title')
    @lang('translation.User')
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Banks @endslot
        @slot('title') Updating Banks @endslot
    @endcomponent
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-6">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Update Branch Name</h5>
                                <p class="text-muted">Updating Bank Branches Name for Employees need base.</p>
                            </div>
                     
             
                  {!! Form::model($branch, ['method' => 'PATCH','route' => ['branches.update',  $branch->id]]) !!}
                  @csrf
             <div class="mb-3">
          <label class="form-label" for="bankname">Update Bank Name</label>
      <select  class="form-control @error('bankname') is-invalid @enderror"
                name="bankname"  id="bankname"  placeholder="Enter Bank Name">
                        <option value="{{$branch->id}}">{{$branch->getbanks->BankName}}</option>
                          @foreach($list as $bank)
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
                  <label class="form-label" for="branchname">Update Bank Branch Name</label>
         {!! Form::text('branchname', $branch->BankDesc, array('placeholder' => 'Bank name','class' => 'form-control')) !!}
       @error('branchname')
         <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                         </div>

                          <div class="mb-3">
                  <label class="form-label" for="branchname">Update Bank Branch Code</label>
         {!! Form::text('branchcode', $branch->BranchID, array('placeholder' => 'Bank name','class' => 'form-control')) !!}
       @error('branchcode')
         <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
                   </span>
                   @enderror
                         </div>

                              </div>
               
              
               
             <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary " align="center">{{ __('Update Bank Branch') }}</button>
      </div>
    
       {!! Form::close() !!}
    
  </div>
 </div>


@endsection
