@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Common elements</a> </div>
  <h1>من نحن</h1>
</div>
<div class="container-fluid">
  <hr>
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
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>من نحن</h5>
      </div>
      <div class="widget-content">
        <div class="control-group">
          <form action="{{url('add-aboutUs')}}"  method="post">{{csrf_field()}}
              <div class="control-group">
                <label class="control-label">العنوان بالغة العربية</label>
                <div class="controls">
                  <input type="text" name="ar_titel" id="ar_titel">
                </div>
              </div>
              <label class="control-label">التفاصيل باللغة العربية</label>
            <div class="controls">
              <textarea  class="textarea_editor span12" name="ar_description" rows="6" placeholder="Enter text ..."></textarea>
            </div>
            <div class="control-group">
                <label class="control-label">العنوان بالغة الانجليزية</label>
                <div class="controls">
                  <input type="text" name="en_titel" id="en_titel">
                </div>
              </div>
            <label class="control-label">التفاصيل بالغة الانجليزية</label
            <div class="controls">
              <textarea  class="textarea_editor1 span12" name="en_description" rows="6" placeholder="Enter text ..."></textarea>
              <button type="submit" class="btn btn-info pull-right">اضافة </button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div></div>

@endsection
