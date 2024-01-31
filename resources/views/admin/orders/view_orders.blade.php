@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> الرئيسيه </a> <a href="#">السياره </a> <a href="#" class="current">الحجوزات </a> </div>
    <h1>عرض الحجوزات</h1>
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
            <h5>الحجوزات </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" >
              <thead>

                <tr>
                  <th>الهويه</th>
                  <th>الايميل </th>
                  <th>الاسم </th>
                  <th>العنوان </th>
                  <th>الهاتف</th>
                  <th>المدينة</th>
                  <th>تاريخ الاستلام</th>
                  <th> تاريخ التسليم</th>
                  <th>اسلوب الدفع</th>
                  <th>المبلغ المطلوب</th>
                  <th>العمليات</th>
                </tr>
              </thead>
              <tbody>
@if(isset($orders))

                 @foreach($orders  as $order)
                <tr class="gradeX">
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->user_email }}</td>
                  <td>{{ $order->name }} </td>
                  <td>{{ $order->address }}</td>
                  <td>{{ $order->phone }}</td>
                  <td>{{ $order->city }}</td>
                  <td>{{ $order->from_date }}</td>
                  <td>{{ $order->to_date }}</td>
                  <td>@if($order->payment_method==1) بطاقات الدفع @else الدفع عند الاستلام@endif</td>
                  <td>{{ $order->grand_total }}</td>
                    <td class="center">
                  
                     <!--  <a href="edit-car/{{$order->id}}" class="btn btn-primary btn-mini">Edit</a>
                   

                     
                     <a <?php /* id="delCat" href="delete-category/{{$category->id}}" */?> rel="{{$order->id}}" rel1 ="delete-car" href ="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                    -->

                   </td>
                </tr>
                @endforeach
       @endif

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection


