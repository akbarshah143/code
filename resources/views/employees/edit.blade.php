@extends('layouts.master')
@section('title')
    @lang('translation.User')
@endsection
@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
   
@endsection
@section('content')
     @component('common-components.breadcrumb')
        @slot('pagetitle') Employees Group insurace  @endslot
        @slot('title') Employees Insurance List @endslot
    @endcomponent
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10 col-md-12">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Register New Employees for insurance</h5>
                                <p class="text-muted">Register employees.</p>
                            </div>
    {!! Form::model($UserId, ['method' => 'PATCH','route' => ['employees.update',   $UserId->id]]) !!}
                  @csrf                       
        
   <div class="row ">
    <div class="col-lg-5 col-md-6 col-xl-4">

      <div class="mb-3">
      <label class="form-label" for="prno">Personal Number</label>
      <input type="text" class="form-control @error('prno') is-invalid @enderror"
       name="prno" value="{{ $UserId->PersonalNumber }}" id="prno" placeholder="Personal Number" required data-parsley-minlength="8">
       
             @error('prno')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>

        <div class="mb-3">
      <label class="form-label" for="name">Employee Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror"
       name="name" value="{{ $UserId->EmployeeName }}" id="name" placeholder="Employee Name" required data-parsley-minlength="5">
             @error('name')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>

         <div class="mb-3">
         <label class="form-label" for="father">Employee Father/Husband Name</label>
      <input type="text" class="form-control @error('father') is-invalid @enderror"
       name="father" value="{{ $UserId->EmployeeFatherHusbandName }}" id="father" placeholder="Employee Father/Husband Name" required data-parsley-minlength="5">
             @error('father')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>
       
        <div class="mb-3">
         <label class="form-label" for="cnic">Employee CNIC Number</label>
      <input type="text"  data-inputmask="'mask': '54400-0120001-0'" class="form-control @error('cnic') is-invalid @enderror"
       name="cnic" value="{{ $UserId->EmployeeCNIC }}" id="cnic" placeholder="54400-0120001-1" required data-parsley-minlength="15">
             @error('cnic')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>



                                 
                                      


       <div class="mb-3">
         <label class="form-label" for="birth">Date of birth</label>
      <input type="text"  id="input-date1" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy"  class="form-control birth input-mask @error('birth') is-invalid @enderror"
       name="birth" value="{{ date('d-m-Y', strtotime($UserId->DateBirth)) }}"  placeholder="15/02/2021" required>
             @error('birth')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>                     
                 
  </div>   
  <div class="col-lg-5 col-md-6 col-xl-4">

  <div class="mb-3">
     <label class="form-label">Select Department</label>
        <select class="form-control select2" id='funds' name="funds" required="">
                      <option value="" disabled selected hidden>Select Departments</option>
                      @foreach($funds  as $key => $fund)
                      <option value="{{ $fund->Fund }}" @if($UserId->DeptID  == $fund->Fund) selected="selected" @endif>{{$fund->FundDesc}} ({{$fund->Fund}})</option>
                      @endforeach
        </select>
         @error('funds')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
            </span>
          @enderror
    </div>   
    <div class="mb-3">
     <label class="form-label">Select Marital Status</label>
        <select class="form-control select2" id='marital' name="marital" required="">
                      <option value="" disabled selected hidden>Select Marital Status
                      </option>
                      @foreach($status  as $key => $marid)
                      <option value="{{ $marid->id }}" @if( $UserId->MaritalStatusID  == $marid->id) selected="selected" @endif> {{$marid->status}} </option>
                      @endforeach
        </select>
         @error('$marid')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
            </span>
          @enderror
    </div>
  <div class="mb-3">
     <label class="form-label">Select Ddo Office</label>
        <select class="form-control select2" id='ddos' name="ddos" required="">
                   <option value="{{$UserId->DDO}}" >{{$UserId->DDO}}
                      </option>
                  
        </select>
         @error('ddos')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
            </span>
          @enderror
    </div>   

    <div class="mb-3">
     <label class="form-label">Select Job Title</label>
        <select class="form-control select2" id='titles' name="title" required="">
           <option value="" disabled selected hidden>Select Job Title</option>
                      @foreach($titles  as $key => $title)
                      <option value="{{ $title->id }}" @if( $UserId->SDetObj  == $title->SDetObj) selected="selected" @endif>{{$title->SDetObjDesc}} ({{$title->SDetObj}})</option>
                      @endforeach          
        </select>
         @error('title')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
            </span>
          @enderror
    </div>   

          <div class="mb-3">
     <label class="form-label">Select Grade</label>
        <select class="form-control select2" id='grade' name="grads" required="">
           <option value="" disabled selected hidden>Select Employee Grade</option>
                      @foreach($grades  as $key => $grade)
                      <option value="{{ $grade->Grade }}" @if( $UserId->Grade  == $grade->Grade) selected="selected" @endif>{{$grade->Grade}} </option>
                      @endforeach          
        </select>
         @error('grads')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
            </span>
          @enderror
    </div>   

  </div>   
  <div class="col-lg-5 col-md-6 col-xl-4">
         <div class="mb-3">
       <label class="form-label">Select Group Insurance Type</label>
        <select class="form-control select2" id='type' name="insurance" required="">
           <option value="" disabled selected hidden>Insurace Type</option>
                      @foreach($types  as  $ins)
                      <option value="{{$ins->id}}" @if($UserId->GITypeID == $ins->id) selected="selected" @endif>{{$ins->GITypeDesc}} </option>
                      @endforeach          
        </select>
         @error('insurance')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
            </span>
          @enderror
    </div>   
       
        <div class="mb-3">
       <label class="form-label">Select Retirments/Death</label>
        <select class="form-control select" id='case' name="deathOretir" required="">
           <option value="" disabled selected hidden>Select Case </option>
                     
                      <option value="1" @if(!empty($UserId->DateRetirement) ) selected="selected" @endif>
                       
                        Retiremnet
                      </option>
                      <option value="2" @if(!empty($UserId->DateDeath) ) selected="selected" @endif>
                       
                        Death
                      </option>
                            
        </select>
         @error('deathOretir')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
            </span>
          @enderror
    </div>   


 <div class="mb-3 text" id='beneficiary' style="display: hidden;">
         <label class="form-label" for="beni">Benificiary </label>
      <input type="text"  class="form-control @error('beni') is-invalid @enderror" 
       name="beni" value="{{ $UserId->LegalHeirs }}" id="beni" placeholder="Benificiary numbers" >
             @error('beni')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>

       <div class="mb-3">
         <label class="form-label" for="birth">Retirment/Death Date</label>
      <input type="text"  id="input-date2" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy"  class="form-control enddate input-mask @error('enddate') is-invalid @enderror"
       name="enddate" @if(!empty($UserId->DateRetirement)) value="{{date('d-m-Y', strtotime($UserId->DateRetirement))}} @else value ="{{date('d-m-Y', strtotime($UserId->DateDeath))   }}" @endif required>
             @error('enddate')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>      
   

        <div class="mb-3">
         <label class="form-label" for="age">Total Age</label>
      <input type="text"  class="form-control @error('age') is-invalid @enderror" 
       name="age" value="{{ $UserId->AgeOnDate}}" id="age" placeholder="Total age" required readonly>
             @error('age')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>  

         <div class="mb-3">
         <label class="form-label" for="contribution">Contribution</label>
      <input type="text"  class="form-control @error('contribution') is-invalid @enderror" 
       name="contribution" value="{{ $UserId->Contribution }}" id="contribution" placeholder="Total Contribution" required >
             @error('Contribution')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>      

  </div>   


            <div class="btn center">
            <button type="submit" class="btn btn-primary ">{{ __('Create Employee Insurace') }}</button>
          </div>
          </div>
        </form>
        </div>

        </div>
       </div>
                    

      </div>
  
         

     @section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
   <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
 <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script type="text/javascript">
 
   $(document).ready(function(){
  $('#cnic').mask('00000-0000000-0');
  $('#birth').mask('00/00/0000');
  });

