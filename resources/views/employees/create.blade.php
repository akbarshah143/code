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
                           
        {!! Form::open(array('route' => 'employees.store','method'=>'POST','class'=>'custom-validation')) !!}
              @csrf
   <div class="row ">
    <div class="col-lg-5 col-md-6 col-xl-4">

      <div class="mb-3">
      <label class="form-label" for="prno">Personal Number</label>
      <input type="text" class="form-control @error('prno') is-invalid @enderror"
       name="prno" value="{{ old('prno') }}" id="prno"  required data-parsley-minlength="8">
        <div id="personal" ></div>
             @error('prno')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>

         <div class="mb-3">
         <label class="form-label" for="cnic">Employee CNIC Number</label>
      <input type="text"  data-inputmask="'mask': '54400-0120001-0'" class="form-control @error('cnic') is-invalid @enderror"
       name="cnic" value="{{ old('cnic') }}" id="cnic"  required data-parsley-minlength="15">
        <div id="error_cnic" ></div>
             @error('cnic')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>

        <div class="mb-3">
      <label class="form-label" for="name">Employee Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror"
       name="name" value="{{ old('name') }}" id="name"  required data-parsley-minlength="5">
             @error('name')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>

         <div class="mb-3">
         <label class="form-label" for="father">Employee Father/Husband Name</label>
      <input type="text" class="form-control @error('father') is-invalid @enderror"
       name="father" value="{{ old('father') }}" id="father"  required data-parsley-minlength="5">
             @error('father')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>
       


       <div class="mb-3">
         <label class="form-label" for="birth">Date of birth</label>
      <input type="text"  id="input-date1" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy"  class="form-control birth input-mask @error('birth') is-invalid @enderror"
       name="birth" value="{{ old('birth') }}"   required>
             @error('birth')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>                     
                 
  </div>   
  <div class="col-lg-5 col-md-6 col-xl-4">
 
 <div class="mb-3">
     <label class="form-label">Select Ddo Office</label>
        <select class=" select2 form-control select2-multiple " multiple="multiple" id='ddos' name="ddos" required="">
                  
                      @foreach($ddos  as $key => $ddo)
                      <option value="{{ $ddo->DDO}}" @if( old('ddos')  == $ddo->DDO) selected="selected" @endif>{{$ddo->DDODesc}} ({{$ddo->DDO}})</option>
                      @endforeach
        </select>
         @error('ddos')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
            </span>
          @enderror
    </div>

  <div class="mb-3">
     <label class="form-label">Select Department</label>
        <input type="text" class="form-control" id='funds' name="funds" required="" readonly="">
                      
       
         @error('funds')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
            </span>
          @enderror
    </div>   
    <div class="mb-3">
     <label class="form-label">Select Marital Status</label>
        <select class="select2 form-control select2-multiple" multiple="multiple" id='marital' name="marital" required="">
                     
                     
                      @foreach($status  as $key => $marid)
                      <option value="{{ $marid->id }}" @if( old('marital')  == $marid->id) selected="selected" @endif> {{$marid->status}} </option>
                      @endforeach
        </select>
         @error('$marid')
         <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
            </span>
          @enderror
    </div>
    

    <div class="mb-3">
     <label class="form-label">Select Job Title</label>
        <select class="select2 form-control select2-multiple" multiple="multiple" id='titles' name="title" required="">
        
                      @foreach($titles  as $key => $title)
                      <option value="{{ $title->id }}" @if( old('title')  == $title->id) selected="selected" @endif>{{$title->SDetObjDesc}} ({{$title->SDetObj}})</option>
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
        <select class="select2 form-control select2-multiple" multiple="multiple" id='grade' name="grads" required="">
          
                      @foreach($grades  as $key => $grade)
                      <option value="{{ $grade->Grade }}" @if( old('grads')  == $grade->Grade) selected="selected" @endif>{{$grade->Grade}} </option>
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
        <select class="select2 form-control select2-multiple" multiple="multiple" id='type' name="insurance" required="">
          
                      @foreach($types  as  $ins)
                      <option value="{{$ins->id}}" @if('insurance' == $ins->id) selected="selected" @endif>{{$ins->GITypeDesc}} ({{$ins->GITypeID}})</option>
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
        <select class="form-control select2 multiple" multiple="multiple" id='case' name="deathOretir" required="">
         
                     
                      <option value="1" @if('deathOretir' == 1) selected="selected" @endif>
                       
                        Retiremnet (01)
                      </option>
                      <option value="2" @if('deathOretir' == 2) selected="selected" @endif>
                       
                        Death (02)
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
       name="beni" value="{{ old('beni') }}" id="beni" placeholder="Benificiary numbers" >
             @error('beni')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>

       <div class="mb-3">
         <label class="form-label" for="birth">Retirment/Death Date</label>
      <input type="text"  id="input-date2" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy"  class="form-control enddate input-mask @error('enddate') is-invalid @enderror"
       name="enddate" value="{{ old('enddate') }}"   required>
             @error('enddate')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>      
   

        <div class="mb-3">
         <label class="form-label" for="age">Total Age</label>
      <input type="text"  class="form-control @error('age') is-invalid @enderror" 
       name="age" value="{{ old('age') }}" id="age"  required readonly>
             @error('age')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>  

         <div class="mb-3">
         <label class="form-label" for="contribution">Contribution</label>
      <input type="text"  class="form-control @error('contribution') is-invalid @enderror" 
       name="contribution" value="{{ old('contribution') }}" id="contribution"  required >
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

$('#ddos').on('change',function(){
  var ddoid = $(this).val();
  console.log(ddoid);
   if(ddoid != '')
        {
        var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ url('/index/funds/funds') }}",
          method:"POST",
          data:{ddoid:ddoid, _token:_token},
           success:function(data){
            console.log(data);
            $('#funds').empty();
              $.each(data, function(index,ddos){
            
            $('#funds').val(ddos.FundDesc+' ('+ddos.Fund+')');
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
   minimumInputLength: 2,
   maximumSelectionLength: 1,
   maximumSizeLength:1,
   
});


});


$(document).ready(function(){

$('#prno').on('change',function(){
     var pnumbers = 0;
        pnumbers = $(this).val();
  console.log(pnumbers);
   if(pnumbers != '')
        {
        var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ url('/index/employee/numbers') }}",
          method:"GET",
          data:{pnumbers:pnumbers, _token:_token},
           success:function(data){
           $('#personal').html(data);
           }
       });
    }
});
});

$(document).ready(function(){

$('#cnic').on('change',function(){
  var cnicnumbers = $(this).val();
  console.log(cnicnumbers);
   if(cnicnumbers != '')
        {
        var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ url('/index/employee/cnicnumbers') }}",
          method:"GET",
          data:{cnicnumbers:cnicnumbers, _token:_token},
           success:function(data){
           $('#error_cnic').html(data);
           }
       });
    }
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
