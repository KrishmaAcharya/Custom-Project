@extends('layout.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card form-holder">
                <div class="card-body">
                    <h1>Register</h1>

                    @if(Session::has('error'))
                        <p class="text-danger">{{Session::get('error')}}</p>
                    @endif

                    @if(Session::has('success'))
                        <p class="text-success">{{Session::get('success')}}</p>
                    @endif    

                    <form action="{{ route('register') }}" method="post" id="registerForm">
                        @csrf

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}"/> 
                            @if ($errors->has('name'))
                                <p class="text-danger">{{ $errors->first('name') }}</p> 
                            @endif  
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}"/> 
                            @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p> 
                            @endif  
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" id="passwordInput"/>
                            <p id="passwordStrength" class="text-muted"></p>
                            @if ($errors->has('password'))
                                <p class="text-danger">{{ $errors->first('password') }}</p> 
                            @endif  
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password"/> 
                            @if ($errors->has('password_confirmation'))
                                <p class="text-danger">{{ $errors->first('password_confirmation') }}</p> 
                            @endif  
                        </div>

                        <div class="text-right">
                            <input type="submit" class="btn btn-primary" value="Register"/>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('passwordInput').addEventListener('input', function() {
        var strength = document.getElementById('passwordStrength');
        var password = this.value;

        // Password strength check
        var strongRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
        var mediumRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})/;

        if (strongRegex.test(password)) {
            strength.innerHTML = 'Password Strength: Strong';
            strength.className = 'text-success';
        } else if (mediumRegex.test(password)) {
            strength.innerHTML = 'Password Strength: Medium';
            strength.className = 'text-warning';
        } else {
            strength.innerHTML = 'Password Strength: Weak';
            strength.className = 'text-danger';
        }
    });
</script>

@endsection
