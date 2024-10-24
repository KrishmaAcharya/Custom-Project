@extends('layout.app') 

@section('content') 

<div class="container"> <!-- Bootstrap container for layout -->
    <div class="row"> <!-- Start of a Bootstrap row -->

        <div class="col-md-4 offset-md-4"> <!-- Centered column for the registration form -->
            <div class="card form-holder"> <!-- Card component for styling -->
                <div class="card-body"> <!-- Body of the card -->
                    <h1>Register</h1> 

                    <!-- Check for any error messages in the session -->
                    @if(Session::has('error'))
                        <p class="text-danger">{{Session::get('error')}}</p> <!-- Display error message -->
                    @endif

                    <!-- Check for any success messages in the session -->
                    @if(Session::has('success'))
                        <p class="text-success">{{Session::get('success')}}</p> <!-- Display success message -->
                    @endif    

                    <!-- Registration form -->
                    <form action="{{route('register')}}" method="post"> <!-- Form action pointing to the register route -->
                        @csrf <!-- CSRF token for security -->
                        @method('post') <!-- Method spoofing to indicate the form uses POST -->

                        <div class="form-group"> <!-- Form group for name input -->
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}"/> 
                            @if ($errors->has('name'))
                                <p class="text-danger">{{ $errors->first('name')}}</p> 
                            @endif  
                        </div>

                        <div class="form-group"> <!-- Form group for email input -->
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}"/> 
                            @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email')}}</p> 
                            @endif  
                        </div>

                        <div class="form-group"> <!-- Form group for password input -->
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password"/> 
                            @if ($errors->has('password'))
                                <p class="text-danger">{{ $errors->first('password')}}</p> 
                            @endif  
                        </div>

                        <div class="form-group"> <!-- Form group for password confirmation input -->
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password"/> 
                            @if ($errors->has('password_confirmation'))
                                <p class="text-danger">{{ $errors->first('password_confirmation')}}</p> 
                            @endif  
                        </div>

                        <div class="text-right"> 
                            <input type="submit" class="btn btn-primary" value="Register"/> <!-- Submit button for registration -->
                        </div>  
                    </form> <!-- End of registration form -->
                </div> <!-- End of card body -->
            </div> <!-- End of card -->
        </div> <!-- End of centered column -->
    </div> <!-- End of row -->
</div> <!-- End of container -->

@endsection <!-- End of content section -->
