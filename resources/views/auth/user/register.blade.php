@extends('auth.user.main')

@section('page_title')
    Register
@endsection

@section('css')
    <link href="{{asset('page/auth/user/register/register.css')}}" rel="stylesheet">
@endsection

@section('page_content')

    <!---heading---->
    <header class="heading"> Sign Up - Form</header><hr></hr>

    <form id="frm_register">
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
                        <label class="firstname">Email </label> 
                    </div>

                    <div class="col-8">
                        <input type="email" name="email" id="email" 
                            placeholder="Email..." class="form-control" 
                            required data-parsley-required-message="Email is required."    
                            data-parsley-type="email" data-parsley-error-message="Please typing email."
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

            <div class="col-sm-12">
                <div class="row">
                    <div class="col-4">
                        <label class="firstname">Password Confirm </label> 
                    </div>

                    <div class="col-8">
                        <input type="password" name="password_confirm" id="password_confirm" 
                            placeholder="Password confirm..." class="form-control password-confirm"
                            required data-parsley-required-message="Password confirm is required."
                            data-parsley-equalto="#password" data-parsley-error-message="Your password and confirmation password do not match."
                        />
                    </div>
                </div>
            </div>

            <div class="col-12 btn-login">
                <div id="btn_sign_up" class="btn btn-warning">Sign Up</div>
            </div>

            <div class="col-12 group-account">
                <p>Have an account? <a href="{{route('user.page.auth.login')}}">sign in</a></p>
            </div>
        </div>
    </form>

@endsection

@section('js')
    <script src="{{asset('page/auth/user/register/register.js')}}"></script>
@endsection

