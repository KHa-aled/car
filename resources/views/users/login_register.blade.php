@extends('layouts.frontlayout.front_design')
@section('content') 

 <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row SmallWidht">
                <div class="col-lg-8 col-md-10">
                    <div class="login-page-content">
                        <div class="login-form">
                            <h3 class="text-right">                                             {{trans('main.login-register')}} 
 </h3>
                            <form action="{{url(App::getLocale().'/user-login')}}" method="post" id = "registerForm" name="registerForm">{{csrf_field()}}
                                <div class="usermail">
                                    <label for="">
                                                                                      {{trans('main.login-register-email')}} 

                                    </label>
                                    <input type="mail" name="email" placeholder="mail@test.com">
                                </div>
                                <div class="password">
                                    <label for="">
                                                                                  {{trans('main.login-register-password')}} 
                                    </label>
                                    <input type="password" name="password" placeholder="******">
                                </div>
                                <div class="Loglinks">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">تذكرني</label>
                                    </div>
                                    <a class="F-left" href="{{asset('forgot')}}">
                                        نسيت كلمة المرور؟
                                    </a>
                                </div>
                                <div class="log-btn">
                                    <button type="submit">تسجيل الدخول</button>
                                    
                                    <a href="{{asset('register-clients')}}" class="W-loginBtn">تسجيل حساب جديد
                                       
                                    </a>
                                </div>
                            </form>
                        </div>
                        
                        <div class="login-other text-center">
                            <span class="or">أو التسجيل عبر وسائل التواصل</span>
                            <a href="{{asset('login-register/facebook')}}" class="login-with-btn facebook">تسجيل الدخول عبر فيسبوك
                                <i class="fa fa-facebook F-left"></i>
                            </a>
                            <a href="#" class="login-with-btn twitter">تسجيل الدخول عبر تويتر
                                <i class="fa fa-twitter F-left"></i> 
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-2">
                    <div class="Col_img"></div>
                </div>
            </div>
        </div>
    </section>
    <!--== Login Page Content End ==-->

@endsection