@extends('layout.master')
@extends('layout.nav')

@section('content')
      <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            @foreach ($category as $c)
            <a href="category-foods.html">
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




@endsection
  