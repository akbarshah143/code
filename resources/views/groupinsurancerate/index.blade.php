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
        @slot('pagetitle') Group Insurance Rate @endslot
        @slot('title') Group Insurance List @endslot
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
                                <a href="{!!route('grouprate.create')!!}" class="btn btn-success waves-effect waves-light"><i
                                        class="mdi mdi-plus me-2"></i> Add New Group Rate</a>

                                        
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
                                      <th scope="col" class="text-left">Grade</th>
                                       <th scope="col" class="text-left">Retirment Rate</th>
                                       <th scope="col" class="text-left">Death Rate</th>
                                       <th scope="col" class="text-left">Begin Date</th>
                                       <th scope="col" class="text-left">End Date</th>
                                       <th scope="col" class="text-left">Created By</th>
                                      
                                    <th scope="col" class="text-center" style="width: 200px;">Action</th>
                                </tr>
                             </thead>
                            <tbody>
                  @foreach ($grates as $rate)
                   <tr>
        <td class="text-left">{{ $rate->id}}</td>
        <td class="text-left">{{ $rate->Grade}}</td>
        <td class="text-left">{{ $rate->Retirement}}</td>
        <td class="text-left">{{ $rate->Death}}</td>
        <td class="text-left">{{ $rate->BeginDate}}</td>
        <td class="text-left">{{ $rate->EndDate}}</td>
        <td class="text-left">{{ $rate->getUsers->name }}</td>

        <td  class="text-center" >
           
                <a  href="{{ route('grouprate.edit',$rate->id) }}"  rel="tooltip" title="Edit Task"class="btn btn-outline-dark waves-effect waves-light btn-sm">
                     Edit</a>
             
          

                {!! Form::open(['method' => 'DELETE','route' => ['grouprate.destroy', $rate->id],'style'=>'display:inline']) !!}
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
                                    {!! $grates->links()!!} 
                                      
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