<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>Cart</title>

    <!--=== Bootstrap CSS ===-->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="{{ asset('assets/css/plugins/slicknav.min.css')}}" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="{{ asset('assets/css/plugins/magnific-popup.css')}}" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="{{ asset('assets/css/plugins/owl.carousel.min.css')}}" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="{{ asset('assets/css/plugins/gijgo.css')}}" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="{{ asset('assets/css/font-awesome.css')}}" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="{{ asset('assets/css/reset.css')}}" rel="stylesheet">
    @if(App::getLocale() == 'ar')
    <link href="{{ asset('style.css')}}" rel="stylesheet">
    @else
    <link href="{{ asset('style.css')}}" rel="stylesheet">
    <link href="{{ asset('style-en.css')}}" rel="stylesheet">
    @endif

    <!--=== Responsive CSS ===-->
    <link href="{{ asset('assets/css/responsive.css')}}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">    


    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="{{ asset('assets/img/preloader.gif')}}" alt="loading">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

@include('layouts.frontlayout.front_header')

  @yield('content')

@include('layouts.frontlayout.front_footer')
    <!--== Scroll Top Area Start ==-->
    
    <style>
button .close {
    position: absolute  !important;
    top: -28px !important;
    right: -17px !important;
    background: #feb005 !important;
    width: 30px !important;
    height: 30px;
    border-radius: 50% !important;
    color: #fff !important;
    opacity: 1 !important;
    z-index: 1 !important;
}

