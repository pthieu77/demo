@extends('auth.user.main')

@section('page_title')
    Reset Password
@endsection

@section('css')
    <link href="{{asset('page/auth/user/reset/reset.css')}}" rel="stylesheet">
@endsection

@section('page_content')

    <!---heading---->
    <header class="heading"> Reset Password - Form</header><hr></hr>

    <form id="frm_change_password">
        <!---Form starting----> 
        <div class="row ">
            <!--- For Name---->
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-4">
                        <label class="firstname">New Password </label> 
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
                <div id="btn_change_password" class="btn btn-warning">Change</div>
            </div>

            <div class="col-12 group-account">
                <p><a href="{{route('user.page.auth.login')}}">sign in?</a></p>
            </div>
        </div>
    </form>

@endsection

@section('js')
    <script src="{{asset('page/auth/user/reset/reset.js')}}"></script>
@endsection

