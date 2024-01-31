@extends('layouts.frontlayout.front_design')
@section('content')

    <!--== Title Page Area Start ==-->
    <section class="P-title text-center">
        <div class="container">
            <h3 class="mb-2">
                طلب سيارة
            </h3>
            <p class="m-auto">
                هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال
            </p>
        </div>
    </section>
    <!--== Title Page Area End ==-->
    @if(Session::has('flash_message_success'))
                    <div class="alert alert-success alert-block">
                       <button type="button" class="close" data-dismiss="alert">×</button> 
                       <strong>{!! session('flash_message_success') !!}</strong>
                    </div>
                @endif
                @if(Session::has('flash_message_error'))
                    <div class="alert alert-danger alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                @endif
    <section class="ordering section-padding">
        <div class="container">
            <div class="row">
                
                <div class="col-md-7 col-sm-12">
                    <div class="BoX">
                        <div class="">
                            <div class="CAR-Ordering">
                                <form name="paymentForm" id="paymentForm" action="{{url(App::getLocale().'/order')}}" method="post">{{csrf_field()}}
                                    <?php $total_amount = 0; ?>
                                    @foreach($userCart as $cart)
                                    <h5 class="mb-3 ">
                                        اجمالى الفاتورة
                                    </h5>
                                    <table>
                                        <tr>
                                            <td>
                                                نوع السيارة 
                                            </td>
                                            <td>
                                                {{$cart->car_name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                عدد الايام
                                            </td>
                                            <td>
                                                {{$cart->number_days}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                السعر باليوم
                                            </td>
                                            <td class="color">
                                                {{$cart->price}}
                                            </td>
                                        </tr>
                                    
                                        <tr>
                                            <td>
                                                قيمة سائق للمركبة
                                            </td>
                                            <td class="color">
                                                {{$cart->provide_driver}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                سائق اضافي 
                                            </td>
                                            <td class="color">
                                                {{$cart->additional_driver}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                الضريبة
                                            </td>
                                            <td class="color">
                                                @if(!empty($addation->tax)) {{$addation->tax}}  @endif
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                المجموع
                                            </td>
                                            <?php $total_amount = $total_amount + ($cart->price*$cart->number_days) + $cart->provide_driver + $cart->additional_driver + $addation->tax ?>
                                            <td class="color">
                                                <?php echo $total_amount;?>
                                            </td>
                                        </tr>
                                        
                                        @if(!empty(Session::get('CouponAmount')))
                                        <tr>
                                            <td>
                                                الخصم
                                            </td>
                                            <td class="color">
                                                <?php echo Session::get('CouponAmount'); ?> 
                                            </td>
                                        </tr>
                                        <tr class="text-bold">
                                            <td>
                                                الاجمالي
                                            </td>

                                            <td class="color">
                                                <?php  echo $total_amount - Session::get('CouponAmount'); ?>
                                            </td>
                                            @else
                                            <td>
                                                الاجمالي المطلوب
                                            </td>
                                            <td class="color">
                                            <?php echo $total_amount ; ?>
                                            </td>
                                            @endif
                                        </tr>
                                    </table>
                                    

                                    <h5 class="mb-3 mt-3">
                                        خيارات الدفع
                                    </h5>
                                    <div class="custom-control custom-radio">
                                        <input type="hidden" name="grand_total" value="{{ $total_amount }}">
                                        <input type="radio" id="customRadio1" name="payment_method"  value="{{1}}" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio1">
                                            بطاقات الدفع
                                            <ul class="list-inline d-inline F-left">
                                                <li class="list-inline-item">
                                                    <img src="assets/img/icons/card-1.png" alt="">
                                                </li>
                                                <li class="list-inline-item">
                                                    <img src="assets/img/icons/card-2.png" alt="">
                                                </li>
                                                <li class="list-inline-item">
                                                    <img src="assets/img/icons/card-3.png" alt="">
                                                </li>
                                            </ul>
                                        </label>
                                    </div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="payment_method" value="{{0}}" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio2">
                                            الدفع عند الاستلام
                                        </label>
                                    </div>
                                    <div class="input-submit">
                                        <button type="submit" class="btn d-block CAT" data-toggle="modal" data-target="#CONFERMATION" onclick="return selectPaymentMethod();">
                                            الدفع
                                        </button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('/images/backend_images/logo/small/'.$cart->image) }}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    @endforeach
                    <h3 class="mb-2">
                        الكوبون
                    </h3>
                    <form action="{{ url('cart/apply-coupon') }}" method="post">{{ csrf_field() }}
                    <div class="input-group mb-2 mt-1">
                        <input type="text" name="coupon_code" class="form-control" placeholder="هل تمتلك كوبون كود" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-prepend">
                        <button class="btn" type="submit" id="button-addon1">
                            تأكيد
                        </button>
                        </div>
                    </div>
                    </form>
                    <div class="shareIt text-left mt-2">
                        <p class="d-inline">
                            مشاركة عبر:
                        </p>
                        <ul class="list-inline d-inline">
                            <li class="list-inline-item">
                                <a href="" class="google">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection