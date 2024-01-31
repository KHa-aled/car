
@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Roles</a> <a href="#" class="current">View Roles</a> </div>
    <h1>View Roles</h1>
    @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{!! session('flash_message_error') !!}</strong>
           </div>
        @endif 
          
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{!! session('flash_message_success') !!}</strong>
           </div>
        @endif
  </div>
  <div class="container-fluid">
    <hr>
    <a class="btn btn-success" href="{{asset('role-create')}}"> Create Role</a>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Roles</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <tr>
            <th>Name</th>
            <th>Display Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>

        @forelse($roles as $role)
            <tr>
                <td>{{$role->name}}</td>
                <td>{{$role->display_name}}</td>
                <td>{{$role->description}}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ url('role-edit/' . $role->id) }}">Edit</a>

                       <a class="btn btn-sm btn-danger" href="{{ url('role-delete/' . $role->id) }}" >Delete</a>

                </td>
            </tr>
            @empty
            <tr>
                <td>No roles</td>
            </tr>
            @endforelse
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
