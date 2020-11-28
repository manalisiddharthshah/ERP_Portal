@extends('layout.layout')
@section('title','Add Task')
@section('content')
@include('layout.navbar')
<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            @if(Session::has('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="content-body">
                <!-- Grouped multiple cards for statistics starts here -->
                <div class="row grouped-multiple-statistics-card">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                    <h4 class="card-title" id="hidden-label-form-center">Add Task</h4>
                                    <a class="heading-elements-toggle"><i class="fas fa-redo-alt"></i></a> 
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <form action="{{url('createTask')}}" method="post" class="form-horizontal">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="fas fa-tasks"></i> Assign Task Info</h4>
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <div class="form-group row">
                                                    <input type="hidden" name="assignTo" value="{{$assign_to->id}}">
                                                    <input type="hidden" name="assignBy" value="{{$assign_by->id}}">
                                                    <label class="col-md-3 label-control">Task Name : </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="taskName" id="taskName"  placeholder="Task Name">
                                                        <span class="text-danger">{{$errors->first('taskName')}}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Assign To : </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="assign_uname" id="assign_uname" value="{{$assign_to->name}}" placeholder="Assign UName" readonly="">
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Assign By : </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="assign_by_uname" id="assign_by_uname" value="{{$assign_by->name}}" placeholder="Assign By UName" readonly="">
                                                    </div>
                                                </div> 
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Task Description : </label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="taskDescription" placeholder="Task Description" id="taskDescription"></textarea>
                                                        <span class="text-danger">{{$errors->first('taskDescription')}}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Start Date : </label>
                                                    <div class="col-md-9">
                                                        <input type="date" class="form-control" name="startDate" id="startDate"  placeholder="Task Start Date">
                                                        <span class="text-danger">{{$errors->first('startDate')}}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">End Date : </label>
                                                    <div class="col-md-9">
                                                        <input type="date" class="form-control" name="endDate" id="endDate"  placeholder="Task End Date">
                                                        <span class="text-danger">{{$errors->first('endDate')}}</span>
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