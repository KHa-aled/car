@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> الرئيسية</a> <a href="#">الشركات</a> <a href="#" class="current">الاضافات</a> </div>
    <h1>اسعار الاضافات</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>اسعار الاضافات</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('admin/addation')}}" name="add_company" id="add_company" novalidate="novalidate">{{csrf_field()}}
              <div class="control-group">
                <label class="control-label">توفير سائق للسيارة</label>
                <div class="controls">
                  <input type="text" name="provide_driver"  id="provide_driver">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">سائق اضافي</label>
                <div class="controls">
                  <input type="text" name="additional_driver"  id="additional_driver">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">عمر السائق أكبر من 21 سنة</label>
                <div class="controls">
                  <input type="text" name="age_driver"  id="age_driver">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">اضافة تأمين</label>
                <div class="controls">
                  <input type="text" name="add_insurance"  id="add_insurance">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">توصيل السيارة لمكانك</label>
                <div class="controls">
                  <input type="text" name="connect_car_place"  id="connect_car_place">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">الضربية</label>
                <div class="controls">
                  <input type="text" name="tax"  id="tax">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="اضافة" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection