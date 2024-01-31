
<?php $url= url()->current();?>
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> الرئيسية</a>
  <ul>

    <li <?php if (preg_match("/dashboard/i", $url)){ ?> class="active"<?php } ?>><a href="{{url('admin/dashboard')}}"><i class="icon icon-home"></i> <span>الرئيسية</span></a> </li>

    @role('مالك الموقع')

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>اضافة شركة</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/banner/i", $url)){ ?> style = "display: block;"<?php } ?>>
        <li <?php if (preg_match("/add-banner/i", $url)){ ?> class="active"<?php } ?>><a href="{{url('admin-creat')}}">أضافة مستخدم </a></li> 
        <li <?php if (preg_match("/view-banners/i", $url)){ ?> class="active"<?php } ?>><a href="{{url('admin-view')}}">عرض المستخدمين</a></li>
      </ul>
    </li>
    
    @endrole

@role('اصحاب الشركات المسجلة')
    
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>سيارات </span> <span class="label label-important">2</span></a>

      <ul <?php if (preg_match("/product/i", $url)){ ?> style = "display: block;"<?php } ?>>
       
        <li<?php if (preg_match("/add-product/i", $url)){ ?> class="active"<?php } ?>><a href="{{url('admin/add-car')}}"> اضافه  سياره </a></li>
         <li <?php if (preg_match("/view-products/i", $url)){ ?> class="active"<?php } ?>><a href="{{url('admin/addation')}}"> اسعار البنود  الاضافيه </a></li>
      
        <li <?php if (preg_match("/view-products/i", $url)){ ?> class="active"<?php } ?>><a href="{{url('admin/view-cars')}}"> عرض السيارات </a></li>

        


      </ul>
    </li>
@endrole

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>كوبون</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/product/i", $url)){ ?> style = "display: block;"<?php } ?>>

        @permission('add')
        <li<?php if (preg_match("/add-product/i", $url)){ ?> class="active"<?php } ?>><a href="{{url('/admin/add-coupon')}}">اضافه كوبون</a></li>
        @endpermission
        <li <?php if (preg_match("/view-products/i", $url)){ ?> class="active"<?php } ?>><a href="{{url('admin/view-coupons')}}">عرض الكوبون</a></li>
      </ul>
    </li>

    @role('مالك الموقع')

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>الصلاحيات </span> <span class="label label-important">2</span></a>
      <ul<?php if (preg_match("/coupon/i", $url)){ ?> style = "display: block;"<?php } ?>>
        <li <?php if (preg_match("/add-coupon/i", $url)){ ?> class="active"<?php } ?>><a href="{{asset('/admin/index')}}">عرض الصلاحيات</a></li>
       <li <?php if (preg_match("/view-coupons/i", $url)){ ?> class="active"<?php } ?>><a href="{{asset('/view-user')}}">عرض المستخدمين</a></li> 
      </ul>
    </li>
    @endrole



    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>المهام </span> <span class="label label-important">2</span></a>
      <ul<?php if (preg_match("/coupon/i", $url)){ ?> style = "display: block;"<?php } ?>>

        @role('اصحاب الشركات المسجلة')
        <li <?php if (preg_match("/add-coupon/i", $url)){ ?> class="active"<?php } ?>><a href="{{asset('admin/post')}}">اضافه مهمه </a></li>
        @endrole

       <li <?php if (preg_match("/view-coupons/i", $url)){ ?> class="active"<?php } ?>><a href="{{asset('admin/posts')}}">عرض المهام  </a></li> 
       
      </ul>
    </li>
    



 @permission('add')
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>الحجوزات </span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/banner/i", $url)){ ?> style = "display: block;"<?php } ?>>
        <!-- <li <?php if (preg_match("/add-banner/i", $url)){ ?> class="active"<?php } ?>><a href="{{url('admin/add-banner')}}">Add Banner</a></li> -->
        <li <?php if (preg_match("/view-banners/i", $url)){ ?> class="active"<?php } ?>><a href="{{url('/admin/view-orders')}}"> حجوازتي </a></li>
      </ul>
    </li>  
@endpermission

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>الاحصائيات </span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/banner/i", $url)){ ?> style = "display: block;"<?php } ?>>
        <!-- <li <?php if (preg_match("/add-banner/i", $url)){ ?> class="active"<?php } ?>><a href="{{url('admin/add-banner')}}">Add Banner</a></li> -->
        <li <?php if (preg_match("/view-banners/i", $url)){ ?> class="active"<?php } ?>><a href="{{url('my-chart')}}">الاحصائيات </a></li>
      </ul>
    </li>  
<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>عن الموقع </span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/banner/i", $url)){ ?> style = "display: block;"<?php } ?>>
        <li <?php if (preg_match("/view-banners/i", $url)){ ?> class="active"<?php } ?>><a href="{{url('add-aboutUs')}}"> اضافة </a></li>
      </ul>
    </li>  

  </ul>
</div>
<!--sidebar-menu-->