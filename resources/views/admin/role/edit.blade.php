@extends('layouts.admin_layout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Cars</a> <a href="#" class="current">Edit</a> </div>
    <h1>Edit Role</h1>
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
            <h5>Edit Role</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="{{ url('role-edit/' . $role->id) }}" method="post" role="form">
    {{csrf_field()}}
              <div class="form-group">
                  <label for="name">Name of role</label>
                  <input type="text" class="form-control" name="name" id="" placeholder="Name of role" value="{{$role->name}}">
                </div>
                  <div class="form-group">
                  <label for="display_name">Display name</label>
                  <input type="text" class="form-control" name="display_name" id="" value="{{$role->display_name}}" placeholder="Display name">
                </div>
                  <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" id="" placeholder="Description" value="{{$role->description}}">
                </div>

                  <div class="form-group text-left">
                      <h3>Permissions</h3>
                      @foreach($permissions as $permission)
                  <input type="checkbox" {{in_array($permission->id,$role_permissions)?"checked":""}}   name="permission[]" value="{{$permission->id}}" > {{$permission->name}} <br>
                      @endforeach
                </div>






                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

