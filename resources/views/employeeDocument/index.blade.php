@extends('layouts.master')
@section('title')
    @lang('translation.User')
@endsection
@section('css')
    <!-- DataTables -->
     <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
  
    
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') List of Application  @endslot
        @slot('title') File Upload @endslot 
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
                                <a href="{!!route('employees.create')!!}" class="btn btn-success waves-effect waves-light"><i
                                        class="mdi mdi-plus me-2"></i> Add new Applicatio For Employee</a>

                                        
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
                                    
                                    
                                      <th scope="col" class="text-left">Name</th>
                                       <th scope="col" class="text-left">F/H Name</th>
                                        <th scope="col" class="text-left">P.No</th>
                                       <th scope="col" class="text-left">CNIC</th>
                                       
                                       <th scope="col" class="text-left">Funds</th>
                                       <th scope="col" class="text-left">DDOs</th>
                                      <th scope="col" class="text-left">Title</th>
                                      <th scope="col" class="text-left">R/D Date</th>
                                       
                                       
                                </tr>
                             </thead>
                            <tbody>
                  @foreach ($employees as $employee)
                   <tr>
       
        <td class="text-left">{{ $employee->EmployeeName }}</td>
        <td class="text-left">{{ $employee->EmployeeFatherHusbandName }}</td>
        <td class="text-left">{{ $employee->PersonalNumber }}</td>
        <td class="text-left">{{ $employee->EmployeeCNIC }}</td>
       
        <td class="text-left">{{ $employee->DeptID }}</td>
        <td class="text-left">{{ $employee->DDO }}</td>
        <td class="text-left">{{ $employee->SDetObj }}</td>
         <td class="text-left">{{ $employee->DateRetirement . $employee->DateDeath }}</td>
        
       


           
             </tr>
              @endforeach
                              
           </tbody>
       </table>
          <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Upload Employee Documents</h4>
                    <p class="card-title-desc">Kindly upload the PDF file to Servers.
                    </p>

                    <div>
                        <form action="{{route('documents.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="emplId" value="{{$employee->id}}">
                            <div class="fallback">
                                <input name="file" type="file" id="file" class="filepond">
                            </div>
                           
                        
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Send Files</button>
                    </div>
                </div>
            </div>
            </form>
      
        </div>    
      </div>
    </div>
  </div>
    <!-- end row -->

@endsection
@section('script')
 <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
 
   <script type="text/javascript">
     FilePond.parse(document.body);

const inputElement = document.querySelector('input[id="file"]');
const pond = FilePond.create( inputElement );
FilePond.setOptions({
    server: {
      url:'{{route('beneficiary',$employee->id)}}',
    
      headers:{
        'X-CSRF-TOKEN': '{{csrf_token()}}'
      }

    }
});
</script>
  
@endsection