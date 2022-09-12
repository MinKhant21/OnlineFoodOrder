<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
</head>
<body>

  
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      
      <!-- Icon -->
      <div class="fadeIn first" style="padding:3%;">
        <h3>Login Form</h3>
        <div class="header ml-2 p-3">
          <div class=" p-2" style="margin-left:1%">
  
              @if (session()->has('success'))
              <div class="alert alert-success">
                  {{session('success')}}
              </div>
              @endif
              @if (session()->has('error'))
                  <div class="alert alert-danger">
                      {{session('error')}}
                  </div>
              @endif
                
          </div>
        </div>
        {{-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> --}}
      </div>
      
  
      <!-- Login Form -->
      <form action="{{ url('/login') }}" method="POST">
        @csrf
        <input type="email" id="email" class="fadeIn second" name="email" placeholder="Enter Your Email">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>
  
      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>
  
    </div>
  </div>
</body>
</html>