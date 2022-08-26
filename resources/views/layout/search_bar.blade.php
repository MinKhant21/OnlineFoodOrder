   <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
        <div>
         <a herf="#" class="btn btn-lg btn-warning">SIGN UP</a>
         <a herf="#" class="btn btn-lg btn-primary">LOGIN</a>
        </div>
           @guest
               
           @endguest 

           @auth
                <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
           @endauth

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
