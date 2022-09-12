@extends("layout.master")
@extends('layout.search_bar')
@extends('layout.nav')
 

@section('content')
    
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            @foreach ($category as $c)
            <a href="{{ url('/category-food/'.$c->id) }}">
                <div class="box-3 float-container">
                    <img src="{{ '/imagess/'.$c->image }}" alt="Pizza" class="img-responsive img-curve">
    
                    <h3 class="float-text text-white">{{ $c->name }}</h3>
                </div>
                </a>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

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
                    <p class="food-price">{{ $f->price }} <span>MMK</span> </p>
                    <p class="food-detail">
                        {{ $f->description }}
                    </p>
                    <br>

                    <a href="{{ url('/order/'.$f->id) }}" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            @endforeach

            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>

@endsection
   
