@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> الرئيسية</a> <a href="#">الشركات</a> <a href="#" class="current">أضافة شركة</a> </div>
    <h1>الشركات</h1>
  </div>


  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>المعلومات الشخصية</h5>
        </div>

        @foreach ($errors->all() as $error)
           <p class="alert alert-danger">{{ $error }}</p>
         @endforeach
        <div class="widget-content nopadding">
    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('admin-creat')}}" name="add_company" id="add_company" novalidate="novalidate">{{csrf_field()}}
            <div class="control-group">
              <label class="control-label">اسم المستخدم:</label>
              <div class="controls">
                <input type="text" class="span8" name="name" class="form-control" value="{{old('name')}}" placeholder="اسم المستخدم" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">الايميل :</label>
              <div class="controls">
                <input type="text" class="span8" name="email" class="form-control" value="{{old('email')}}" placeholder="الايميل" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">كلمة المرور</label>
              <div class="controls">
                <input type="password"  class="span8" name="password" class="form-control" placeholder="كلمة المرور"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">العنوان</label>
              <div class="controls">
                <input type="text"  class="span8" name="address" class="form-control"  value="{{old('address')}}"placeholder="عنوان المستخدم"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">الهاتف</label>
              <div class="controls">
                <input type="text"  class="span8" name="phone" value="{{old('phone')}}" class="form-control" placeholder="رقم الهاتف "  />
              </div>
            </div>
            <div class="control-group">
              <label for="normal" class="control-label">اسم الشركة</label>
              <div class="controls">
                <input type="text" class="span8"  id="mask-phone" name="name_company" class="form-control" value="{{old('name_company')}}" class="span8 mask text">
              </div>
            </div>
            <div class="control-group">
              <label for="normal" class="control-label">عنوان الشركة</label>
              <div class="controls">
                <input type="text" class="span8"  id="mask-phoneInt" name="address" class="form-control"  value="{{old('address')}}"class="span8 mask text">
              </div>
            </div>
            <div class="control-group">
              <label for="normal" class="control-label">تفاصيل الشركة</label>
              <div class="controls">
                <textarea class="textarea_editor span8" class="form-control" rows="6" placeholder="Enter text ..." value="{{old('details')}}" name="details">  </textarea>
              </div>
            </div>
            <div class="control-group">
                <label class="control-label">فعال</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1" class="form-control">
                </div>
              </div>
            <div class="control-group">
                <label class="control-label">الصورة الشخصية</label>
                <div class="controls">
                  <input type="file" name="logo" value="{{old('logo')}}" class="form-control">
                </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">اضافة مستخدم</button>
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