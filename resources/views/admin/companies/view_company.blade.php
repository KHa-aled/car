@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">عرض   الشركات  </a> </div>
    <h1>View Categories</h1>
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
            <h5>عرض الشركات</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>الهويه</th>
                  <th>اسك  الشركه </th>
                  <th>شعار</th>
                  <th>العنوان</th>
                  <th>التفاصيل</th>
                  <th>العمليات </th>
                </tr>
              </thead>
              <tbody>
     
              	@foreach($companies as $companie)
                <tr class="gradeX">
                  <td>{{ $companie->id }}</td>
                  <td>{{ $companie->name }}</td>
                  <td> @if(!empty($companie->logo))
                      <img src="{{ asset('images/backend_images/products/large/'.$companie->logo) }} " width="30px">
                    @endif</td>
                  <td>{{ $companie->address }}</td>
                  <td>{{ $companie->details }}</td>
              
                  <td class="center"><a href="edit-companie/{{$companie->id}}" class="btn btn-primary btn-mini">Edit</a> 
                    <a <?php /* id="delCat" href="delete-category/{{$category->id}}" */?> rel="{{$companie->id}}" rel1 ="delete-companie" href ="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete
                    </a>
                  </td>
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