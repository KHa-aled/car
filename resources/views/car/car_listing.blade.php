@extends('layouts.frontlayout.front_design')
@section('content') 

<section class="Company">
        <div class="container">
            <div class="boxing mb-4">
                <div class="row">
                    
                    <div class="col-md-10 ">
                        <h5 style="text-align: center;">
                            @if(count($carAll))
                               نتائج ال
                               بحث
                               {{$carAll}}
                            @else
                            لايوجد نتائج بحث   
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
            <div class="Cars">
                <div class="row">
                    @foreach($carAll as $car)
                        <div class="col-md-3 col-sm-2">
                            <div class="card mb-4">
                                <img src="{{ asset('/images/backend_images/logo/small/'.$car->image) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">{{$car->car_name}}</h6>
                                    <span class="price">  {{$car->price}} ريال</span>
                                    <p>
                                        @if($car->car_type==0) صغيره @elseif ($car->car_type==1) متوسطه   @else كبييره@endif 
                                    </p>
                                    <a href="index/{{$car->id}}" class="btn d-block">احجز الآن</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
             <span style="display: -webkit-inline-box;">
            <?php echo $carAll->links(); ?>                                 
            </span>

        </div>
    </section>

@endsection