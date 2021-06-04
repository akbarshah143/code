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
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('relation.store') }}">
                                    @csrf
                                <div class="row ">
                                   
                                    <div class="mb-3">
                                        <label class="form-label" for="relation">Relation Name</label>
               <input type="text" class="form-control @error('relation') is-invalid @enderror"
                                            name="relation" value="{{ old('relation') }}" id="relation"
                                            placeholder="Enter New Relation Name">
                                        @error('relation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                

                        
           
            <div class="btn center">
            <button type="submit" class="btn btn-primary ">{{ __('Create Relation') }}</button>
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
