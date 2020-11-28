@extends('layout.layout')
@section('title','Dashboard')
@section('content')
@include('layout.navbar')
<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users view start -->
                <section class="users-view">
                    <div class="row">
                        <div class="col-12 col-sm-7">
                            <div class="media mb-2">
                                <div class="media-body pt-25">
                                    <span class="users-view-id font-large-1">Welcome {{$user_login->name}}</span>
                                </div>
                            </div>
                        </div>
                   </div>
                    
                    <!-- users view media object ends -->
                    <!-- users view card data start -->
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td><b>Name : </b></td>
                                                    <td>{{$user_login->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Email ID : </b></td>
                                                    <td>{{$user_login->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Mobile Number : </b></td>
                                                    <td>{{$user_login->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Address : </b></td>
                                                    <td>{{$user_login->address}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="table-responsive">   
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td><b>Type Of User: </b></td>
                                                        <td>{{$user_login->userType->userType}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Department Name : </b></td>
                                                        <td>{{$user_login->department->deptName}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Office Name : </b></td>
                                                        <td>{{$user_login->office->officeName}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Sr. No.   <i class="fas fa-sort"></i></th>
                                            <th>Task Name   <i class="fas fa-sort"></i></th>
                                            <th>Assign By   <i class="fas fa-sort"></i></th>
                                            <th>Task Description  <i class="fas fa-sort"></i></th>
                                            <th>Task Start Date  <i class="fas fa-sort"></i></th>
                                            <th>Task End Date  <i class="fas fa-sort"></i></th>
                                        </tr>
                                    </thead>
                                    <?php $i=0; ?>
                                    <tbody>
                                        @foreach($task as $task)
                                        @if($task->assignTo == Auth::id())
                                        <?php $i++; ?>
                                        <tr class="text-center text-secondary">
                                            <td>{{$i}}</td>
                                            <td>{{$task->taskName}}</td>
                                            <td>{{$task->assignby->name}}</td>
                                            <td>{{$task->taskDescription}}</td>
                                            <td>{{$task->startDate}}</td>
                                            <td>{{$task->endDate}}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- users view card data ends -->
    <!-- Grouped multiple cards for statistics starts here -->
                <div class="row grouped-multiple-statistics-card">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-xl-12 col-md-12">
                                    @if(Auth::user()->isAdmin())
                                    <div class="row">
                                        
                        <div class="col-xl-12 col-md-12">
                            <div class="card overflow-hidden">
                                <div class="card-content">
                                    <div class="media align-items-stretch bg-danger white">
                                        <div class="bg-danger bg-darken-2 p-2 media-middle">
                                            <i class="far fa-check-square font-large-2 white"></i>
                                        </div>
                                        <div class="media-body p-2">
                                            <h4>Total Assign Task</h4>
                                            <span>Total Count</span>
                                        </div>
                                        <div class="media-right p-2 media-middle">
                                            <h1>{{$totalAssign}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
            
                    <div class="row">
                        <div class="col-xl-6 col-md-12">
                            <div class="card overflow-hidden">
                                <div class="card-content">
                                    <div class="media align-items-stretch bg-primary white">
                                        <div class="bg-primary bg-darken-2 p-2 media-middle">
                                            <i class="far fa-check-square font-large-2 white"></i>
                                        </div>
                                        <div class="media-body p-2">
                                            <h4>Assign Task</h4>
                                            <span>Total Count</span>
                                        </div>
                                        <div class="media-right p-2 media-middle">
                                            <h1>{{$assign}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media align-items-stretch bg-warning white">
                                        <div class="bg-warning bg-darken-2 p-2 media-middle">
                                            <i class="far fa-check-square font-large-2 white"></i>
                                        </div>
                                        <div class="media-body p-2">
                                            <h4>Recived Task</h4>
                                            <span>Total Count</span>
                                        </div>
                                        <div class="media-right p-2 media-middle">
                                            <h1>{{$recived}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Grouped multiple cards for statistics ends here -->
                </section>
                <!-- users view ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection