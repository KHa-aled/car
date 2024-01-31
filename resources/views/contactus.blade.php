@extends('layouts.frontlayout.front_design')
@section('content') 


    <!--== Title Page Area Start ==-->
    <section class="P-title text-center">
        <div class="container">
            <h3 class="mb-2">
            {{trans('main.contact-us')}} 
            </h3>
            <p class="m-auto">
              {{trans('main.contact-us-type')}} 

            </p>
        </div>
    </section>
    <!--== Title Page Area End ==-->
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

    <!--== Contact Page Area Start ==-->
    <div class="contact-page-wrao section-padding">
        <div class="container">
            <div class="row boxing">
                <div class="col-lg-6">
                    <h2 class="mb-2">
                        لا تتردد في التواصل معنا
                    </h2>
                    <p class="mb-3 mt-3">
                        
                                      {{trans('main.contact-us-type')}} 

                      . 
                    </p>

                    

                    <div class="contact-form">
                         <form method="post" action="contact">
                            {{ csrf_field() }} 

                                                      
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="name-input {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="">
                                           {{trans('main.contact-us-fullname')}} 

                                        </label>
                                        <input type="text" name="name" placeholder="الاسم كاملاً"   >
                                        @if ($errors->has('name'))
                                        <span class="help-block" style="color: red">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                       @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="email-input {{ $errors->has('email') ? ' has-error' : '' }} ">
                                        <label for="">
                                                           {{trans('main.contact-us-email')}} 

                                        </label>
                                        <input type="email" name="email" placeholder="mail@test.com" required >
                                          @if ($errors->has('email'))
                                              <span class="help-block" style="color: red" >
                                                  <strong>{{ $errors->first('email') }}</strong>
                                              </span>
                                          @endif
                                     </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="subject-input {{ $errors->has('subject') ? ' has-error' : '' }}">
                                        <label for="">
                                                          {{trans('main.contact-us-subject')}} 

                                        </label>
                                        <input type="text" name="subject"  placeholder="اكتب هنا" >
                                           @if ($errors->has('subject'))
                                              <span class="help-block" style="color: red" >
                                                  <strong>{{ $errors->first('subject') }}</strong>
                                              </span>
                                          @endif
                                    </div>
                                </div>
                            </div>

                            <div class="message-input {{ $errors->has('message') ? ' has-error' : '' }}">
                                <label for="">
                                                  {{trans('main.contact-us-massage')}} 

                                </label>
                                    <textarea name="message" cols="30" name="" rows="10" placeholder="اكتب هنا"></textarea>
                                          @if ($errors->has('subject'))
                                              <span class="help-block" style="color: red" >
                                                  <strong>{{ $errors->first('subject') }}</strong>
                                              </span>
                                          @endif
                            </div>

                            <div class="input-submit">
                                <button type="submit" class="btn btn-primary btn-round btn-sm">{{trans('main.contact-us-send')}}</button>
                            </div>
                        </form>

               
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-2">
                    <p class="mb-3 mt-3">                                      {{trans('main.contact-us')}} 
                    </h2>
                    <p class="mb-3 mt-3">                                      {{trans('main.contact-us-type')}} 
. 
                    </p>
                    <ul class="list-inline SocialLinks">
                        <li class="list-inline-item">
                            <a href="">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--== Contact Page Area End ==-->


    @endsection