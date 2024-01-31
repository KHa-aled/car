@extends('layouts.admin_layout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Companies</a> <a href="#" class="current">Add Company</a> </div>
    <h1>Companies</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Company</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('admin/add-company')}}" name="add_company" id="add_company" novalidate="novalidate">{{csrf_field()}}
              <div class="control-group">
                <label class="control-label">company Name</label>
                <div class="controls">
                  <input type="text" name="name" id="name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Address</label>
                <div class="controls">
                  <input type="text" name="address" id="address">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Details</label>
                <div class="controls">
                  <textarea name="details" id="details"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Logo</label>
                <div class="controls">
                  <input type="file" name="logo">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Company" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection