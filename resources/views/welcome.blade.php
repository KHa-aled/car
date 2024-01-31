@extends('layouts.frontlayout.front_design')
@section('content') 
  <!--== Title Page Area Start ==-->
    <section class="Home-banner">
        <div class="container">
            <div class="row">
             <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                    
                </div>
                <div class="col-xl-4 col-lg-7 col-md-9 col-sm-12">
                    <div class="boxing">
                        <form action="">
                            <h4>
                               {{trans('main.Make your own journey')}}
                            </h4>
                            <p>
                              {{trans('main.Rent a car wherever you want')}}
                            </p>
                            <h6>
                              {{trans('main.Rent a car wherever you want')}}  
                            </h6>
                            <div class="form-group">
                                <label for="">
                                   {{trans('main.Address Write')}}
                                </label>
                                <div class="input-group mb-3 Location">
                                    <input type="text"  class="form-control location" placeholder="{{trans('main.Select your location')}}">
                                    <div class="input-group-append">
                                        <button class="btn" type="button">
                                            <img src="{{asset('assets/img/icons/location.png')}}">
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group" style="">
                                            <label for="">
                                                ا{{trans('main.Date')}}
                                            </label>
                                            <input type="date" name="" class="form-control date">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">
                                                {{trans('main.Time')}}
                                            </label>
                                            <input type="time" name="" class="form-control time">
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">{{trans('main.Return the car to the same place')}}</label>
                                </div>
                            </div>
                            <h6>
                               {{trans('main.Delivery Information')}}
                            </h6>
                            <div class="form-group">
                                <label for="">
                                    {{trans('main.Address Write')}}
                                </label>
                                <div class="input-group mb-3 Location">
                                    <input type="text"  class="form-control location" placeholder="{{trans('main.Select your location')}}">
                                    <div class="input-group-append">
                                        <button class="btn" type="button">
                                            <img src="{{asset('assets/img/icons/location.png')}}">
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">
                                                {{trans('main.Date')}}
                                            </label>
                                            <input type="date" name="" class="form-control date">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">
                                                {{trans('main.Time')}}
                                            </label>
                                            <input type="time" name="" class="form-control time">
                                        </div>
                                    </div>
                                </div>
                                <h6 class="mb-2">
                                    {{trans('main.Additional information is optional')}}
                                </h6>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">{{trans('main.Providing a driver for the car')}}</label>
                                </div>
                                <br>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">{{trans('main.Connect the car to your place')}}</label>
                                </div>
                                <br>
                                <span class="text-danger mr-4">
                                    * {{trans('main.Please advance payment')}}
                                </span>
                                <button type="submit" class="btn submit">
                                    <img src="{{asset('assets/img/icons/search.png')}}" alt="">
                                   {{trans('main.Search the Car')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-3 col-md-1 col-sm-12">
                    
                </div>
            </div>
        </div>
    </section>
    <!--== Title Page Area End ==-->

    <section class="Features2  section-padding P-title text-center">
        <div class="container">
            <h3 class="mb-2">
                عن CRT
            </h3>
            <p class="m-auto pb-5 w-30">
              {{trans('main.Lorem')}} 
            </p>
            <div class="row">
                <div class="col-md col-sm-12">
                    <div class="Icon-feature">
                        <div class="icon">
                            <img src="{{asset('assets/img/icons/1b.png')}}">
                        </div>
                        <h4>
                            {{trans('main.Available')}} 24/7
                        </h4>
                        <p>
                            {{trans('main.Lorem')}}
                        </p>
                    </div>
                </div>
                <div class="col-md col-sm-12">
                    <div class="Icon-feature">
                        <div class="icon">
                            <img src="{{asset('assets/img/icons/2b.png')}}">
                        </div>
                        <h4>
                            {{trans('main.Easy to pay')}}
                        </h4>
                        <p>
                           {{trans('main.Lorem')}}
                        </p>
                    </div>
                </div>
                <div class="col-md col-sm-12">
                    <div class="Icon-feature">
                        <div class="icon">
                            <img src="{{asset('assets/img/icons/3b.png')}}">
                        </div>
                        <h4>
                            {{trans('main.Search for sites')}}
                        </h4>
                        <p>
                          {{trans('main.Lorem')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="Info section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mr-auto">
                    <div class="info">
                        <h3>
                           {{trans('main.Advanced Search')}}
                        </h3>
                        <p>
                           {{trans('main.Lorem')}}
                        </p>
                        <button class="btn ">{{trans('main.Advanced Search')}} </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="Categories P-title text-center">
        <div class="container">
            <h3 class="mb-2">
                {{trans('main.Classifications')}}
            </h3>
            <p class="m-auto pb-5 w-30">
                {{trans('main.Lorem')}}
            </p>
            <div class="container">
            <div class="row">
            @foreach ($cars as $car)    
               <div class="col-md-4 col-sm-12">
                    <div class="card mb-4">
                        <td>
                            @if(!empty($car->image))
                                <img src="{{ asset('/images/backend_images/logo/small/'.$car->image) }}" class="card-img-top" alt="..."">
                            @endif
                        </td>

                        <td>
                            <div class="card-body">
                                <h6 class="card-title">
                                  @if($car->car_type==0) صغيره @elseif ($car->car_type==1) متوسطه   @else كبييره@endif                               
                                </h6>
                                 
                                <a href="index/{{$car->id}}" class="btn d-block">تصفح</a>
                            </div>
                    </div>
                </div>
             @endforeach 

            </div>

            <span style="display: -webkit-inline-box;">
            <?php echo $cars->links(); ?>                                 
            </span>

        </div>
    </section>

    <section class="Info2 section-padding" style="background:url(assets/img/banner3.jpg);background-repeat:no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="info">
                        <h3>
                            {{trans('main.Application Download Now')}}
                        </h3>
                        <p>
                         {{trans('main.Lorem')}}   
                        </p>
                        <div class="text-center">
                            <button class="btn d-inline"><i class="fa fa-android"></i>&nbsp; ANDROID</button>
                            <button class="btn d-inline"><i class="fa fa-apple"></i>&nbsp; IOS</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </div>
            <div class="row Subscription">
                <div class="col-md-2 mr-auto">
                    <img src="{{asset('assets/img/send.png')}}">
                </div>
                <div class="col-md-8">
                    <div class="subscripe">
                        <h4 class="mb-4">
                            {{trans('main.Share the newsletter')}}
                        </h4>
                        <p class="mb-4">
                            {{trans('main.Lorem')}} 
                        </p>

                        <form action="">
                            <div class="usermail">
                                <label for="">
                                {{trans('main.Email')}}
                                </label>
                                <input type="mail" placeholder="mail@test.com">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>





@endsection    

