  <div class="text-center mt-2">
    <h5 class="text-primary">Register New Beneficiary Form</h5>
        <p class="text-muted">Beneficiary Registration.</p>
           </div>
                     <table  class="table table-centered table-nowrap mb-0">
                            <thead>
                                <tr>
                                  
                                      <th scope="col" class="text-left">Name</th>
                                       <th scope="col" class="text-left">F/H Name</th>
                                        <th scope="col" class="text-left">P.No</th>
                                       <th scope="col" class="text-left">CNIC</th>
                                 </tr>
                             </thead>
                            <tbody>
                 
                   <tr>
       
        <td class="text-left">{{ $ides->EmployeeName }}</td>
        <td class="text-left">{{ $ides->EmployeeFatherHusbandName }}</td>
        <td class="text-left">{{ $ides->PersonalNumber }}</td>
        <td class="text-left">{{ $ides->EmployeeCNIC }}</td>
      
        </tr>
      </tbody>
      
    </table><hr>
               <div class="p-2 mt-4">
            <form method="POST" action="" class="custom-validation" novalidate>
               @csrf
              
            <div class="row ">
         <div class="col-md-6 col-lg-5 col-xl-6">
          <input type="hidden" class="form-control"
                  name="one" value="one">
           <input type="hidden" class="form-control"
                  name="id" value="{{ $ides->id}}">
            <div class="mb-3">
                <label class="form-label" for="name">Beneficiary Name</label>
                   <input type="text" class="form-control @error('name') is-invalid @enderror"
                  name="name" value="{{ old('name') }}" id="name" placeholder="Employee Name" required data-parsley-minlength="6">
               @error('name')
            <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
       @enderror
      </div>

      <div class="mb-3">
       <label class="form-label">Beneficiary Relation</label>
         <select class="form-control select2" id='relation' name="relation" required>
           <option value="" disabled selected hidden>Select Relation with</option>
               @foreach($relation as $key => $related)
              <option value="{{ $related->id }}" @if( old('relation')  == $related->id) selected="selected" @endif> {{$related->RelationDesc}}</option>
             @endforeach
          </select>
         @error('relation')
       <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
           </span>
      @enderror
   </div>
   
  
   

      <div class="mb-3">
        <label class="form-label" for="cnic">Beneficiary CNIC Number</label>
         <input type="text"  data-inputmask="'mask': '54400-0120001-0'" class="form-control @error('cnic') is-invalid @enderror"
       name="cnic" value="{{ old('cnic') }}" id="cnic" placeholder="54400-0120001-1" required data-parsley-minlength="15">
             @error('cnic')
           <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
        </span>
       @enderror
    </div>
      <div class="form-check mb-3">
       <input class="form-check-input" type="checkbox" id="formCheck1"  name="special">
          <label class="form-check-label" for="formCheck1">
                                         Special CNIC
          </label>
    </div>
     
           
     
  </div>
                                
     <div class="col-md-8 col-lg-5 col-xl-6">
      <div class="mb-3">
        <label class="form-label">Beneficiary Bank</label>
          <select class="form-control select2" id='bank' name="bank" required data-parsley-minlength="1">
              <option value="" disabled selected hidden>Beneficiary Bank
                   </option>
                       @foreach($banks  as $key => $bank)
                        <option value="{{ $bank->id }}" @if( old('bank')  == $bank->id)
                      selected="selected" @endif> {{$bank->BankName}} ({{$bank->BankNo}})
                   </option>
               @endforeach
             </select>
          @error('$bank')
        <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>
    <div class="mb-3">
     <label class="form-label">Beneficiary Bank Branch</label>
        <select class="form-control select2 Subbanks" id='Subbanks' name="branch" required data-parsley-minlength="1">
           <option value="" disabled selected hidden>Select Bank Branch
             </option>
               </select>
             @error('branch')
           <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>   

      <div class="mb-3">
        <label class="form-label" for="account">Bank Account No</label>
          <input type="text"  class="form-control @error('account') is-invalid @enderror" 
             name="account" value="{{ old('account') }}" id="account" placeholder="Enter Account No" required data-parsley-minlength="8"> 
               @error('account')
                  <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
      </div> 

    </div>
  </div> 
    <div class="row">
      <div class="btn center">
        <button type="submit" class="btn btn-primary ">{{ __('Create Beneficiary for employee') }}</button>
          </div>
             </div>
           </div> 
        </form>