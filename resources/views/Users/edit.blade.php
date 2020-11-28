@extends('layout.layout')
@section('title','Update User Profile')
@section('content')
@include('layout.navbar')
<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Grouped multiple cards for statistics starts here -->
                <div class="row grouped-multiple-statistics-card">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                    <h4 class="card-title" id="hidden-label-form-center">Edit User Profile</h4>
                                    <a class="heading-elements-toggle"><i class="fas fa-redo-alt"></i></a> 
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <form action="{{route('user.update',$edit_user->id)}}" method="post" class="form-horizontal">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="far fa-user"></i> User Info</h4>
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                {{method_field('PUT')}}
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Full Name : </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="name" id="name" value="{{$edit_user->name}}" placeholder="Name">
                                                        <span class="text-danger">{{$errors->first('name')}}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Email Id : </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="email" id="name" value="{{$edit_user->email}}" placeholder="Name" readonly="">
                                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Phone No : </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="phone" id="name" value="{{$edit_user->phone}}" placeholder="Name">
                                                        <span class="text-danger">{{$errors->first('phone')}}</span>
                                                    </div>
                                                </div> 
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Address : </label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="address" placeholder="Your Address" id="useraddress">{{$edit_user->address}}</textarea>
                                                        <span class="text-danger">{{$errors->first('address')}}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">User Type : </label>
                                                    <div class="col-md-9">
                                                        <select name="userTypeId" id="userTypeId" class="form-control">
                                                            @foreach($userType as $userType)
                                                                <option value="{{$userType->id}}"{{$edit_user->userTypeId==$userType->id?' selected':''}}>{{$userType->userType}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger">{{$errors->first('userTypeId')}}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Department : </label>
                                                    <div class="col-md-9">
                                                        <select name="deptId" id="deptId" class="form-control">
                                                            @foreach($department as $department)
                                                                <option value="{{$department->id}}"{{$edit_user->deptId==$department->id?' selected':''}}>{{$department->deptName}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger">{{$errors->first('deptId')}}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Office : </label>
                                                    <div class="col-md-9">
                                                        <select name="officeId" id="officeId" class="form-control">
                                                            @foreach($offices as $offices)
                                                                <option value="{{$offices->id}}"{{$edit_user->officeId==$offices->id?' selected':''}}>{{$offices->officeName}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger">{{$errors->first('officeId')}}</span>
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