@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> الريسيه</a> <a href="#">موديل  السياره  </a> <a href="#" class="current">اضافه  موديل </a> </div>
    <h1></h1>
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
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>اضافه موديل لسياره  </h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('admin/add-marker')}}" name="add-marker" id="add-marker" novalidate="novalidate">{{csrf_field()}}
              <div class="control-group">
                <label class="control-label"> اسم   الموديل   </label>
                <div class="controls">
                  <input type="text" name="name" id="name">
                </div>
              </div>      
              <div class="form-actions">
                <input type="submit" value="اضافه  موديل  " class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection