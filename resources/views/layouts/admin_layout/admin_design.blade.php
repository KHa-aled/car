<!DOCTYPE html>
<html lang="en">
<head>
<title>لوحه التحكم </title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="Domain" content="http://localhost/car/public" />
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/uniform.css')}}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/select2.css')}}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/matrix-style.css')}}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/matrix-media.css')}}" />
<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-wysihtml5.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
<link href="{{ asset('fonts/backend_fonts/css/font-awesome.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/backend_css/jquery.gritter.css')}}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


{!! Charts::assets() !!}

<style>
  .select2-drop{
    z-index: 92229999 !important;
  }
</style>

</head>
<body>
@include('layouts.admin_layout.admin_header')
@include('layouts.admin_layout.admin_sidebar')


@yield('content')

@include('layouts.admin_layout.admin_footer')


<script src="{{asset('js/backend_js/jquery.min.js')}}"></script> 
<!--<script src="{{asset('js/backend_js/jquery.ui.custom.js')}}"></script> -->
<script src="{{asset('js/backend_js/bootstrap.min.js')}}"></script> 
<script src="{{asset('js/backend_js/jquery.uniform.js')}}"></script> 
<script src="{{asset('js/backend_js/select2.min.js')}}"></script>
<script src="{{asset('js/backend_js/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('js/backend_js/jquery.validate.js')}}"></script> 
<script src="{{asset('js/backend_js/matrix.js')}}"></script> 
<script src="{{asset('js/backend_js/matrix.form_validation.js')}}"></script>
<script src="{{asset('js/backend_js/matrix.tables.js')}}"></script>
<script src="{{asset('js/backend_js/matrix.popover.js')}}"></script>
<script src="{{asset('js/backend_js/wysihtml5-0.3.0.js')}}"></script> 
<script src="{{asset('js/backend_js/bootstrap-wysihtml5.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  $( function() {
    $( "#expiry_date" ).datepicker({
     minDate: 0,
     dateFormat:'yy-mm-dd'
    });
  });
  </script>
  <script>
  $( function() {
    $( "#expiry_dat" ).datepicker({
     minDate: 0,
     dateFormat:'yy-mm-dd'
    });
  });
  </script>
  <script>
	$('.textarea_editor').wysihtml5();
</script>
<script>
	$('.textarea_editor1').wysihtml5();
</script>
<script type="text/javascript">


    $(document).ready(function() {

      $(".btn-success").click(function(){
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){
          $(this).parents(".control-group").remove();
      });

    });

</script>
</body>
</html>
