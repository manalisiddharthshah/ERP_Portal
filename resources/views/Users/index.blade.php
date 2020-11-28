@extends('layout.layout')
@section('title','Manage Users')
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
                            <h4 class="card-title">Manage Users</h4>
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
                                            <th>Department Name   <i class="fas fa-sort"></i></th>
                                            <th>Office   <i class="fas fa-sort"></i></th>
                                            <th>Name   <i class="fas fa-sort"></i></th>
                                            <th>Email Id   <i class="fas fa-sort"></i></th>
                                            <th>Phone No   <i class="fas fa-sort"></i></th>
                                            <th>Address   <i class="fas fa-sort"></i></th>
                                            <th>Action   <i class="fas fa-sort"></i></th>
                                        </tr>
                                    </thead>
                                    <?php $i=0; ?>
                                    <tbody>
                                        @foreach($user as $user)
                                        <?php $i++; ?>
                                        <tr class="text-center text-secondary">
                                            <td>{{$i}}</td>
                                            <td>{{$user->userType->userType}}</td>
                                            <td>{{$user->department->deptName}}</td>
                                            <td>{{$user->office->officeName}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>
                                            <form method="POST" action="{{ route('user.destroy', ['id' => $user->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
            
                                            <a href="{{route('user.edit',$user->id)}}" title="Edit" class="text-primary editBtn"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;

                                                <button title="Delete" class="text-danger delBtn"><i class="fas fa-trash"></i></button>&nbsp;&nbsp;&nbsp;
                                            </form>
                                            </td>
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