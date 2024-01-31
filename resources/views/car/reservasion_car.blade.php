@extends('layouts.frontlayout.front_design')
@section('content')

    <!--== Title Page Area Start ==-->
    <section class="P-title text-center">
        <div class="container">
            <h3 class="mb-2">
                حجوزاتي
            </h3>
            <p class="m-auto w-30">
                هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال
            </p>
        </div>
    </section>
    <!--== Title Page Area End ==-->

    <section class="MyReserve">
        <div class="container">
            <div class="row">
                @foreach($orders as $order)
                <div class="col-12 multi_step_form">
                    <form id="msform"> 
                        
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active">لم يتم التسليم</li>  
                            <li>قيد الحجز</li> 
                            <li>حجز منتهى</li>
                        </ul>
                    <!-- fieldsets -->
                    <fieldset class="CAR-INFO">
                        <div class="row">
                            <div class="col-md-2 col-sm-4">
                                <img src="{{ asset('/images/backend_images/logo/small/'.$order->car->image) }}" alt="" class="itemImg">
                            </div>
                            <div class="col-md-10 col-sm-8 text-right">
                                <img style="border-radius: 50%; " src="{{ asset('/images/backend_images/logo/small/'.$order->logo) }}" alt="" class="Companylogo">
                                <h5 class="mb-2">
                                    {{$order->name_company}}
                                </h5>
                                
                                <p>
                                    رقم الحجز: 
                                    <span class="OrderNo">
                                        {{$order->id}}
                                    </span>
                                </p>
                                <p>
                                    السعر النهائي:
                                    <span>
                                        {{$order->grand_total}}
                                    </span>
                                </p>
                                <p>
                                    نوع السيارة:
                                    <span>
                                        
                                        @if($order->car->car_type==0) صغيره @elseif ($order->car->car_type==1) متوسطه   @else كبييره@endif
                                    </span>
                                </p>
                                <p>
                                    اسم السيارة:
                                    <span>
                                        {{$order->car_name}}
                                    </span>
                                </p>
                                <p>
                                    التكييف: 
                                    <span>
                                        @if($order->car->conditioner==0) لايوجد   @else يوجد @endif
                                    </span>
                                    الجير:
                                    <span>
                                        @if($order->car->gear==0) عادي @else اتوماتيك@endif
                                    </span>
                                    عدد المقاعد:
                                    <span>
                                        {{$order->car->number_seat}}
                                    </span>
                                    الكيلومترات باليوم:
                                    <span>
                                        {{$order->car->kilometer}}
                                    </span>
                                    <br>
                                    كرسي أطفال:
                                    <span>
                                        {{$order->child_seat}}
                                    </span>
                                    سائق اضافي:
                                    <span>
                                        @if($order->additional_driver==0) لايوجد   @else يوجد @endif
                                    </span>
                                </p>
                                <div class="CTA-buttons">
                                    <button type="button" class="btn d-inline CTA-cancel" data-toggle="modal" data-target="#Cancelation">
                                        إلغاء
                                    </button>
                                    <button type="button" class="btn d-inline CTA-edit" data-toggle="modal" data-target="#Editation">
                                        تعديل
                                    </button>
                                    <button type="button" class="btn d-inline CTA-add" data-toggle="modal" data-target="#Addtion">
                                        ترقية
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="next action-button">المرحلة التالية</button> 
                         
                    </fieldset>
                    <fieldset class="CAR-INFO">
                        <div class="row">
                            <div class="col-md-2 col-sm-4">
                                <img src="{{ asset('/images/backend_images/logo/small/'.$order->car->image) }}" alt="" class="itemImg">
                            </div>
                            <div class="col-md-10 col-sm-8 text-right">
                                <img src="{{ asset('/images/backend_images/logo/small/'.$order->logo) }}" alt="" class="Companylogo">
                                <h5 class="mb-2">
                                    {{$order->name_company}}
                                </h5>
                                <p>
                                    رقم الحجز: 
                                    <span class="OrderNo">
                                        {{$order->id}}
                                    </span>
                                </p>
                                <p>
                                    السعر النهائي:
                                    <span>
                                        {{$order->grand_total}}
                                    </span>
                                </p>
                                <p>
                                    نوع السيارة:
                                    <span>
                                        @if($order->car->car_type==0) صغيره @elseif ($order->car->car_type==1) متوسطه   @else كبييره@endif
                                    </span>
                                </p>
                                <p>
                                    اسم السيارة:
                                    <span>
                                        {{$order->car_name}}
                                    </span>
                                </p>
                                <p>
                                    التكييف: 
                                    <span>
                                        @if($order->car->conditioner==0) لايوجد   @else يوجد @endif
                                    </span>
                                    الجير:
                                    <span>
                                         @if($order->car->gear==0) عادي @else اتوماتيك@endif
                                    </span>
                                    عدد المقاعد:
                                    <span>
                                        {{$order->car->number_seat}}
                                    </span>
                                    الكيلومترات باليوم:
                                    <span>
                                        {{$order->car->kilometer}}
                                    </span>
                                    <br>
                                    كرسي أطفال:
                                    <span>
                                        {{$order->child_seat}}
                                    </span>
                                    سائق اضافي:
                                    <span>
                                         @if($order->additional_driver==0) لايوجد   @else يوجد @endif
                                    </span>
                                </p>
                                <div class="Counter">
                                    <h5>
                                        الوقت المتبقي للتسليم
                                    </h5>
                                    <p id="DeliverCounter{{$order->id}}"></p>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="next action-button">المرحلة التالية</button>  
                    </fieldset>  
                    <fieldset class="CAR-INFO">
                        <div class="row">
                            <div class="col-md-2 col-sm-4">
                                <img src="{{ asset('/images/backend_images/logo/small/'.$order->car->image) }}" alt="" class="itemImg">
                            </div>
                            <div class="col-md-10 col-sm-8 text-right">
                                <img src="{{ asset('/images/backend_images/logo/small/'.$order->logo) }}" alt="" class="Companylogo">
                                <h5 class="mb-2">
                                     {{$order->name_company}}
                                </h5>
                                <p>
                                    رقم الحجز: 
                                    <span class="OrderNo">
                                        {{$order->id}}
                                    </span>
                                </p>
                                <p>
                                    السعر النهائي:
                                    <span>
                                       {{$order->grand_total}}
                                    </span>
                                </p>
                                <p>
                                    نوع السيارة:
                                    <span>
                                         @if($order->car->car_type==0) صغيره @elseif ($order->car->car_type==1) متوسطه   @else كبييره@endif
                                    </span>
                                </p>
                                <p>
                                    اسم السيارة:
                                    <span>
                                        {{$order->car_name}}
                                    </span>
                                </p>
                                <p>
                                    التكييف: 
                                    <span>
                                        @if($order->car->conditioner==0) لايوجد   @else يوجد @endif
                                    </span>
                                    الجير:
                                    <span>
                                        @if($order->car->gear==0) عادي @else اتوماتيك@endif
                                    </span>
                                    عدد المقاعد:
                                    <span>
                                        {{$order->car->number_seat}}
                                    </span>
                                    الكيلومترات باليوم:
                                    <span>
                                        {{$order->car->kilometer}}
                                    </span>
                                    <br>
                                    كرسي أطفال:
                                    <span>
                                       {{$order->child_seat}}
                                    </span>
                                    سائق اضافي:
                                    <span>
                                         @if($order->additional_driver==0) لايوجد   @else يوجد @endif
                                    </span>
                                </p>
                                <div class="RatingInfo">
                                    <p>
                                        وقت الاستلام:
                                        <span>
                                            {{$order->from_date}}
                                        </span>
                                    </p>
                                    <p>
                                        وقت التسليم:
                                        <span>
                                            {{$order->to_date}}
                                        </span>
                                    </p>
                                    <p>
                                        التقيمات:
                                    </p>
                                    <p class="w-50">
                                        <span>
                                            تقييم الشركة التابع لها السيارة
                                            &nbsp;&nbsp;
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <br>
                                        <span>
                                            تقييم السيارة
                                            &nbsp;&nbsp;
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                        <button type="button" class="btn d-block CAT" data-toggle="modal" data-target="#DAYS">
                                            تقديم التقييم
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </fieldset>  
                    </form>  
                </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
@section('footer_scripts')
    @if(!empty(Auth::check()))
        @foreach($orders as $order)
           <script>
            $( document ).ready(function() {
        // Set the date we're counting down to

       
       //alert(mySQLDate);
       // new Date(Date.parse(mySQLDate.replace('-','/','g')));
       
        //var countDownDate = new Date(Date.parse(mySQLDate.replace('-','/','g'))).getTime();

        var mySQLDate = '{{$order->to_date}}';
        //alert(mySQLDate);
        var countDownDate = new Date(mySQLDate).getTime();
        // Update the count down every 1 second
        var x = setInterval(function() {

          // Get todays date and time
          var now = new Date().getTime();
            
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
            
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
          // Output the result in an element with id="demo"
          $("#DeliverCounter{!! $order->id !!}").html(days + "يوم  " + hours + "ساعة  "
          + minutes + "دقيقة  " + seconds + "ثانية  ");
            //alert("DeliverCounter{!! $order->id !!}::"+days + "يوم  " + hours + "ساعة  "+ minutes + "دقيقة  " + seconds + "ثانية  ");
          // If the count down is over, write some text 
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("DeliverCounter{!! $order->id !!}").innerHTML = "EXPIRED";
          }
        }, 1000);
    });
    </script> 
    @endforeach
    @endif
@endsection