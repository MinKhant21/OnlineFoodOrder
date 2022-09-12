@extends('layout.master')

@extends('layout.nav')

@section('content')
    

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on Your Search <a href="#" class="text-white">{{ $title }}</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            @foreach ($food as $f)
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="{{ '/imagess/food/'.$f->image }}" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>{{ $f->title }}</h4>
                    <p class="food-price">{{ $f->price }}</p>
                    <p class="food-detail">
                        {{ $f->description }}
                    </p>
                    <br>

                    <a href="{{ url('order/'.$f->id) }}" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            @endforeach

           
            
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
@endsection