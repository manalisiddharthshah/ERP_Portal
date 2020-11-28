@extends('layout.layout')
@section('title','Update Offices')
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
                                    <h4 class="card-title" id="hidden-label-form-center">Edit Office</h4>
                                    <a class="heading-elements-toggle"><i class="fas fa-redo-alt"></i></a> 
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <form action="{{route('office.update',$edit_office->id)}}" method="post" class="form-horizontal">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="far fa-building"></i> Office Info</h4>
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                {{method_field('PUT')}}
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Office Name : </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="officeName" id="officeName" value="{{$edit_office->officeName}}" placeholder="Office Name">
                                                        <span class="text-danger">{{$errors->first('officeName')}}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Location : </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" name="location" id="location" value="{{$edit_office->location}}" placeholder="Location">
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