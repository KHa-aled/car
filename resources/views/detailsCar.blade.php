@extends('layouts.frontlayout.front_design')
@section('content') 

<style type="text/css">
    .list-inline {
    padding-left: 0;
    list-style: none;
    color: #ffd621 !important;
}
</style>

  @if ($errors->any())
                 <div class="alert alert-danger">
                     <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                 </div>
             @endif
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

    <section class="ordering section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <div class="BoX">
                        <div class="row">
                            <div class="col-3 text-center">
                                <img src="{{ asset('/images/backend_images/logo/small/'.$car->company->logo) }}" alt="" class="Companylogo">
                            </div>
                            <div class="col-6">
                                <h5 class="mb-2">
                                    {{ $car->company->name}}
                                 </h5>
                                
                                <ul class="list-inline companyRate">

                                  @if($star == 1)
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star-o"></span>
                                    <span class="fa fa-star-o"></span>
                                    <span class="fa fa-star-o"></span>
                                    <span class="fa fa-star-o"></span>
                                    @elseif($star == 2)
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star-o"></span>
                                    <span class="fa fa-star-o"></span>
                                    <span class="fa fa-star-o"></span>
                                    @elseif($star == 3)
                                    <i><span class="fa fa-star "></span></i>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star-o "></span>
                                    <span class="fa fa-star-o "></span>
                                    @elseif($star == 4)
                                 <span class="fa fa-star"></span>
                                 <span class="fa fa-star"></span>
                                 <span class="fa fa-star"></span>
                                 <span class="fa fa-star"></span>
                                <span class="fa fa-star-o"></span>
                                @else($star == 5)
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                @endif
                                
                        </ul>
                            </div>
                            
                                
                                
                            
                            <div class="col-3">
                                <div class="PriceNo text-center">
                                    <span class="price"> {{ $car->price}}  ريال</span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <div class="CAR-INFO">
                                <h5 class="mb-2">
                                    تفاصيل عن المركبة
                                </h5>
                                <p>
                                    نوع السيارة:
                                    <span>
                   @if($car->car_type==0) صغيره @elseif ($car->car_type==1) متوسطه   @else كبييره@endif
                                    </span>
                                </p>
                                <p>
                                    اسم السيارة:
                                    <span>
                                        {{ $car->car_name }}
                                    </span>
                                </p>
                                <p>
                                    التكييف: 
                                    <span>
                                        يوجد
                                    </span>
                                    الجير:
                                    <span>
                    @if($car->gear==0) جير @else عادي@endif
                                    </span>
                                    عدد المقاعد:
                                    <span>
                                        {{$car->distance}}
                                    </span>
                                    الكيلومترات باليوم:
                                    <span>
                                        {{$car->kilometer}} KM
                                    </span>
                                </p>
                            </div>
                            <hr>
                            <div class="CAR-INFO">
                                <h5 class="mb-2">
                                    معلومات اضافية اختيارية
                                </h5>
                                <form name="addtocartForm" id="addtocartForm" action="{{url(App::getLocale().'/add-cart')}}" method="post">{{csrf_field()}}
                                <input type="hidden" name="car_id" value="{{$car->id}}">
                                <input type="hidden" name="car_name" value="{{$car->car_name}}">
                                <input type="hidden" name="car_type" value="{{$car->car_type}}">
                                <input type="hidden" name="price" value="{{$car->price}}">
                                    <p class="d-inline">
                                        كرسي أطفال: 
                                    </p>
                                    <div class="cat-number d-inline">
                                        <a href="#" class="number-down">
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <input value="0" name="child_seat" class="form-control W50" type="text">
                                        <a href="#" class="number-up">
                                            <i class="fa fa-angle-up"></i>
                                        </a>
                                    </div><!--End cat-number-->
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="provide_driver"@if(!empty($addation->provide_driver)) value="{{$addation->provide_driver}}" @else value="0"  @endif  class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">
                                            توفير سائق للسيارة
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="additional_driver" @if(!empty($addation->additional_driver)) value="{{$addation->additional_driver}}" @else value="0"  @endif  class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">
                                            سائق اضافي
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="age_driver" @if(!empty($addation->age_driver)) value="{{$addation->age_driver}}" @else value="0"  @endif   class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">
                                            عمر السائق أكبر من 21 سنة
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="add_insurance" @if(!empty($addation->add_insurance)) value="{{$addation->add_insurance}}" @else value="0"  @endif  class="custom-control-input" id="customCheck4">
                                        <label class="custom-control-label" for="customCheck4">
                                            اضافة تأمين <span class="tetx-grey">
                                                
                                            </span>
                                            <a href="" data-toggle="modal" data-target="#Addtion" class="color">التفاصيل</a>
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="connect_car_place" @if(!empty($addation->connect_car_place)) value="{{$addation->connect_car_place}}" @else value="0"  @endif  class="custom-control-input" id="customCheck5">
                                        <label class="custom-control-label" for="customCheck5">
                                            توصيل  السيارة لمكانك
                                        </label>
                                    </div>
                                    <h6>
                                        وقت الاستلام
                                    </h6>
                                    <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">
                                                التاريخ
                                            </label>
                                            <input type="date" name="from_date" class="form-control date">
                                        </div>
                                    </div>
                                </div>
                                <h6>
                                    وقت التسليم
                                </h6>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">
                                                التاريخ
                                            </label>
                                            <input type="date" name="to_date" class="form-control date">
                                        </div>
                                    </div>
                                </div>
                                    <span class="text-danger">* يرجي الدفع مسبقاً</span>
                                    <div class="input-submit">
                                        <button type="submit btn-block">حجز الآن</button>
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
                                  @if(!empty($car->image))
                                     <img src="{{ asset('/images/backend_images/logo/medium/'.$car->image) }}">
                                    @endif
                            </div>
                            <div class="carousel-item">
                                   @if(!empty($car->image))
                                     <img src="{{ asset('/images/backend_images/logo/medium/'.$car->image) }}">
                                    @endif                            </div>
                            <div class="carousel-item">
                                   @if(!empty($car->image))
                                     <img src="{{ asset('/images/backend_images/logo/medium/'.$car->image) }}">
                                    @endif                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">السابق</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">التالي</span>
                        </a>
                    </div>
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
