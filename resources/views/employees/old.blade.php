@extends('layouts.app', ['activePage' => 'employees', 'titlePage' => __('Employees Insurace Create')])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-xl-11 col-md-10 ml-auto mr-auto">
         
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Registeration of Group Insurace Form</h4>
            <p class="card-category">Create New Application .</p>
             </div>
              {!! Form::open(array('route' => 'employees.store','method'=>'POST')) !!}
                    @csrf
                    <br>
                    <div class="row">
                         <div class="col-lg-4 col-md-4 ml-auto mr-auto">
                          <div class="bmd-form-group{{ $errors->has('Employee_ID') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                {!! Form::text('Employee_ID', null, array('placeholder' => 'Employee ID','class' => 'form-control')) !!}
               
              </div>
               
                @if ($errors->has('Employee_ID'))
                <div id="BankID-error" class="error text-danger pl-3" for="BankID" style="display: block;">
                  <strong>{{ $errors->first('Employee_ID') }}</strong>
                </div>
                 @endif
                </div>
                 <div class="bmd-form-group{{ $errors->has('PersonalNumber') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                {!! Form::text('PersonalNumber', null, array('placeholder' => 'Personal Number','class' => 'form-control')) !!}
               
              </div>
               
                @if ($errors->has('PersonalNumber'))
                <div id="PersonalNumber-error" class="error text-danger pl-3" for="PersonalNumber" style="display: block;">
                  <strong>{{ $errors->first('PersonalNumber') }}</strong>
                </div>
                 @endif
               </div>
                <div class="bmd-form-group{{ $errors->has('EmployeeName') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                {!! Form::text('EmployeeName', null, array('placeholder' => 'Employee Name','class' => 'form-control')) !!}
               
              </div>
               
                @if ($errors->has('EmployeeName'))
                <div id="EmployeeName-error" class="error text-danger pl-3" for="EmployeeName" style="display: block;">
                  <strong>{{ $errors->first('EmployeeName') }}</strong>
                </div>
                 @endif
                 </div>
                  <div class="bmd-form-group{{ $errors->has('Father/Housband') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                {!! Form::text('Father/Housband', null, array('placeholder' => 'Name Father/Housband','class' => 'form-control')) !!}
               
              </div>
               
                @if ($errors->has('Father/Housband'))
                <div id="Father/Housband-error" class="error text-danger pl-3" for="Father/Housband" style="display: block;">
                  <strong>{{ $errors->first('Father/Housband') }}</strong>
                </div>
                 @endif
             </div>
             <div class="bmd-form-group{{ $errors->has('EmployeeCNIC') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                {!! Form::text('EmployeeCNIC', null, array('placeholder' => 'Employee CNIC','class' => 'form-control')) !!}
               
              </div>
               
                @if ($errors->has('EmployeeCNIC'))
                <div id="EmployeeCNIC-error" class="error text-danger pl-3" for="EmployeeCNIC" style="display: block;">
                  <strong>{{ $errors->first('EmployeeCNIC') }}</strong>
                </div>
                 @endif
                </div>
               
                 <div class="bmd-form-group{{ $errors->has('DateBirth') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                {!! Form::label('DateBirth', 'Birth Date', ['class' => 'form-contro']) !!}
                {!! Form::date('DateBirth', null, array('placeholder' => 'Date of Birth','class' => 'form-control')) !!}
               
              </div>
               
                @if ($errors->has('DateBirth'))
                <div id="DateBirth-error" class="error text-danger pl-3" for="DateBirth" style="display: block;">
                  <strong>{{ $errors->first('DateBirth') }}</strong>
                </div>
                 @endif
               </div>
               

                        </div>
      <!--/////////////////////////////////////////////////////////////////////////////-->
      <div class="col-lg-4 col-md-4 ml-auto mr-auto">
                 <div class="bmd-form-group{{ $errors->has('ddo_code') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                  <input type="text" name="category_name" id="category_name" class="form-control" placeholder="required">
              <!-- {!! Form::text('category_name', null, array('placeholder' => 'DDO required','class' => 'form-control', 'id' => 'category_name')) !!} -->
                  <div class="input-group input-group-prepend" id="categoryList"></div>
                  @csrf
              </div>
               
                @if ($errors->has('ddo_code'))
                <div id="ddo_code-error" class="error text-danger pl-3" for="ddo_code" style="display: block;">
                  <strong>{{ $errors->first('ddo_code') }}</strong>
                </div>
                 @endif
                 </div>
                  {{ csrf_field() }}
                 <div class="bmd-form-group{{ $errors->has('DeptID') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                {!! Form::text('DeptID', null, array('placeholder' => 'Department ID','class' => 'form-control')) !!}
               
              </div>
               
                @if ($errors->has('DeptID'))
                <div id="DeptID-error" class="error text-danger pl-3" for="DeptID" style="display: block;">
                  <strong>{{ $errors->first('DeptID') }}</strong>
                </div>
                @endif
                </div>
                 <div class="bmd-form-group{{ $errors->has('MaritalStatusID') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                {!! Form::text('MaritalStatusID', null, array('placeholder' => 'Marital Status','class' => 'form-control')) !!}
               
              </div>
               
                @if ($errors->has('MaritalStatusID'))
                <div id="MaritalStatusID-error" class="error text-danger pl-3" for="MaritalStatusID" style="display: block;">
                  <strong>{{ $errors->first('MaritalStatusID') }}</strong>
                </div>
                 @endif
              </div>
                
                    <div class="bmd-form-group{{ $errors->has('Grade') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                {!! Form::text('Grade', null, array('placeholder' => 'Employee Grade','class' => 'form-control')) !!}
               
              </div>
               
                @if ($errors->has('Grade'))
                <div id="Grade-error" class="error text-danger pl-3" for="Grade" style="display: block;">
                  <strong>{{ $errors->first('Grade') }}</strong>
                </div>
                 @endif
                </div>
                <div class="bmd-form-group{{ $errors->has('SDetObj') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                {!! Form::text('SDetObj', null, array('placeholder' => 'SDetObj','class' => 'form-control')) !!}
               
              </div>
               
                @if ($errors->has('SDetObj'))
                <div id="SDetObj-error" class="error text-danger pl-3" for="SDetObj" style="display: block;">
                  <strong>{{ $errors->first('SDetObj') }}</strong>
                </div>
                 @endif
                 </div>
                 <div class="bmd-form-group{{ $errors->has('Group_InsuraceType') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                {!! Form::text('Group_InsuraceType', null, array('placeholder' => 'Group Insurance Type','class' => 'form-control')) !!}
               
              </div>
               
                @if ($errors->has('Group_InsuraceType'))
                <div id="Group_InsuraceType-error" class="error text-danger pl-3" for="Group_InsuraceType" style="display: block;">
                  <strong>{{ $errors->first('Group_InsuraceType') }}</strong>
                </div>
                 @endif
               </div>
               
        </div>                  
