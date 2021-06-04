@extends('layouts.app', ['activePage' => 'title', 'titlePage' => __('Job title List')])
@section('content')

  <div class="container box">
   <h3 align="center">Laravel Autocomplete using Jquery</h3><br />
   
         <div class="bmd-form-group{{ $errors->has('ddo_code') ? ' has-danger': '' }}">
                         <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                        <i class="material-icons"></i>
                       </span>
                    </div>
                  <select name="category_name" id="category_name" class="form-control" style="width:200px">
                    <option>akbar</option>
                    <option>Nadim</option>
                    <option>Nasim</option>
                    <option>Abdul wali</option>
                    <option>Khan</option>
                  </select>
              <!-- {!! Form::text('category_name', null, array('placeholder' => 'DDO required','class' => 'form-control', 'id' => 'category_name')) !!} -->
                  <div id="categoryList"></div>
                  @csrf
              </div>
               
                @if ($errors->has('ddo_code'))
                <div id="ddo_code-error" class="error text-danger pl-3" for="ddo_code" style="display: block;">
                  <strong>{{ $errors->first('ddo_code') }}</strong>
                </div>
                 @endif
                 </div>
               
   {{ csrf_field() }}
  </div>


<script >
 $(function() {
    $( "#dob" ).datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true
    });
  });
  </script>
 
<script >
 $(function() {
    $( "#death" ).datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true
    });
  });
  </script>

 <script type="text/javascript">
   $(document).on('click',function(){


      var birth = new Date($('#date').val());
      var retirment = new Date($('#ddate').val());
      var totalyear = retirment.getFullYear() - birth.getFullYear();
      var yearmonth = retirment.getMonth() - birth.getMonth();
      if (yearmonth < 0 || (yearmonth === 0 && retirment.getDate() < birth.getDate())) {
        age--;
    }
     
     
    });
    
</script>
    <script type = "text/javascript">
        $(document).on('click',function () {
           
      var birth = new Date($('#dob').val());
      var retirment = new Date($('#death').val());
      var totalyear = retirment.getFullYear() - birth.getFullYear();
      var yearmonth = retirment.getMonth() - birth.getMonth();
      if (yearmonth < 0 || (yearmonth === 0 && retirment.getDate() < birth.getDate())) {
        totalyear--;
          }
               
                    $('#age').val(totalyear);
              
               
           
        });
    </script>

    Enter Date of Birth: <input type="text" id = "dob" /><br/><br/> Date of retirement: <input type="text" id = "death" /><br/><br/>
    Age: <input type="text" id = "age" readonly/>


<script>
$('#category_name').select2({
  selectOnClose: true
});
</script>
 @endsection