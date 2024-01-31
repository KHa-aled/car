

<!--== Footer Area Start ==-->
    <section id="footer-area">
        <!-- Footer Bottom Start -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <!--== Main Menu Start ==-->
                    <div class="col-md-6">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li class="active">
                                     <a href="/car/public/">

                                        {{trans('main.Home')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="" data-toggle="modal" data-target="#Searchnow">
                                       {{trans('main.Search')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{asset('/reservasion-car')}}">
                                        {{trans('main.Reservasion')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('/contact')}}">
                                       {{trans('main.contact us')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('/about-us')}}">
                                        {{trans('main.About')}}
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                    <div class="col-md-6">
                        <p class="alignleft">
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                            <a href="index.html" class="logo">
                                <img src="assets/img/logo.png" alt="logo">
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
    </section>
    <!--== Footer Area End ==-->
     <!-- Modal -->
    <div class="modal fade" id="CONFERMATION" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body text-center pt-4 pb-4">
                    <img src="assets/img/icons/right.png" alt="" class="mt-3 mb-3">
                    <h5 class="mt-3 mb-3">
                        تمت عملية الحجز بنجاح، شكرا لكم
                    </h5>
                    
                    <h5 class="mt-3 mb-3">
                        رقم الحجز الخاص بك  &nbsp;<span class="color"></span>
                    </h5>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