<!--/////////////////////////////////////////////////////////////////////////////////// -->
                        <div class="col-lg-4 col-md-4 ml-auto mr-auto">
                       
                       
                <div class="bmd-form-group{{ $errors->has('Retirement_Date') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                    {!!  Form::label('Retirement_Date', 'Retiremnet', ['class' => 'form-contro']); !!}
                {!! Form::date('Retirement_Date', null, array('placeholder' => 'Retirement Date','class' => 'form-control')) !!}

               
              </div>
               
                @if ($errors->has('Retirement_Date'))
                <div id="Retirement_Date-error" class="error text-danger pl-3" for="Retirement_Date" style="display: block;">
                  <strong>{{ $errors->first('Retirement_Date') }}</strong>
                </div>
                 @endif
                </div>
                <div class="bmd-form-group{{ $errors->has('Death_Date') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                    {!!  Form::label('Death_Date', 'Death', ['class' => 'form-contro']); !!}
                {!! Form::date('Death_Date', null, array('placeholder' => 'Death Date','class' => 'form-control')) !!}

               
              </div>
               
                @if ($errors->has('Death_Date'))
                <div id="Death_Date-error" class="error text-danger pl-3" for="Death_Date" style="display: block;">
                  <strong>{{ $errors->first('Death_Date') }}</strong>
                </div>
                 @endif
                </div>
                <div class="bmd-form-group{{ $errors->has('Total_Age') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                {!! Form::number('Total_Age', null, array('placeholder' => 'Employe total age','class' => 'form-control')) !!}
               
              </div>
               
                @if ($errors->has('Total_Age'))
                <div id="Total_Age-error" class="error text-danger pl-3" for="Total_Age" style="display: block;">
                  <strong>{{ $errors->first('Total_Age') }}</strong>
                </div>
                 @endif
                 </div>
                 <div class="bmd-form-group{{ $errors->has('Beneficiary') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                {!! Form::number('Beneficiary', null, array('placeholder' => 'Beneficiary Number','class' => 'form-control')) !!}
               
              </div>
               
                @if ($errors->has('Beneficiary'))
                <div id="Beneficiary-error" class="error text-danger pl-3" for="Beneficiary" style="display: block;">
                  <strong>{{ $errors->first('Beneficiary') }}</strong>
                </div>
                 @endif
               </div>

             
                  <div class="bmd-form-group{{ $errors->has('Contribution') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                {!! Form::text('Contribution', null, array('placeholder' => 'Contribution','class' => 'form-control')) !!}
               
              </div>
               
                @if ($errors->has('Contribution'))
                <div id="Contribution-error" class="error text-danger pl-3" for="Contribution" style="display: block;">
                  <strong>{{ $errors->first('Contribution') }}</strong>
                </div>
                 @endif
                </div>
                <div class="bmd-form-group{{ $errors->has('') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                {!! Form::label('time', now(), array('placeholder' => ' required','class' => 'form-control')) !!}
               
              </div>
               
                @if ($errors->has(''))
                <div id="-error" class="error text-danger pl-3" for="" style="display: block;">
                  <strong>{{ $errors->first('') }}</strong>
                </div>
                 @endif
                 </div>
                

                        </div>

                  
                 </div>
             <div class="row">
             <div class="col-lg-6 col-md-8 col-sm-10 ml-auto mr-auto">
             <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary ">{{ __('Save DDO Name') }}</button>
           </div>
          </div>
          {!! Form::close() !!}
              </div>
        </div>
       </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function(){

 $('#category_name').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ url('/employees/getCategory') }}",
          method:"GET",
          data:{query:query, _token:_token},
          success:function(data){
           $('#categoryList').fadeIn();  
                    $('#categoryList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#category_name').val($(this).text());  
        $('#categoryList').fadeOut();  
    });  

});
</script>
@endsection