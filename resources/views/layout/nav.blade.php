   <section class="navbar">
        <div id="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="{{ asset('imagess/logo.png') }}" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="text-right" id="menu">
                <ul>
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{url('/category')}}">Categories</a>
                    </li>
                    <li>
                        <a href="{{ url('/food') }}">Foods</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                     <li >
                        <a href="{{ url('/cart') }}">Cart</a>
                    
                    </li>
                    <li >
                        
                       @auth
                       <a href="{{ url('logout') }}">Logout</a>  
                       @endauth
                    </li>
                    
                </ul>
            </div>

            
        </div>
    </section>