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
        @slot('pagetitle') Employees Beneficiary list @endslot
        @slot('title') Beneficiary List @endslot
    @endcomponent
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10 col-md-10  col-xl-6">
                    <div class="card">
                    
                        <div class="card-body p-4">

                              @if($ides->LegalHeirs == 1 && $ides->GITypeID == 1)
                              @include('beneficiary.form1')
                              @elseif($ides->LegalHeirs == 1 && $ides->GITypeID == 2)
                              @include('beneficiary.form11')
                              @elseif($ides->LegalHeirs == 1 && $ides->GITypeID == 3)
                              @include('beneficiary.form11')
                              @endif
                              @if($ides->LegalHeirs == 2)
                              
                               @include('beneficiary.form2')
                               @endif
                               @if($ides->LegalHeirs == 3)
                                
                                @include('beneficiary.form3')
                                @endif
                    
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
 @section('script')

 <script type="text/javascript">
   

 //CNIC and Date Masking 
   $(document).ready(function(){
  $('#cnic').mask('00000-0000000-0');
  $('#birth').mask('00/00/0000');
  });
    $(document).ready(function(){
  $('#cnic1').mask('00000-0000000-0');
  $('#birth').mask('00/00/0000');
  });
     $(document).ready(function(){
  $('#cnic2').mask('00000-0000000-0');
  $('#birth').mask('00/00/0000');
  });
   // end of Masking...

   //Bank Change, if any bank select its show all related banks branches;
//form one bank and sub bank changes function to load auto
$(document).on('change',function(){
$("#bank").on('change',function(e){ 
   var bankid = $(this).val();
    var id = e.target.value;
      console.log(bankid);
        if(bankid != '')
         {
           var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ url('index/funds/fund') }}",
               method:"POST",
                 data:{bankid:bankid, _token:_token},
                success:function(data){
               console.log(data);
            $('#Subbanks').empty();
           $.each(data, function(index,subBankObj){
            
           $('#Subbanks').append('<option value="'+subBankObj.id+'">'+subBankObj.BankDesc+' ('+subBankObj.BranchID+')</option>');
          });
        }
      });
    }
  });
});



// this function work on dropdown menu to controle, its search on this two key.
$(document).ready(function(){


$(".select2").select2({
    minimumInputLength: 2
});

});

//function or code load bank information of form 2

$(document).on('change',function(){
$("#bank1").on('change',function(e){ 
   var bankid = $(this).val();
    var id = e.target.value;
      console.log(bankid);
        if(bankid != '')
         {
           var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ url('index/funds/fund') }}",
               method:"POST",
                 data:{bankid:bankid, _token:_token},
                success:function(data){
               console.log(data);
            $('#Subbanks1').empty();
           $.each(data, function(index,subBankObj){
            
           $('#Subbanks1').append('<option value="'+subBankObj.id+'">'+subBankObj.BankDesc+' ('+subBankObj.BranchID+')</option>');
          });
        }
      });
    }
  });
});


// function or code for form 3


$(document).on('change',function(){
$("#bank2").on('change',function(e){ 
   var bankid = $(this).val();
    var id = e.target.value;
      console.log(bankid);
        if(bankid != '')
         {
           var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ url('index/funds/fund') }}",
               method:"POST",
                 data:{bankid:bankid, _token:_token},
                success:function(data){
               console.log(data);
            $('#Subbanks2').empty();
           $.each(data, function(index,subBankObj){
            
           $('#Subbanks2').append('<option value="'+subBankObj.id+'">'+subBankObj.BankDesc+' ('+subBankObj.BranchID+')</option>');
          });
        }
      });
    }
  });
});


 </script>
   <script src="{{ URL::asset('/assets/js/beneficiaryform.js') }}"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
   <script src="{{ URL::asset('/assets/libs/inputmask/inputmask.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-mask.init.js') }}"></script>

     <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
   <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
 <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

@endsection
@endsection
