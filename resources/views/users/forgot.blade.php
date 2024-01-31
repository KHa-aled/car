@extends('layouts.frontlayout.front_design')
@section('content')  

    <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row SmallWidht">
                <div class="col-lg-8 col-md-10">
                    <div class="login-page-content">
                        <div class="login-form">
                            <h3 class="text-right">هل نسيت كلمة المرور
                                <br>
                                <span>
                                    الرجاء ادخال البريد الالكتروني المسجل به مسبقاً
                                </span>
                            </h3>
                            <form method='post' action="{{url('forgot/password')}}">{{csrf_field()}}
                                <div class="usermail">
                                    <label for="">
                                        البريد الالكتروني
                                    </label>
                                    <input type="mail" name="email"  placeholder="mail@test.com">
                                </div>
                                <br><br>
                                <br><br>
                                <br><br>
                                <br><br>
                                <div class="log-btn">
                                    <button type="submit">ارسال</button>
                                </div>
                            </form>
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