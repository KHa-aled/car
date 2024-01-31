@extends('layouts.frontlayout.front_design')
@section('content') 

<!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
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

    @if ($errors->any())
                 <div class="alert alert-danger">
                     <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                 </div>
             @endif

             
            <div class="row SmallWidht">
                <div class="col-lg-8 col-md-10">
                    <div class="login-page-content">
                        <div class="login-form">
                            <h3 class="text-right">تسجيل  جديد</h3>
                     <form action="{{url(App::getLocale().'/register-clients')}}" method="post" id = "registerForm" name="registerForm">{{csrf_field()}}
                                <div class="username {{ $errors->has('') ? ' has-error' : '' }}">
                                    <label for="">
                                        اسم المستخدم
                                    </label>
                                    <input type="text" name="name" placeholder="اسم المستخدم">
                                </div>
                                <div class="usermail  {{ $errors->has('usermail') ? ' has-error' : '' }}">
                                    <label for="">
                                        البريد الالكتروني
                                    </label>
                                    <input type="mail" name="email"  placeholder="mail@test.com">
                                </div>
                                <div class="password  {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="">
                                        كلمة المرور
                                    </label>

                                    <input type="password" name="password"  placeholder="******">
                                </div>
                                <div class="phone  {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="">
                                        رقم الهاتف
                                    </label>
                                    <input type="phone" name="phone" placeholder="00123456789">
                                </div>
                                <div class="addres  {{ $errors->has('addres') ? ' has-error' : '' }}">
                                    <label for="">
                                        البريد الالكتروني
                                    </label>
                                    <input type="text" name="address" placeholder="الدولة ، المدينة، الشارع ، 1234">
                                </div>
<!--                                 <button class="btn d-grey text-right">
                                    اضافة بطاقة بنكية
                                </button>
                                <span class="text-danger">
                                    * لتسريع عميلة  الحجز
                                </span> -->
                                <div class="log-btn">
                                    <button type="submit">التالى</button>
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



