@extends('layouts.admin_layout.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> الرئيسيه</a> <a href="#">الكوبونات</a> <a href="#" class="current">عرض الكوبون</a> </div>
    <h1>View Coupons</h1>
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
            <h5>Coupons</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <<th>رقم الكوبون</th>
                  <th>كود الكوبون</th>
                  <th>كميه الخصم</th>
                  <th>نوع الخصم</th>
                  <th>تاريخ الخصم</th>
                  <th>تاريخ الانشاء</th>
                  <th>عدد الايام </th>
                  <th>الحاله</th>
                  <th>العمليات</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($coupons as $coupon)
                <tr class="gradeX">
                  <td>{{ $coupon->id }}</td>
                  <td>{{ $coupon->coupon_code }}</td>
                  <td>
                    {{ $coupon->amount }}
                    @if($coupon->amount_type == "Percentage") % @else INR @endif
                  </td>
                  <td>{{ $coupon->amount_type }}</td>
                  <td>{{ $coupon->expiry_date }}</td>
                  <td>{{ $coupon->created_at }}</td>
                  <td></td>
                  <td>
                    @if($coupon->status==1) Active @else Inactive @endif
                  </td>

                  <td class="center"> <a href="{{ url('/admin/edit-coupon/'.$coupon->id) }}" class="btn btn-primary btn-mini" title="Edit Coupon">تعديل</a>  <a <?php /*onclick="return delCoupon();" href="{{ url('/admin/delete-coupon/'.$coupon->id) }}"*/ ?> rel="{{$coupon->id}}" rel1 = "delete-coupon" href="javascript:" class="btn btn-danger btn-mini deleteRecord" title="Delete Coupon">حذف</a></td>
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

<script>
  
 /* function delCoupon(){
    if (confirm('Are You Sure You Want To Delete This Coupon')) {
      return true;
    }
    return false;
  }*/
</script>


@endsection