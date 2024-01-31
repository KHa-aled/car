@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> الرئيسيه </a> <a href="#">الشركات </a> <a href="#" class="current">اضافه  شركه  </a> </div>
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
            <h5>اضافه  شركه  </h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('admin/add-company')}}" name="add_company" id="add_category" novalidate="novalidate">{{csrf_field()}}
              <div class="control-group">
                <label class="control-label"> اسم  الشركه  </label>
                <div class="controls">
                  <input type="text" name="name" id="name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">عنوان  الشركه  </label>
                <div class="controls">
                  <input type="text" name="address" id="address">
                </div>
              </div>  

                <div class="control-group">
                <label class="control-label">شعار  الشركه  </label>
                <div class="controls">
                  <input type="file" name="logo">
                </div>
              </div>


              <div class="control-group">
                <label class="control-label">تفاصيل</label>
                <div class="controls">
                  <textarea name="details" id="details" ></textarea>
                </div>
              </div>
            
              <div class="form-actions">
                <input type="submit" value="اضافه  شركه  " class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection