@extends('layout.layout')
@section('title','Recived Tasks')
@section('content')
@include('layout.navbar')
<!-- BEGIN: Content-->
            <div class="app-content content">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        
                <!-- File export table -->
                <section id="file-export">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Recived Tasks</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="fas fa-expand"></i></a></li>
                                            <li><a data-action="close"><i class="far fa-window-close"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered file-export">
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
                </section>
                <!-- File export table -->
            </div>
        </div>
    </div>
<!-- END: Content-->
@endsection