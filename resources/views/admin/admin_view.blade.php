@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> الرئيسية</a> <a href="#">الشركات</a> <a href="#" class="current">عرض المستخدمين</a> </div>
    <h1>عرض المستخدمين والشركات</h1>
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
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>المستخدمين</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>اسم المستخدم</th>
                  <th>الإيميل</th>
                  <th>التليفون</th>
                  <th>العنوان</th>
                  <th>اسم الشركة</th>
                  <th>عنوان الشركة</th>
                  <th>لوجو الشركة</th>
                  <th>حالة الحساب</th>
                  <th>التعديلات</th>
                </tr>
              </thead>
              <tbody>

               
              	@foreach($viewAdmins as $viewAdmin)
                <tr class="gradeX">

              
                  <td>{{ $viewAdmin->id }}</td>
                  <td>{{ $viewAdmin->user->name }}</td>
                  <td>{{$viewAdmin->user->email}}</td>
                  <td>{{$viewAdmin->user->phone}}</td>
                  <td>{{$viewAdmin->user->address}}</td>
                  <td>{{$viewAdmin->name}}</td>
                  <td>{{$viewAdmin->address}}</td>
                  <td><img src="{{ asset('/images/backend_images/logo/small/'.$viewAdmin->logo) }}" style="width:60px;"></td>
                  <td>@if($viewAdmin->user->status == "1") <span style="color: green">فعال</span>@else <span style="color: red">غير فعال</span> @endif</td>
                  <td class="center"><a href="admin-edit/{{$viewAdmin->user->id}}" class="btn btn-primary btn-mini">تعديل</a> </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection