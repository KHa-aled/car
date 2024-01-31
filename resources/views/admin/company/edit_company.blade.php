@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> الرئيسية</a> <a href="#">الشركات</a> <a href="#" class="current">تعديل بيانات الشركة</a> </div>
    <h1>تعديل بيانات الشركة</h1>
  </div>


  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>المعلومات الشخصية</h5>
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
        <div class="widget-content nopadding">
    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('admin-edit/'.$user->id)}}" name="add_company" id="add_company" novalidate="novalidate">{{csrf_field()}}
            <div class="control-group">
              <label class="control-label">اسم المستخدم:</label>
              <div class="controls">
                <input type="text" class="span8" name="name" value="{{$user->name}}" placeholder="اسم المستخدم" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">الايميل :</label>
              <div class="controls">
                <input type="text" class="span8" name="email" value="{{$user->email}}"  placeholder="الايميل" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">العنوان</label>
              <div class="controls">
                <input type="text"  class="span8" name="address"  value="{{$user->address}}"  placeholder="عنوان المستخدم"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">الهاتف</label>
              <div class="controls">
                <input type="text"  class="span8" name="phone" value="{{$user->phone}}"  placeholder="رقم الهاتف "  />
              </div>
            </div>
            <div class="control-group">
              <label for="normal" class="control-label">اسم الشركة</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="name_company" value="{{$viewAdmins->name}}"  class="span8 mask text">
              </div>
            </div>
            <div class="control-group">
              <label for="normal" class="control-label">عنوان الشركة</label>
              <div class="controls">
                <input type="text" id="mask-phoneInt" name="address" value="{{$viewAdmins->address}}" class="span8 mask text">
              </div>
            </div>
            <div class="control-group">
              <label for="normal" class="control-label">تفاصيل الشركة</label>
              <div class="controls">
                <textarea class="textarea_editor span8" rows="6" placeholder="Enter text ..."   name="details"> {{$viewAdmins->details}}</textarea>
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">فعال</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1" @if($user->status == 1) checked @endif>
                </div>
              </div>

            <div class="form-actions">
              <button type="submit" class="btn btn-success"> تحديث</button>
            </div>
        </form>
        </div>
      </div>

    
        </div>
      </div>
    </div>
  </div>
</div>

@endsection