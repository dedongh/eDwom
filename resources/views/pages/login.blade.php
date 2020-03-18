@extends('container')
@section('login')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="{{url('/login-user')}}" method="post">
                        {{csrf_field()}}
                        <input type="email" placeholder="Email Address" name="user_email" required/>
                        <input type="password" placeholder="password" name="user_password"/>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="{{url('/register-user')}}" method="post">
                        {{csrf_field()}}
                        <input type="text" name="customer_name" placeholder="Full Name" required/>
                        <input type="email" name="customer_email" placeholder="Email Address" required/>
                        <input type="text" name="phone_number" placeholder="Mobile" />
                        <input type="password" name="password" placeholder="Password"/>
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
@endsection
