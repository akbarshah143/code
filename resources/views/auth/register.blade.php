@extends('layouts.master-without-nav')
@section('title')
    Register
@endsection
@section('content')
    <div class="row align-items-center justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-6">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Register Account</h5>
                                <p class="text-muted">Get your Employees account now.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                <div class="row ">
                                   <div class="col-md-8 col-lg-6 col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" id="username"
                                            placeholder="Enter username">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="userpassword" placeholder="Enter password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" id="password_confirmation"
                                            placeholder="Enter confirm password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-6 col-xl-6">
                                     <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" id="email" placeholder="Enter email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="cnic">National ID</label>
                                        <input type="text" class="form-control @error('cnic') is-invalid @enderror"
                                            name="cnic" value="{{ old('cnic') }}" id="cnic"
                                            placeholder="Enter Natonal ID No">
                                        @error('cnic')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="department">Department</label>
                                        <input type="text" class="form-control @error('department') is-invalid @enderror"
                                            name="department" value="{{ old('department') }}" id="department"
                                            placeholder="Enter department name">
                                        @error('department')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
                            </div>


                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="auth-terms-condition-check">
                                        <label class="form-check-label" for="auth-terms-condition-check">I accept <a
                                                href="javascript: void(0);" class="text-dark">Terms and
                                                Conditions</a></label>
                                    </div>

                                    <div class="mt-3 text-end" align="text-center">
                                        <button class="btn btn-primary w-sm waves-effect waves-light"
                                            type="submit">Register</button>
                                    </div>

                                   
                                   
                                </form>
                            </div>

                        </div>
                    </div>
                    

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
