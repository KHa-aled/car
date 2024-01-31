@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> الرئيسيه </a> <a href="#">السياره </a> <a href="#" class="current">عرض السيارات </a> </div>
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
            <h5>عرض المهام  </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" >
              <thead>
                   <tr>
                     <th>id</th>
                     <th>العنوان </th>
                     <th>العمليات </th>
                   </tr>
              </thead>
              <tbody>

               @foreach($posts  as $post)
                      <tr class="gradeX">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                          <td class="center">          
                            <a href="post/{{$post->id}}" class="btn btn-primary btn-mini">تفاصيل</a>
                            <a <?php /* id="delCat" href="delete-category/{{$category->id}}" */?> rel="{{$post->id}}" rel1 ="delete-post" href ="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
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


