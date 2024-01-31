@extends('layouts.frontlayout.front_design')
@section('content') 

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="assets/img/preloader.gif" alt="loading">
            </div>
        </div>
    </div>


 <!--== Title Page Area End ==-->

    <section class="Info-Tabs">
        <div class="container">
            <div class="row">
                <div class="col-10 m-auto">
                    <div class="accordion" id="accordionExample">
                        @foreach($abouts as $about)
                        <div class="card">
                            <div class="card-header" id="heading{{$about->id}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link w-100" type="button" data-toggle="collapse" data-target="#collapse{{$about->id}}" aria-expanded="true" aria-controls="collapse{{$about->id}}">
                                        {!! $about->{App::getLocale().'_titel'} !!}
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse{{$about->id}}" class="collapse show" aria-labelledby="heading{{$about->id}}" data-parent="#accordionExample">
                                <div class="card-body">

                                    <p>
                                        
                                        {!! $about->{App::getLocale().'_description'} !!}
                                                                                                                                                                                                        {{trans('main.aboutus-body')}} 

                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


 @endsection