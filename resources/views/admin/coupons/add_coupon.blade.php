@extends('layouts.admin_layout.admin_design')

@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> الرئيسيه</a> <a href="#">كابونات</a> <a href="#" class="current">اضافه كابون</a> </div>
    <h1>Coupons</h1>
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
            <h5>Add Coupon</h5>

          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('admin/add-coupon') }}" name="add_coupon" id="add_coupon"> {{ csrf_field() }}

              <div class="control-group">
                <label class="control-label">كود  الكابون</label>
                <div class="controls">
                  <input type="text" name="coupon_code" id="coupon_code" minlength="5" maxlength="15" required class="form-control" >
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">الكميه</label>
                <div class="controls">
                  <input type="number" name="amount" min="0" id="amount" required class="form-control">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">نوع الخصم  </label>
                <div class="controls form-control">
                  <select name="amount_type" id="amount_type" style="width: 220px;">  
                    <option value="Percentage">نسبه مئويه</option>
                    <option value="Fixed">نسبه ثابته</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">مده تفعيل الخصم </label>
                <div class="controls">
                  <input type="text" name="expiry_date" id="expiry_date" class="form-control" autocomplete="off" required>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">فعال </label>
                <div class="controls form-control">
                  <input type="checkbox" name="status" id="status" value="1">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Coupon" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection