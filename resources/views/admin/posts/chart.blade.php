@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> الرئيسيه</a> <a href="#">الاحصائيات </a> <a href="#" class="current">الحاض </a> </div>
    <h1>الاحصائيات </h1>
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
     {!! Charts::assets() !!}

    @if(isset($chart))

         {!! $chart->render() !!} 

     @else
     <h3  style="text-align: center;padding-bottom: 50px;padding-top: 11px;"> 
     لا يوجد  اي  احصاائيات 
    </h3>
     @endif

            
          </div>
      </div>
      
  </div>
</div>
     
@endsection