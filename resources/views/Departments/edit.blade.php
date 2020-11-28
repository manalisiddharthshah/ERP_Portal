@extends('layout.layout')
@section('title','Update Departments')
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
                                    <h4 class="card-title" id="hidden-label-form-center">Edit Department</h4>
                                    <a class="heading-elements-toggle"><i class="fas fa-redo-alt"></i></a> 
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <form action="{{route('department.update',$edit_department->id)}}" method="post" class="form-horizontal">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="fas fa-layer-group"></i> Department Info</h4>
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                {{method_field('PUT')}}
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Full Name : </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="deptName" id="deptName" value="{{$edit_department->deptName}}" placeholder="Department Name">
                                                        <span class="text-danger">{{$errors->first('deptName')}}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Manager Name : </label>
                                                    <div class="col-md-9">
                                                        <select name="mgrNo" id="mgrNo" class="form-control">
                                                            @foreach($user as $user)
                                                                <option value="{{$user->id}}"{{$edit_department->mgrNo==$user->id?' selected':''}}>{{$user->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger">{{$errors->first('mgrNo')}}</span>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Location : </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="location" id="location" value="{{$edit_department->location}}" placeholder="Location">
                                                        <span class="text-danger">{{$errors->first('location')}}</span>
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