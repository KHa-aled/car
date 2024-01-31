
<!--Header-part-->
<div id="header">
  <h1><a href="">لوحه التحكم</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    </li>
    <li class=""><a title="" href=""><i class="icon icon-user"></i> <span class="text">مرحبا {{Auth()->user()->name}}</span></a></li>
    <!-- <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
      	
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i></a></li>
        
      </ul>
    </li> -->
    <li class=""><a title="" href="{{url('admin/settings')}}"><i class="icon icon-cog"></i> <span class="text">الاعدادات</span></a></li>
    <li class=""><a title="" href="{{url('logout')}}"><i class="icon icon-share-alt"></i> <span class="text">الخروج</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<!-- <div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
<!--close-top-serch-->