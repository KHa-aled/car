@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> الرئيسيه</a> <a href="#">السيارات</a> <a href="#" class="current">اضافه سياره </a> </div>
    <h1>اضافة سيارة</h1>
  </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>اضافه سياره </h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('admin/add-car')}}" name="add_company" id="add_company" novalidate="novalidate">{{csrf_field()}}
              <div class="control-group">
                
                <div class="controls">
                  <input type="hidden" value="{{$companies->id}}" name="company_id" id="company_id">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">الماركة </label>
                <div class="controls">
                  <input type="text" name="marker" id="marker" class="form-control">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">الموديل</label>
                <div class="controls">
                  <input type="text" name="mode" id="mode" class="form-control">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">اسم السياره </label>
                <div class="controls">
                  <input type="text" name="car_name" id="car_name" class="form-control">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">نوع السيارة </label>
                <div class="controls">
                   <select name="car_type" style="width: 220px;" class="form-control">
                    <option value="0">صعيره  </option>
                    <option value="1">متوسطه </option>
                    <option value="2">كبيره </option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">المكيف </label>
                <div class="controls">
                  <select name="conditioner" style="width: 220px;" class="form-control" >
                    <option value="1">يوجد</option>
                    <option value="0">لايوجد</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">جير</label>
                <div class="controls">
                  <select name="gear" style="width: 220px;" class="form-control">
                    <option value="0">عادي</option>
                    <option value="1">اوتوماتيك</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">كيلو متر </label>
                <div class="controls">
                  <input type="text" name="kilometer" id="kilometer" class="form-control">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">عددد المقاعد </label>
                <div class="controls">
                  <input type="text" name="number_seat" id="number_seat" class="form-control">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">سعر السياره </label>
                <div class="controls">
                  <input type="text" name="price" id="price">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">رقم السياره </label>
                <div class="controls">
                  <input type="text" name="number_car" id="number_car" class="form-control">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">المسافه </label>
                <div class="controls">
                  <input type="text" name="distance" id="distance" class="form-control" >
                </div>
              </div>


                     <div class="control-group">
                <label class="control-label">االصوره </label>
                <div class="controls">
                  <input type="file" name="image" id="image" class="form-control">
                </div>
              </div>
              <div class="control-group">
              <label class="control-label">متاحة </label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1" class="form-control">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="اضافه  سياره " class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection








