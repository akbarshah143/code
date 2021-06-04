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
        @slot('pagetitle') List of Application  @endslot
        @slot('title') Application List @endslot
    @endcomponent

    <div class="row">
       
             @if (session()->has('updated'))
            <div class="alert alert-success">
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
                      
                  <div class="item-wrapper">
                    <div class="table-responsive">
                      <table class="table info-table table-striped">
                        <thead>
                          <tr>
                             <th>Employee ID</th><th>Full Name</th><th>Father/Husband Name</th><th>Department</th><th>Marital Status</th>
                          </tr>
                        </thead>
                        <tbody>
                      
                          <tr>
                            <td>{{$empid->id}}</td>
                            <td>{{$empid->EmployeeName}}</td>
                            <td>{{$empid->EmployeeFatherHusbandName}}</td>
                            <td>{{$empid->DeptID}}</td>
                           <td>
                            @if($empid->MaritalStatusID == 01)
                             Married
                             @else
                             single
                             @endif
                           
                              
                            </td>
                          </tr>
                          </tbody>
                          <thead>
                            <tr>
                              <th>Personal No</th><th>Employee CNIC No</th>
                            <th>Department DDO</th> <th>Job Title</th>
                           <th>Employee Age</th>
                            </tr>
                          </thead>
                         <tbody>
                          
                          <tr>
                           <td>{{$empid->PersonalNumber}}</td>
                            <td>{{$empid->EmployeeCNIC}}</td>
                            <td>{{$empid->DDO}}</td>
                            <td>{{$empid->SDetObj}}</td>
                            <td>{{$empid->AgeOnDate}}</td>
                           
                           
                          </tr>
                        </tbody>
                        <thead>
                            <tr>
                              <th>Retirement</th><th>Group ID</th><th>Contribution Amount</th>  <th>Death Date</th><th>Beneficiary</th>
                            </tr>
                          </thead>
                         <tbody>
                          
                          <tr>
                            <td>{{$empid->DateRetirement}}</td>
                            <td>{{$empid->GITypeID}}</td>
                            <td>Rs.{{$empid->Contribution}}</td>
                             <td class="actions" >{{$empid->DateDeath}}  </td>
                        <td class="actions">{{$empid->LegalHeirs}}
                             
                           
                              
                            </td>
                          </tr>
                        </tbody>
                        <td colspan="5" style="background-color: black;">
                          </td>
                      </table>
              


              
                       <p class="grid-header"> Group Insurance,Beneficiary information</p>
        
                        <table class="table info-table table-striped">
                           @foreach($beneficiares as $beneficiary)
                        <thead>
                          <tr>
                             <th>Serial No</th><th>Full Name</th><th>Relation</th><th>Beneficiary CNIC</th>  <th>Increase Amount</th>
                          </tr>
                        </thead>
                        <tbody>
                      
                          <tr>
                           <td>{{$beneficiary->id}}</td>
                            <td>{{$beneficiary->EmployeeHeirName}}</td>
                            <td>{{$beneficiary->RelationID}}</td>
                            <td>{{$beneficiary->EmployeeHeirCNIC}}</td>
                            <td class="actions">{{$beneficiary->Increase}}</td>
                           
                              <i class="mdi mdi-dots-vertical"></i>
                            </td>
                          </tr>
                          </tbody>
                          <thead>
                          <tr>
                            <th>Bank Id</th><th>Branch Id</th><th>Account No</th><th>Individual Amount</th>  <th>Entry Date</th>
                          </tr>
                        </thead>
                        <tbody>
                      
                          <td>{{$beneficiary->BankID}}</td>
                            <td>{{$beneficiary->BranchID}}</td>
                            <td>{{$beneficiary->AccountID}}</td>
                            <td>{{$beneficiary->Amount}}</td>
                            <td class="actions">{{$beneficiary->created_at}}
                           
                              <i class="mdi mdi-dots-vertical"></i>
                            </td>
                          </tr>
                          <td colspan="5" style="background-color: black;">
                          </td>
                          </tbody>
                           @endforeach
                           <thead>
                           <tr>
                            <th colspan="2" >{{$beneficiary->LegalHeir_EntryUser}}</th>
                            <th colspan="3" align="left">Employee is Trusted and belongs to Our Departments</th>
                          </tr>
                        </thead>
                        </table>
                       
                    </div>
                  </div>
                </div>
              </div>
    <script type="text/javascript">
      $('a.printPage').click(function(){
           window.print();
           return false;
});
    </script>          
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection