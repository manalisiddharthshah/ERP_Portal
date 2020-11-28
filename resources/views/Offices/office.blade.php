@extends('layout.layout')
@section('title','Manage Officess')
@section('content')
@include('layout.navbar')
<!-- BEGIN: Content-->
            <div class="app-content content">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    @include('layout.message')
                    <div class="content-body">
                        
    <!-- File export table -->
                <section id="file-export">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Manage Offices</h4>
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
                                                    <th>Office Name   <i class="fas fa-sort"></i></th>
                                                    <th>Location   <i class="fas fa-sort"></i></th>
                                                    @if(Auth::user()->isAdmin())
                                                    <th>Action   <i class="fas fa-sort"></i></th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <?php $i=0; ?>
                                            <tbody>
                                                @foreach($office as $office)
                                                <?php $i++; ?>
                                                <tr class="text-center text-secondary">
                                                    <td>{{$i}}</td>
                                                    <td>{{$office->officeName}}</td>
                                                    <td>{{$office->location}}</td>
                                                    @if(Auth::user()->isAdmin())
                                                    <td>
                                                        <form method="POST" action="{{ route('office.destroy', ['id' => $office->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                                                        <a href="{{route('office.edit',$office->id)}}" title="Edit" class="text-primary editBtn"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;

                                                        <button title="Delete" class="text-danger delBtn"><i class="fas fa-trash"></i></button>&nbsp;&nbsp;&nbsp;
                                                    </td>
                                                    @endif
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