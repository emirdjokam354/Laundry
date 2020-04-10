<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600|Roboto:700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
</head>
<body>
	<img class="wave" src="{{asset('img/wave.png')}}">
	<div class="container">
		<div class="img">
			<img src="{{asset('img/undraw.svg')}}">
		</div>
		<div class="login-content">
			
			<form method="POST" action="{{ route('login') }}">
				{{-- @if(session('error'))
				            <div class="alert alert-error">
				              {{ session('error') }}
				            </div>
				            @endif

				            @if (count($errors) > 0)
				            <div class="alert alert-danger">
				              <strong>Perhatikan</strong>
				              <br/>
				              <ul>
				                  @foreach ($errors->all() as $error)
				                  <li>{{ $error }}</li>
				                  @endforeach
				              </ul>
				            </div>
				@endif --}}
				@csrf
				<img src="{{asset('img/people.svg')}}">
				<h4 class="title">Snapwash Admin</h4>
				<br>
				
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
							  <input type="email" id="email" class="input @error('email') is-invalid @enderror" 
							  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
							  
					  </div>
					  
				   </div>
				   @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
						   <input type="password" class="input @error('password') is-invalid @enderror" 
						   name="password" required autocomplete="current-password" id="pass">
						   @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				   </div>
				</div>
				<div class="cekbox">
				<input type="checkbox" value="" id="cek"><label for="cek" class="show">Show Password</label>
				</div>
				@if(Route::has('password.request'))
				<a href="{{ route('password.request')}}">Forgot Password?</a>
				@endif
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
	</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>