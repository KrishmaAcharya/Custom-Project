@extends('layout.app') 

@section('content') 

<div class="container"> <!-- Bootstrap container for layout -->
    <div class="row"> <!-- Start of a Bootstrap row -->

        <div class="col-md-4 offset-md-4"> <!-- Centered column for the login form -->
            <div class="card form-holder"> <!-- Card component for styling -->
                <div class="card-body"> <!-- Body of the card -->
                    <h1>Login</h1> 

                    <!-- Check for any error messages in the session -->
                    @if(Session::has('error'))
                        <p class="text-danger">{{Session::get('error')}}</p> <!-- Display error message -->
                    @endif

                    <!-- Check for any success messages in the session -->
                    @if(Session::has('success'))
                        <p class="text-success">{{Session::get('success')}}</p> <!-- Display success message -->
                    @endif    

                    <!-- Login form -->
                    <form action="{{route('login')}}" method="post"> <!-- Form action pointing to the login route -->
                        @csrf <!-- CSRF token for security -->
                        @method('post') <!-- Method spoofing to indicate the form uses POST -->

                        <div class="form-group"> <!-- Form group for email input -->
                            <label>Email</label> <!-- Label for the email input -->
                            <input type="email" name="email" class="form-control" placeholder="Email"/> <!-- Email input field -->
                            <!-- Display validation error for email -->
                            @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email')}}</p> <!-- Show email error message -->
                            @endif  
                        </div>    

                        <div class="form-group"> <!-- Form group for password input -->
                            <label>Password</label> <!-- Label for the password input -->
                            <input type="password" name="password" class="form-control" placeholder="Password"/> <!-- Password input field -->
                            <!-- Display validation error for password -->
                            @if ($errors->has('password'))
                                <p class="text-danger">{{ $errors->first('password')}}</p> <!-- Show password error message -->
                            @endif  
                        </div>

                        <div class="row"> <!-- Start of a new row for buttons -->
                            <div class="col-8 text-left"> <!-- Column for "Forgot Password" link -->
                                <a href="#" class="btn btn-link">Forgot Password</a> <!-- Link to password recovery -->
                            </div>   

                            <div class="col-4 text-right"> <!-- Column for the submit button -->
                                <input type="submit" class="btn btn-primary" value="Login"/> <!-- Submit button for login -->
                            </div>  
                        </div>
                    </form> <!-- End of the form -->
                </div> <!-- End of card body -->
            </div> <!-- End of card -->
        </div> <!-- End of centered column -->
    </div> <!-- End of row -->
</div> <!-- End of container -->

@endsection <!-- End of content section -->

            