button.close {
    position: absolute  !important;
    top: -28px !important;
    right: -17px !important;
    background: #feb005 !important;
    width: 30px !important;
    height: 30px;
    border-radius: 50% !important;
    color: #fff !important;
    opacity: 1 !important;
    z-index: 1 !important;
}

    </style>
    <div class="scroll-top">
        <img src="{{ asset('assets/img/scroll-top.png')}}" alt="totop">
    </div>
    <!--== Scroll Top Area End ==-->


    <!-- Modal -->
    
    <div class="modal fade" id="Searchnow" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            

            <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
                
  

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="BoX Fillter">
                                    <form enctype="multipart/form-data" class="form-horizontal" method="get" action="{{url(App::getLocale().'/search-cars')}}">
                                         <h4>
                                            {{trans('main.Search Filter')}} 
                                        </h4>
                                        <!--<label>-->
                                        <!--    {{trans('main.Name Company')}}  -->
                                        <!--</label>-->
                                        <!--<select class="form-control" name="company">-->
                                        <!--    <option selected >{{trans('main.Name Company')}}</option>-->
                                        <!--    @foreach($companies as $company)-->
                                        <!--    <option value="{{$company->id}}">{{$company->name}}</option>-->
                                        <!--    @endforeach-->
                                        <!--</select>-->
                                        <label>
                                            {{trans('main.Name Company')}}
                                        </label>
                                        <select class="form-control" name="company" >
                                            <option selected value="" >{{trans('main.Name Company')}}</option>
                                            @foreach($companies as $company)
                                            <option value="{{$company->id}}" >{{$company->name}}</option>
                                            @endforeach
                                        </select>
                                        
                                        <label>
                                            {{trans('main.mark')}}
                                        </label>
                                        <select class="form-control" name="marker" >
                                            <option selected value="">{{trans('main.mark')}}</option>
                                            @foreach($carDetails as $carDetail)
                                            <option value="{{$carDetail->marker}}" >{{$carDetail->marker}}</option>
                                            @endforeach
                                        </select>
                                        <label>
                                            {{trans('main.model')}}
                                        </label>
                                        <select class="form-control" name="mode">
                                            <option selected value="">{{trans('main.model')}} </option>
                                            @foreach($carDetails as $carDetail)
                                            <option name="{{$carDetail->mode}}">{{$carDetail->mode}}</option>
                                            @endforeach
                                        </select>
                                        <label>
                                            عدد المقاعد
                                        </label>
                                        <select class="form-control" name="number_seat">
                                            <option selected value="">عدد المقاعد</option>
                                            @foreach($carDetails as $carDetail)
                                            <option name="{{$carDetail->number_seat}}">{{$carDetail->number_seat}}</option>
                                            @endforeach
                                        </select>
                                        <!-- <h4>
                                            ترتيب البحث
                                        </h4>
                                        <label>
                                            تقييم الشركة
                                        </label>
                                        <select class="form-control">
                                            <option selected>تقييم الشركة</option>
                                            <option value="1">
                                               نجمة واحدة
                                            </option>
                                            <option value="2">
                                                نجمتين
                                            </option>
                                            <option value="3">
                                                ثلاث نجوم
                                            </option>
                                            <option value="4">
                                                اربع نجوم
                                            </option>
                                            <option value="5">
                                                خمس نجوم
                                            </option>
                                        </select>-->

    <br>
      <!--<div data-role="rangeslider" class="form-control">-->
      <!--  <label for="price-min">Price:</label>-->
      <!--  <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">-->
      <!--  <label for="price-max">Price:</label>-->
      <!--  <input type="range" name="price-max" id="price-max" value="800" min="0" max="1000">-->
      <!--</div>-->
    ;
                                        <label>
                                            السعر
                                        </label> 
                                        <div class="wrapper">
                                            <div class="range-slider">
                                                <input type="text" class="js-range-slider" value="" />
                                            </div>
                                        </div>
                                        <label>
                                            المسافة
                                        </label>
                                        <div class="wrapper">
                                            <div class="range-slider">
                                                <input type="text" class="js-range-slider" value="" />
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit">بحث</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="BoX row companyitem">
                                    <div class="col-4 BR">
                                        <div class="CompanyInfo text-center">
                                            <img src="assets/img/icons/logo-1.png" alt="" class="Companylogo w-50">
                                            <ul class="list-inline companyRate">
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star"></i>
                                                </li>
                                            </ul>
                                            <h5 class="mb-3">
                                                55.55 ريال
                                            </h5>
                                            <button type="button" class="btn d-block CAT">تصفح</button>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="carInfo p-4">
                                            <h6 class="mb-2">
                                                الاستلام
                                            </h6>
                                            <p>
                                                اسم الشارع ، اسم المنطقة ، اسم المدينة  1234
                                            </p>
                                            <br>
                                            <h6 class="mb-2">
                                                التسليم
                                            </h6>
                                            <p>
                                                اسم الشارع ، اسم المنطقة ، اسم المدينة  1234
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="BoX row companyitem">
                                    <div class="col-4 BR">
                                        <div class="CompanyInfo text-center">
                                            <img src="assets/img/icons/logo-2.png" alt="" class="Companylogo w-50">
                                            <ul class="list-inline companyRate">
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star"></i>
                                                </li>
                                            </ul>
                                            <h5 class="mb-3">
                                                55.55  ريال
                                            </h5>
                                            <button type="button" class="btn d-block CAT">تصفح</button>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="carInfo p-4">
                                            <h6 class="mb-2">
                                                الاستلام
                                            </h6>
                                            <p>
                                                اسم الشارع ، اسم المنطقة ، اسم المدينة  1234
                                            </p>
                                            <br>
                                            <h6 class="mb-2">
                                                التسليم
                                            </h6>
                                            <p>
                                                اسم الشارع ، اسم المنطقة ، اسم المدينة  1234
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="BoX row companyitem">
                                    <div class="col-4 BR">
                                        <div class="CompanyInfo text-center">
                                            <img src="assets/img/icons/logo-3.png" alt="" class="Companylogo w-50">
                                            <ul class="list-inline companyRate">
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="fa fa-star"></i>
                                                </li>
                                            </ul>
                                            <h5 class="mb-3">
                                                55.55  ريال
                                            </h5>
                                            <button type="button" class="btn d-block CAT">تصفح</button>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="carInfo p-4">
                                            <h6 class="mb-2">
                                                الاستلام
                                            </h6>
                                            <p>
                                                اسم الشارع ، اسم المنطقة ، اسم المدينة  1234
                                            </p>
                                            <br>
                                            <h6 class="mb-2">
                                                التسليم
                                            </h6>
                                            <p>
                                                اسم الشارع ، اسم المنطقة ، اسم المدينة  1234
                                            </p>
                                        </div>
                                    </div>
                                </div>
                             
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="maparea h-100">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29213.038296132225!2d90.39150904197642!3d23.760577791538438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c783c3404f0d%3A0x76ae0d2edabc81df!2sHatir+Jheel!5e0!3m2!1sen!2sbd!4v1517941663187"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript"></script>
    <!-- Modal -->
    <!--=======================Javascript============================-->
    <!--=== Jquery Min Js ===-->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <!--=== Jquery Migrate Min Js ===-->
    <script src="{{ asset('assets/js/jquery-migrate.min.js')}}"></script>
    <!--=== Popper Min Js ===-->
    <script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <!--=== Gijgo Min Js ===-->
    <script src="{{ asset('assets/js/plugins/gijgo.js')}}"></script>
    <!--=== Vegas Min Js ===-->
    <script src="{{ asset('assets/js/plugins/vegas.min.js')}}"></script>
    <!--=== Isotope Min Js ===-->
    <script src="{{ asset('assets/js/plugins/isotope.min.js')}}"></script>
    <!--=== Owl Caousel Min Js ===-->
    <script src="{{ asset('assets/js/plugins/owl.carousel.min.js')}}"></script>
    <!--=== Waypoint Min Js ===-->
    <script src="{{ asset('assets/js/plugins/waypoints.min.js')}}"></script>
    <!--=== CounTotop Min Js ===-->
    <script src="{{ asset('assets/js/plugins/counterup.min.js')}}"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="{{ asset('assets/js/plugins/mb.YTPlayer.js')}}"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="{{ asset('assets/js/plugins/magnific-popup.min.js')}}"></script>

    <!--=== Mian Js ===-->
    <script src="{{ asset('assets/js/main.js')}}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.js'></script>
    <script src="{{ asset('assets/js/index.js')}}"></script>
    @yield('footer_scripts')

</body>

</html>