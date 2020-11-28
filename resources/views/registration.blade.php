@extends('layout.layout')
@section('title','Register Page')
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
                                </div>
                                @include('layout.message')
                                <div class="card-content">
                                   <p class="card-subtitle line-on-side text-muted text-center mx-2 my-1"><span>Registration</span></p>
                                    <div class="card-body">
                                        <form action="{{url('post-registration')}}" method="POST" id="regForm">
                                            {{ csrf_field() }}
                                            User Name :
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" id="inputName" name="name" class="form-control" placeholder="Full name" autofocus>
                                                  <div class="form-control-position">
                                                    <i class="fas fa-user"></i>
                                                  </div>
                                                @if ($errors->has('name'))
                                                <span class="error text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </fieldset>
                                            Email Id :
                                            <fieldset class="form-group position-relative has-icon-left">
                                              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" >
                                                <div class="form-control-position">
                                                    <i class="far fa-envelope"></i>
                                                </div>
 
                                                @if ($errors->has('email'))
                                                <span class="error text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </fieldset>
                                            Phone No : 
                                             <fieldset class="form-group position-relative has-icon-left">
                                                <input type="number" class="form-control" name="phone" placeholder="Your Phone No" id="userphone">
                                                <div class="form-control-position">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                                @if ($errors->has('phone'))
                                                <span class="error text-danger">{{ $errors->first('phone') }}</span>
                                                @endif
                                            </fieldset>
                                            Address :
                                           <fieldset class="form-group position-relative has-icon-left">
                                                <textarea class="form-control" name="address" placeholder="Your Address" id="useraddress"></textarea>
                                                <div class="form-control-position">
                                                    <i class="fas fa-address-card"></i>
                                                </div>
                                                @if ($errors->has('address'))
                                                <span class="error text-danger">{{ $errors->first('address') }}</span>
                                                @endif
                                            </fieldset>
                                            User Type :
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <select name="userTypeId" id="userTypeId" class="form-control">
                                                    @foreach($userType as $userType)
                                                        <option value="{{$userType->id}}">{{$userType->userType}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-position">
                                                    <i class="fas fa-user-tie"></i>
                                                </div>
                                                @if ($errors->has('userTypeId'))
                                                <span class="error text-danger">{{ $errors->first('userTypeId') }}</span>
                                                @endif
                                            </fieldset>
                                            Department :
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <select name="deptId" id="deptId" class="form-control">
                                                    @foreach($department as $department)
                                                        <option value="{{$department->id}}">{{$department->deptName}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-position">
                                                    <i class="fas fa-laptop-house"></i>
                                                </div>
                                                @if ($errors->has('deptId'))
                                                <span class="error text-danger">{{ $errors->first('deptId') }}</span>
                                                @endif
                                            </fieldset>
                                            Office :
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <select name="officeId" id="officeId" class="form-control">
                                                    @foreach($offices as $offices)
                                                        <option value="{{$offices->id}}">{{$offices->officeName}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-position">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                                @if ($errors->has('officeId'))
                                                <span class="error text-danger">{{ $errors->first('officeId') }}</span>
                                                @endif
                                            </fieldset>
                                            Password :
                                            <fieldset class="form-group position-relative has-icon-left">
                                              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                                                <div class="form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                              @if ($errors->has('password'))
                                              <span class="error text-danger">{{ $errors->first('password') }}</span>
                                              @endif
                                            </fieldset>
                                            Confirm Password :
                                            <fieldset class="form-group position-relative has-icon-left">
                                              <input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}"/>
                                                <div class="form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                              @if ($errors->has('password_confirmation'))
                                              <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                                              @endif
                                            </fieldset>
                                            <button class="btn btn-outline-primary btn-block" type="submit">Register</button>                             
                                        </form>
                                    </div>
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>Not New to ERP?</span></p>
                                    <div class="card-body">
                                        <a href="{{url('login')}}" class="btn btn-outline-danger btn-block">Login</a>
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