$(document).ready(function(){

$('#funds').on('change',function(){
  var fundid = $(this).val();
  console.log(fundid);
   if(fundid != '')
        {
        var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ url('/index/funds/funds') }}",
          method:"POST",
          data:{fundid:fundid, _token:_token},
           success:function(data){
            console.log(data);
            $('#ddos').empty();
              $.each(data, function(index,ddos){
            
            $('#ddos').append('<option value="'+ddos.DDO+'">'+ddos.DDODesc+' ('+ddos.DDO+')</option>');
           });

        }
        });    
  }
});
});



 $(document).on('keyup', function(){
      var birth = new Date($('.birth').val());
      var retirment = new Date($('.enddate').val());
      var totalyear = retirment.getFullYear() - birth.getFullYear();
      var yearmonth = retirment.getMonth() - birth.getMonth();
      if (yearmonth < 0 || (yearmonth === 0 && retirment.getDate() < birth.getDate())) {
        totalyear--;
          }
          if(isNaN(totalyear)){
            $('#age').val('wait...');
          } else{
         $('#age').val(totalyear);
       }
    
  });

$(document).ready(function(){

$('#beneficiary').hide();
$('#case').change(function(){ 

    if($(this).val() == "2" )
    {
        $('#beneficiary').slideDown();
    }
    else
    {
         $('#beneficiary').slideUp();
    }
     });
$(".select2").select2({
    minimumInputLength: 2
});

});

   </script>

     <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
   
    <script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
   <script src="{{ URL::asset('/assets/libs/inputmask/inputmask.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-mask.init.js') }}"></script>

     <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
@endsection
@endsection
