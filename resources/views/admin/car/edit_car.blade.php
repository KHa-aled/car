@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> الرئيسيه</a> <a href="#">السيارات</a> <a href="#" class="current">تعديل السياره  </a> </div>
    <h1>صفحه تعديل  السيارة </h1>
  </div>

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
            <h5>تعديل سياره </h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/edit-car/'.$carDetails->id) }}" >
              {{csrf_field()}}
              <div class="control-group">
                
                <div class="controls">
                  <input type="hidden" value="{{$carDetails->id}}" name="carDetails" id="carDetails">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">الماركة </label>
                <div class="controls">
                  <input type="text" name="marker" id="marker" value="{{$carDetails->marker}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">الموديل</label>
                <div class="controls">
                  <input type="text" name="mode" id="mode" value="{{$carDetails->mode}}"">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">اسم السياره </label>
                <div class="controls">
                  <input type="text" name="car_name" id="car_name" value="{{$carDetails->car_name}}"">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">نوع السيارة </label>
                <div class="controls">
                   <select name="car_type" style="width: 220px;">
                    <option value="0">صعيره  </option>
                    <option value="1">متوسطه </option>
                    <option value="2">كبيره </option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">المكيف </label>
                <div class="controls">
                  <select name="conditioner" style="width: 220px;">
                    <option value="1">يوجد</option>
                    <option value="0">لايوجد</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">جير</label>
                <div class="controls">
                  <select name="gear" style="width: 220px;">
                    <option value="0">عادي</option>
                    <option value="1">اوتوماتيك</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">كيلو متر </label>
                <div class="controls">
                  <input type="text" name="kilometer" id="kilometer" value="{{$carDetails->kilometer}}"">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">عددد المقاعد </label>
                <div class="controls">
                  <input type="text" name="number_seat" id="number_seat" value="{{$carDetails->number_seat}}"">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">سعر السياره </label>
                <div class="controls">
                  <input type="text" name="price" id="price" value="{{$carDetails->price}}"">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">رقم السياره </label>
                <div class="controls">
                  <input type="text" name="number_car" id="number_car" value="{{$carDetails->number_car}}"">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">المسافه </label>
                <div class="controls">
                  <input type="text" name="distance" id="distance" value="{{$carDetails->distance}}"">
                </div>
              </div>


                     <div class="control-group">
                <label class="control-label">االصوره </label> 
                <img src="{{url('/images/backend_images/logo/small/'. $carDetails->image) }}" style="width:60px;height: 60px">
                  <div class="uploader" id="uniform-undefined">
                    <input type="file" name="image" id="image" size="19" style="opacity: 0;"><span class="filename">No File selected</span><span class="action">Choose File</span></div>
                  @if(!empty($carDetails->image))
                  <input type="hidden" name="current_image" value="{{$carDetails->image}}">
                  @endif


              </div>
              <div class="control-group">
              <label class="control-label">متاحة </label>
                <div class="controls">
                   <input type="checkbox" name="status" id="status" value="1" @if($carDetails->status=="1") checked @endif>

                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="تعديل  سياره " class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection








