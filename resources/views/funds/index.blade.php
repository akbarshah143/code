@extends('layouts.master')
@section('title')
    @lang('translation.User')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') Funds @endslot
        @slot('title') Departments of Baluchistan @endslot
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
                                <a href="{!!route('funds.create')!!}" class="btn btn-success waves-effect waves-light"><i
                                        class="mdi mdi-plus me-2"></i>Add New Fund / Departments</a>

                                        
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
                      
                        <table  class="table table-centered table-nowrap mb-0">
                            <thead>
                                <tr>
                                    
                                    <th scope="col" class="text-left">S.No</th>
                                      <th scope="col" class="text-left">Fund Code</th>
                                       <th scope="col" class="text-left">Department Description</th>
                                       
                                       <th scope="col" class="text-left">Created By</th>
                                      
                                    <th scope="col" class="text-center" style="width: 200px;">Action</th>
                                </tr>
                             </thead>
                            <tbody>
                  @foreach ($funds as $fund)
                   <tr>
        <td class="text-left">{{ $fund->id}}</td>
        <td class="text-left">{{ $fund->Fund }}</td>
        <td class="text-left">{{ $fund->FundDesc }}</td>
       
        <td class="text-left">{{ $fund->getUsers->name }}</td>

        <td  class="text-center" >
           
                <a  href="{{ route('funds.edit',$fund->id) }}"  rel="tooltip" title="Edit Task"class="btn btn-outline-dark waves-effect waves-light btn-sm">
                     Edit</a>
             
          

                {!! Form::open(['method' => 'DELETE','route' => ['funds.destroy', $fund->id],'style'=>'display:inline']) !!}
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
                                    {!! $funds->links()!!} 
                                      
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
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection