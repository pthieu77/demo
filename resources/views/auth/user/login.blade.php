@extends('auth.user.main')

@section('page_title')
    Login
@endsection

@section('css')
    <link href="{{asset('page/auth/user/login/login.css')}}" rel="stylesheet">
@endsection

@section('page_content')

    <!---heading---->
    <header class="heading"> Login - Form</header><hr></hr>

    <form id="login_form">
        <!---Form starting----> 
        <div class="row ">
            <!--- For Name---->
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-4">
                        <label class="firstname">Username </label> 
                    </div>

                    <div class="col-8">
                        <input type="text" name="user_name" id="user_name" 
                            placeholder="Username..." class="form-control" 
                            required data-parsley-required-message="Username is required."
                        />
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="row">
                    <div class="col-4">
                        <label class="firstname">Password </label> 
                    </div>

                    <div class="col-8">
                        <input type="password" name="password" id="password" 
                            placeholder="Password..." class="form-control" 
                            required data-parsley-required-message="Password is required."
                        />
                    </div>
                </div>
            </div>

            <div class="col-12 btn-login">
                <div class="btn btn-warning" id="btn_login">Login</div>
            </div>

            <div class="col-12 group-account">
                <p>Don't have an account? <a href="{{route('user.page.auth.register')}}">sign up</a></p>
                <p><a href="{{route('user.page.auth.forgot.password')}}">forgot your password?</a></p>
            </div>
        </div>
    </form>

@endsection

@section('js')
    <script src="{{asset('page/auth/user/login/login.js')}}"></script>
@endsection

