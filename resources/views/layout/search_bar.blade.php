   <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            @guest
        <div>
            <a href="{{url('register')}}" class="btn btn-lg btn-warning">REGISTER</a>
            <a href="{{ url('login') }}" class="btn btn-lg btn-danger">LOGIN</a>
        </div>
           
               
           @endguest 

           @auth
                <form action="{{ url('food-search') }}" method="POST">
                @csrf
                <input type="search" name="title" placeholder="Search for Food.." required>
                <input type="submit" name="search" value="Search" class="btn btn-primary">
            </form>
           @endauth

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
