@extends('layout.layout')
@section('title','Manage UserType')
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
                                    <h4 class="card-title">Manage UserTypes</h4>
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
                                                <th>User Type   <i class="fas fa-sort"></i></th>
                                              </tr>
                                            </thead>
                                            <?php $i=0; ?>
                                            <tbody>
                                                @foreach($userType as $userType)
                                                <?php $i++; ?>
                                                <tr class="text-center text-secondary">
                                                    <td>{{$i}}</td>
                                                    <td>{{$userType->userType}}</td>
                                                </tr>
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