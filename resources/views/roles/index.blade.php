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


                    </div>
                    <!-- end row -->
                    <div class="table-responsive mb-4">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead>
                                <tr>
                                    
                                    <th scope="col" class="text-center">S.No</th>
                                      <th scope="col" class="text-center">Roles / Group Name</th>
                                      
                                    <th scope="col" class="text-center" style="width: 200px;">Action</th>
                                </tr>
                             </thead>
                            <tbody>
                  @foreach ($roles as $key => $role)
                   <tr>
        <td class="text-center">{{ ++$i }}</td>
        <td class="text-center">{{ $role->name }}</td>

        <td  class="text-center" >
           
             <a  href="{{ route('roles.show',$role->id) }}"   class="btn btn-outline-info waves-effect waves-light btn-sm" rel="tooltip" title="Show Permission">
                     Show</a>
          
           
                <a  href="{{ route('roles.edit',$role->id) }}"  rel="tooltip" title="Edit Task"class="btn btn-outline-dark waves-effect waves-light btn-sm">
                     Edit</a>
             
          

                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger waves-effect waves-light btn-sm', 'rel' => 'tooltip','title'=> 'Delete Task']) !!}
                {!! Form::close() !!}


           
             </tr>
              @endforeach
                              
           </tbody>
              </table>
                  </div>
                    <div class="row mt-4" align="center">
                        <div class="col-sm-4">
                            <div>
                                <p class="mb-sm-0">Showing 1 to 12 entries</p>
                            </div>
                        </div>
                        <div class="col-sm-6" align="center" >
                            <div class="float-sm-end">
                                <ul class="pagination mb-sm-0">
                                    <li class="page-item disabled">

                                       {!! $roles->links()!!}
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
