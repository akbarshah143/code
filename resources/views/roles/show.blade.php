@extends('layouts.master')
@section('title')
    @lang('translation.User')
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Users @endslot
        @slot('title') User List @endslot
    @endcomponent

    <div class="row">
       
             @if (session()->has('updated'))
            <div class="alert alert-warning">
          {{ session('updated') }}
          </div>
           @endif
       @if (session()->has('deleted'))
            <div class="alert alert-danger">
          {{ session('deleted') }}
         </div>
         @endif
         @if (session()->has('created'))
            <div class="alert alert-success">
          {{ session('created') }}
    </div>
      @endif

            <div class="card ">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <a href="{!!route('roles.create')!!}" class="btn btn-success waves-effect waves-light"><i
                                        class="mdi mdi-plus me-2"></i> Add New Roles</a>
                                         <a href="{!!route('roles.index')!!}" class="btn btn-primary waves-effect waves-light"><i
                                        class="mdi mdi-plus me-2"></i> Back To Roles</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-inline float-md-end mb-3">
                                <div class="search-box ms-2">
                                    <div class="position-relative">
                                        <input type="text" class="form-control rounded bg-light border-0"
                                            placeholder="Search...">
                                        <i class="mdi mdi-magnify search-icon"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                 <div class="table-responsive table-upgrade">
              
                  <div class="col-xs-4 col-sm-6 col-md-8">
        
             <lable for="name">
          <h5>Roles Name:-  {{ $role->name }}</h5> </lable>
        
    </div>
    <div class="col-xs-6 col-sm-8 col-md-8">
        <div class="form-group">
          
           <strong>Bellow assigned Permissions:</strong>
              <div class="card " align="text-center">
                <div class="card-body text-center">
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                
                  <label class="btn btn-success waves-effect waves-light" for="btncheck1">
                    <span> {{ $v->name }}&nbsp;&nbsp;&nbsp;</span></label>
                    
                @endforeach
               

              @endif
            </div>
          </div>
        </div>
       </div>
              
       </div>

                    </div>
                    <!-- end row -->
                    <div class="table-responsive mb-4">
                       
                  </div>
                    <div class="row mt-4" align="center">
                       
                        <div class="col-sm-6" align="center" >
                            <div class="float-sm-end">
                                <ul class="pagination mb-sm-0">
                                    <li class="page-item disabled">

                                       
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
