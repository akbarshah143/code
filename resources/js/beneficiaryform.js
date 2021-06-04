<script type="text/javascript">
 //CNIC and Date Masking 
   $(document).ready(function(){
  $('#cnic').mask('00000-0000000-0');
  $('#birth').mask('00/00/0000');
  });
   // end of Masking...

   //Bank Change, if any bank select its show all related banks branches;

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

   </script>
