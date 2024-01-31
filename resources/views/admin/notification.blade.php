@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>Settings <a href="#" class="current">Validation</a> </div>
    <h1>Admin Settings</h1>
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
  <div class="container-fluid"><hr>
   
    <div class="row-fluid">
      
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Update Password</h5>
            </div>
            <div class="widget-content nopadding">
              <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">{{ $notificationsCount}}</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
      	@foreach($notifications as $notification)
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i>{{$notification->data }}</a></li>
        @endforeach
      </ul>
    </li>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection