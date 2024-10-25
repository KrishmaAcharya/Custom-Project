@extends('layout.app') 

@section('content') 

<div class="container"> 
    <div class="row"> 

        <div class="col-md-4 offset-md-4"> 
            <div class="card form-holder"> 
                <div class="card-body"> 
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
                        @method('post') 

                        <div class="form-group"> <!-- Form group for email input -->
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email"/> 
                            <!-- Display validation error for email -->
                            @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email')}}</p> <!-- Show email error message -->
                            @endif  
                        </div>    

                        <div class="form-group"> 
                            <label>Password</label> 
                            <input type="password" name="password" class="form-control" placeholder="Password"/> <!-- Password input field -->
                            <!-- Display validation error for password -->
                            @if ($errors->has('password'))
                                <p class="text-danger">{{ $errors->first('password')}}</p> <!-- Show password error message -->
                            @endif  
                        </div>

                        <div class="row"> 
                            <div class="col-8 text-left"> 
                                <a href="#" class="btn btn-link">Forgot Password</a> 
                            </div>   

                            <div class="col-4 text-right"> 
                                <input type="submit" class="btn btn-primary" value="Login"/> <!-- Submit button for login -->
                            </div>  
                        </div>
                    </form>
                </div> 
            </div> 
        </div> 
    </div> 
</div> 

@endsection 

            