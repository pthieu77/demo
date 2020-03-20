@extends('auth.admin.main')

@section('page_title')
    Login
@endsection

@section('css')
    <link href="{{asset('page/auth/admin/login/login.css')}}" rel="stylesheet">
@endsection

@section('page_content')

  <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
    <div class="auth-box bg-dark border-top border-secondary">
        <div id="login_group">
            <div class="text-center p-t-20 p-b-20">
                <span class="db"><img src="{{asset('images/logo.png')}}" alt="logo" /></span>
            </div>
            
            <form class="form-horizontal m-t-20" id="login_form">
                <div class="row p-b-30">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white">
                                    <i class="ti-user"></i>
                                </span>
                            </div>

                            <input type="text" class="form-control form-control-lg" placeholder="Username..."
                                id="user_name" name="user_name"
                                required data-parsley-required-message="Username is required."
                            >
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning text-white">
                                    <i class="ti-pencil"></i>
                                </span>
                            </div>

                            <input type="password" class="form-control form-control-lg" placeholder="Password..." 
                                id="password" name="password"
                                required data-parsley-required-message="Password is required."
                            >
                        </div>
                    </div>
                </div>

                <div class="row border-top border-secondary">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="p-t-20">
                                <button class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock m-r-5"></i> Lost password?</button>
                                <button type="button" class="btn btn-success float-right" id="btn_login">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div id="recover_group">
            <div class="text-center">
                <span class="text-white">Enter your e-mail address below and we will send you instructions how to recover a password.</span>
            </div>

            <div class="row m-t-20">
                <form class="col-12" id="recover_form">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-danger text-white">
                                <i class="ti-email"></i>
                            </span>
                        </div>

                        <input type="text" class="form-control form-control-lg" placeholder="Email Address..."
                            id="email" name="email"
                            required data-parsley-required-message="Email is required."
                        >
                    </div>
                    
                    <div class="row m-t-20 p-t-20 border-top border-secondary">
                        <div class="col-12">
                            <a class="btn btn-success" href="#" id="to-login" name="action">Back To Login</a>
                            <button class="btn btn-info float-right" type="button" name="action">Recover</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>

@endsection

@section('js')
    <script src="{{asset('page/auth/admin/login/login.js')}}"></script>
@endsection

