@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Companies</a> <a href="#" class="current">View Companies</a> </div>
    <h1>View Companies</h1>
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
            <h5>Categories</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>الاسم</th>
                  <th>العنوان</th>
                  <th>التفااصيل</th>
                  <th>الصوره</th>
                  <th>العمليات</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($companies as $company)
                <tr class="gradeX">
                  <td>{{ $company->id }}</td>
                  <td>{{ $company->name }}</td>
                  <td>{{ $company->address }}</td>
                  <td>{{ $company->details }}</td>
                  <td>
                    @if(!empty($company->logo))
                      <img src="{{ asset('/images/backend_images/logo/small/'.$company->logo) }}" style="width:60px;">
                    @endif
                  </td>
                  <td class="center"><a href="edit-company/{{$company->id}}" class="btn btn-primary btn-mini">تعديل</a> <a <?php /* id="delCat" href="delete-category/{{$category->id}}" */?> rel="{{$company->id}}" rel1 ="delete-company" href ="javascript:" class="btn btn-danger btn-mini deleteRecord">حذف</a></td>
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