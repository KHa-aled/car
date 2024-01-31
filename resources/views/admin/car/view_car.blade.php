@extends('layouts.admin_layout.admin_design')

@section('content')
<style type="text/css">
.option{
 border-radius: 5px;
    margin-top: 10px;
    padding: 7px;
    margin-left: 15px;
    font-size: 20px;
    margin-right: -11px;
  }
</style>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> الرئيسيه </a> <a href="#">السياره </a> <a href="#" class="current">عرض السيارات </a> </div>
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
            <h5>السيارات </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" >
              <thead>

                <tr>
                  <th>الهويه</th>
                  <th>اسم السياره </th>
                  <th>نوع السياره </th>
                  <th>المكيف </th>
                  <th>الحير</th>
                  <th>عدد المقاعد</th>
                  <th>الكيلومتر </th>
                  <th>السعر</th>
                  <th>رقم السيارة</th>
                  <th>  الشركة</th>
                  <th>الماركة</th>
                  <th>الموديل</th>
                  <th>المسافة </th>
                  <th>الصورة</th>
                  <th>الحالة</th>
                  <th>العمليات</th>
                </tr>
              </thead>

              <tbody>

                 @foreach($cars  as $car)
                <tr class="gradeX">
                  <td>{{ $car->id }}</td>
                  <td>{{ $car->car_name }}</td>
                  <td>              
                   @if($car->car_type==0) صغيره @elseif ($car->car_type==1) متوسطه   @else كبييره@endif
                  </td>
                    <td>
                      @if($car->conditioner==0) لايوجد   @else يوجد @endif
                    </td>

                  <td>
                    @if($car->gear==0) عادي @else اتوماتيك@endif
                  </td>
                  <td>{{ $car->number_seat }}</td>
                  <td>{{ $car->kilometer }}</td>
                  <td>{{ $car->price }}</td>
                  <td>{{ $car->number_car }}</td>
                  <td>{{ $car->company->name }}</td>
                  <td>{{ $car->marker }}</td>
                  <td>{{ $car->mode }}</td>
                  <td>{{ $car->distance }}</td>
                  <td> 


                   @if(!empty($car->image))
                      <img src="{{ asset('/images/backend_images/logo/small/'.$car->image) }}" style="width:60px;">
                    @endif
                  </td>
                  <td>
                    @if($car->status== 1 )
                    <span style="color: green">متاحة</span>
                    @else
                    <span style="color: red">غير متاحة</span>
                    @endif
                  </td>
                    <td class="center">      
                          <a  href="edit-car/{{$car->id}}" class=" btn-info option  fa fa-edit" ></a>
                         <a href="#myModal" class="trigger-btn   btn-danger option fa fa-trash " data-toggle="modal"></a>
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

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <div class="icon-box">
          <i class="material-icons">&#xE5CD;</i>
        </div>        
        <h4 class="modal-title">عمليه  حذف </h4>  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p> هل  ما  زلت  متاكد  من عملي  الحذف   ? </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
      
          <a class="btn btn-danger" href="{{url('admin/delete-car/'.$car->id )}}"> Delete
<!--            <button type="button" class="btn btn-danger">Delete</button>
 -->         </a>

      </div>
    </div>
  </div>
</div>    

@endsection
