@extends('auth.user.main')

@section('page_title')
    forgot password
@endsection

@section('css')
    <link href="{{asset('page/auth/user/forgot/forgot.css')}}" rel="stylesheet">
@endsection

@section('page_content')

    <!---heading---->
    <header class="heading"> Forgot Password - Form</header><hr></hr>

    <form id="frm_send_mail">
        <!---Form starting----> 
        <div class="row ">
            <!--- For Name---->
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

            <div class="col-12 btn-login">
                <div id="btn_send_mail" class="btn btn-warning">Send To Email</div>
            </div>

            <div class="col-12 group-account">
                <p>Don't have an account? <a href="{{route('user.page.auth.register')}}">sign up</a></p>
                <p><a href="{{route('user.page.auth.login')}}">sign in?</a></p>
            </div>
        </div>
    </form>

@endsection

@section('js')
    <script src="{{asset('page/auth/user/forgot/forgot.js')}}"></script>
@endsection

