@extends('layouts.admin_layout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Cars</a> <a href="#" class="current">Create</a> </div>
    <h1>Create Role</h1>
  </div>
  <div class="container-fluid"><hr>
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
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Create Role</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="{{url('/role-create')}}" method="post" role="form">
    {{csrf_field()}}
              <div class="form-group">
   
    <input type="text" class="form-control" name="name" id="" placeholder="Name of role">
  </div>
    <div class="form-group">
    
    <input type="text" class="form-control" name="display_name" id="" placeholder="Display name">
  </div>
    <div class="form-group">
    
    <input type="text" class="form-control" name="description" id="" placeholder="Description">
  </div>

    <div class="form-group text-left">
        <h3>Permissions</h3>
        @foreach($permissions as $permission)
    <input type="checkbox"   name="permission[]" id="permission" value="{{$permission->id}}" > {{$permission->name}} <br>
        @endforeach
  </div>






  <button type="submit" class="btn btn-primary" onclick="return selectPaymentMethod();">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


