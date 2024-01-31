@extends('layouts.admin_layout.admin_design')

@section('content')



<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> الرئيسيه</a> <a href="#">المهام </a> <a href="#" class="current">اضافه مهمه </a> </div>
    <h1>المهام</h1>
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

  @if (session('success'))
                    <div class="alert alert-success">
                        {!! session('success') !!}
                    </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
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
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('admin/post')}}" name="add_post" id="add_post" novalidate="novalidate">{{csrf_field()}}
           
              <div class="control-group">
                <label class="control-label">الشركات </label>
                <div class="controls">
                  <select name="company_id" style="width: 220px;">
                   @foreach($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">العنوان   </label>
                <div class="controls">
                   <input type="text" name="title" id="title">
                </div>
              </div>
                <div class="control-group">
                <label class="control-label">العنوان   </label>
                  <div class="controls">
                    <textarea class="textarea_editor span12" name ="body" rows="6" placeholder="Enter text ...      "></textarea>
                  </div>
               </div>
     
          
         <!--      <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <input type="file" name="image">
                </div>
              </div> -->
              <div class="form-actions">
                <input type="submit" value="اضافه  المهام  " class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


 
          
@endsection








