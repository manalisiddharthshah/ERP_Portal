@extends('layout.layout')
@section('title','Change Password')
@section('content')
@include('layout.navbar')
<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            @include('layout.message')
            <div class="content-body">
                <!-- Grouped multiple cards for statistics starts here -->
                <div class="row grouped-multiple-statistics-card">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                    <h4 class="card-title" id="hidden-label-form-center">Reset Password</h4>
                                    <a class="heading-elements-toggle"><i class="fas fa-redo-alt"></i></a> 
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <form action="{{url('/update-password',$user_login->id)}}" method="post" class="form-horizontal">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="far fa-user"></i> Personal Info</h4>
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                {{method_field('PUT')}}
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Current Password : </label>
                                                    <div class="col-md-9">
                                                        <input type="password" class="form-control" placeholder="Old Password" name="password">
                                                        @if(Session::has('oldpassword'))
                                                            <span class="text-danger">{{Session::get('oldpassword')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">New Password : </label>
                                                    <div class="col-md-9">
                                                        <input type="password" class="form-control" placeholder="New Password" name="newPassword" id="newPassword">
                                                        <span class="text-danger">{{$errors->first('newPassword')}}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Confirm Password : </label>
                                                    <div class="col-md-9">
                                                        <input type="password" class="form-control" placeholder="New Confirm Password" name="newPassword_confirmation">
                                                        <span class="text-danger">{{$errors->first('newPassword_confirmation')}}</span>
                                                    </div>
                                                </div> 
                                            <div class="form-actions center">
                                                <input type="submit" class="btn btn-primary" id="change" value="Save">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- Grouped multiple cards for statistics ends here -->  
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection