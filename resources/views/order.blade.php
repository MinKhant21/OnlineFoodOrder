@extends("layout.master")
{{-- @extends('layout.search_bar') --}}
@extends('layout.nav')
 

@section('content')
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this to confirm your order.</h2>

            <form action="{{ url('addtocart/'.$food->id) }}" method="POST" class="order">
                @csrf
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="{{ '/imagess/food/'.$food->image }}" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3>{{ $food->title }}</h3>
                        <p class="food-price">{{ $food->price }} <span>MMK</span></p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                    <div style="margin-top: 7%;">
                        <input type="submit" value="Add To Cart" class="btn btn-lg btn-primary" style="float: right; margin-right:5%;">
                    </div>

                </fieldset>
                
                {{-- <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset> --}}

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


@endsection
   