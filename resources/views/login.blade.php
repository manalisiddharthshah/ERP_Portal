@extends('layout.layout')
@section('title','Login Page')
@section('content')
<body class="vertical-layout vertical-menu-modern  bg-full-screen-image menu-collapsed" data-open="click">
<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img class="brand-logo" alt="stack admin logo" src="{{asset('css/img/imgAdmin/logo/stack-logo-dark-big.png')}}" height="40px">
                                    </div>
                                    @include('layout.message')
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Easily
                                            Using</span></h6>
                                </div>
                                <div class="card-content">
                                    <div class="text-center">
                                        <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter"><span class="fa fa-twitter"></span></a>
                                        <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-linkedin"><span class="fa fa-linkedin font-medium-4"></span></a>
                                        <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-github"><span class="fa fa-github font-medium-4"></span></a>
                                    </div>
                                    
                                </div>
                                <div class="card-content">
                                   <p class="card-subtitle line-on-side text-muted text-center mx-2 my-1"><span>OR Login</span></p>
                                    <div class="card-body">
                                        <form action="{{url('post-login')}}" method="POST" id="logForm">
                                            {{ csrf_field() }}
                                                <fieldset class="form-group position-relative has-icon-left">
                                                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" >
                                                  <div class="form-control-position">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                @if ($errors->has('email'))
                                                  <span class="error text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                                                <div class="form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                                @if ($errors->has('password'))
                                                  <span class="error text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                                                    <fieldset>
                                                        <input type="checkbox" id="remember-me" class="chk-remember">
                                                        <label for="remember-me"> Remember Me</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="#" class="card-link">Forgot Password?</a></div>
                                            </div>
                                            <button class="btn btn-outline-primary btn-block" type="submit">Sign In</button>
                                             
                                        </form>
                                    </div>
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>New to ERP?</span></p>
                                    <div class="card-body">
                                        <a href="{{url('registration')}}" class="btn btn-outline-danger btn-block"> Register</a>
                                    </div
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@section('customfooter')
        
@endsection