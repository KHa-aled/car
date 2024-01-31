<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>


@if($star == 1)
<span class="fa fa-star"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
@elseif($star == 2)
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
@elseif($star == 3)
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
@elseif($star == 4)
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star-o"></span>
@else($star == 5)
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
@endif