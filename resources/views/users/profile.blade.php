@extends('layouts.frontlayout.front_design')
@section('content') 

<section class="section-padding">
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
            <div class="row boxing">

                <div class="col-md-3">
                	<form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('edit-Profile') }}" >
              {{csrf_field()}}
                    <div class="profileimg">
                        <img src="{{url('/images/backend_images/logo/small/'. $userDetails->image) }}" alt="" class="profileImg">
                        <div class="upload-btn-wrapper mt-3">
                            <button class="btnCus">
                                <i class="fa fa-camera"></i>
                                تعديل الصورة
                            </button>
                            <input type="file" name="image" id="image">
                            @if(!empty($userDetails->image))
                  				<input type="hidden" name="current_image" value="{{$userDetails->image}}">
                  			@endif
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-6">
                            <div class="graphs">
                                <p class="mb-4">
                                    احصائيات  المدفوعات
                                </p>
                                <div class="conty">
                                    <h5 class="d-inline">
                                        158 &#36;
                                    </h5>
                                    <img src="assets/img/icons/graph.png" alt="" class="F-left">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="graphs">
                                <p class="mb-4">
                                    احصائيات  الطلبات
                                </p>
                                <div class="conty">
                                    <h5 class="d-inline">
                                        24 &#36;
                                    </h5>
                                    <img src="assets/img/icons/graph.png" alt="" class="F-left">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h5 class="color mt-4 mb-4">
                        المعلومات الشخصية
                    </h5>
                    <table class="profileinfo">
                        <tbody>
                            <tr>
                                <td>
                                    اسم المستخدم:
                                </td>
                                <td>
                                    <input style="border: 0px" type="text" name="name" value="{{$userDetails->name}}">
                                </td>
                                <td >
                                    <a href="" class="color">
                                        <input type="submit" value="تعديل" class="btn btn-primary btn-mini">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    البريد الالكتروني: 
                                </td>
                                <td>
                                    <input style="border: 0px; width: 250px" type="text" name="email" value="{{$userDetails->email}}">
                                </td>
                                <td>
                                    <a href="" class="color">
                                       <input type="submit" value="تعديل" class="btn btn-primary btn-mini">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    كلمة المرور: 
                                </td>
                                <td>
                                    <input style=" width: 250px" type="password" name="password" >
                                </td>
                                <td>
                                    <a href="" class="color">
                                        <input type="submit" value="تعديل" class="btn btn-primary btn-mini">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    رقم الهاتف:
                                </td>
                                <td>
                                    <input style="border: 0px; width: 250px" type="text" name="phone" value="{{$userDetails->phone}}">
                                </td>
                                <td>
                                    <a href="" class="color">
                                        <input type="submit" value="تعديل" class="btn btn-primary btn-mini">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    العنوان:
                                </td>
                                <td>
                                    <input style="border: 0px; width: 250px" type="text" name="address" value="{{$userDetails->address}}">
                                </td>
                                <td>
                                    <a href="" class="color">
                                        <input type="submit" value="تعديل" class="btn btn-primary btn-mini">
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                </div>
            </div>
        </div>
    </section>

@endsection