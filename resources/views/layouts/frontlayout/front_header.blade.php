    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container text-center Header-Logo">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-md-2 m-auto">
                        <a href="#" class="logo">
                            <img src="{{asset('assets/img/logo.png')}}" alt="logo">
                        </a>
                    </div>
                    <!--== Logo End ==-->
                </div>
            </div>


            <div class="container">
                <div class="row  navbar navbar-expand-lg">
                    <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>
                    <!--== Main Menu Start ==-->
                    <nav class="mainmenu col-12 collapse navbar-collapse" id="mainmenu">
                        <div class="col-md-5 alignright">
                            <ul class="navbar-nav ">
                                 
                           @if(App::getLocale() == 'en')
                                <li class="nav-item">
                                    <a href="{{ LaravelLocalization::getLocalizedURL('ar',url()->current()) }}">
                                        <img style="width: 70px" src="{{asset('assets/img/icons/Arabic.jpg')}}">
                                    </a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a href="{{ LaravelLocalization::getLocalizedURL('en',url()->current()) }}">
                                        
                                        <img src="{{asset('assets/img/icons/lang.png')}}">
                                    </a>
                                </li>
                                @endif
                                
                                <li class="nav-item">
                                    <a href="#">
                                        <img src="{{asset('assets/img/icons/dollar.png')}}">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{asset('edit-Profile')}}">
                                        <img src="{{asset('assets/img/icons/user.png')}}">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    @if(empty(Auth::check()))
                                    <a href="{{asset('/login-register')}}">{{trans('main.login')}}
                                        &nbsp;
                                        
                                    </a>
                                    @else
                                        {{ Auth::user()->name }}
                                        <i class="fa fa-angle-down"></i>
                                    @endif

                                    @if(empty(Auth::check()))
                                    
                                    @else
                                    <ul>
                                        <li><a href="{{asset('/user-logout')}}"> {{trans('main.logout')}}</a></li>
                                        <!-- <li><a href="">رابط صفحة</a></li>
                                        <li><a href="">رابط صفحة</a></li> -->
                                    </ul>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-5 mr-auto alignleft">
                            <ul class="navbar-nav ">
                                <li class="nav-item active">
                                    <a href="/car/public/">
                                        {{trans('main.Home')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" data-toggle="modal" data-target="#Searchnow">
                                        {{trans('main.Search')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/reservasion-car')}}">
                                        {{trans('main.Reservasion')}}
                                    </a>
                                </li>
                               <li class="nav-item">
                                    <a href="{{url('contact')}}">
                                       {{trans('main.contact us')}}

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/about-us')}}">
                                      {{trans('main.About')}}  
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->