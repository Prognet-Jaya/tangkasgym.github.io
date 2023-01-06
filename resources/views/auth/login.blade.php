<!doctype html>
<html lang="en">
  <head>
  	<title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="login-form-14/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login Yuks</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(latihan/1671690410.jpeg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
                      <x-jet-validation-errors class="mb-4" />

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
			      		<div class="form-group mb-3">
			      			<label  class="label" for="email" value="{{ __('Email') }}">Username</label>
			      			<input class="form-control"  id="email" type="email" name="email" :value="old('email')" required autofocus>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password" value="{{ __('Password') }}">Password</label>
		              <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password">
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-dark rounded submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0" for="remember_me">
									  <input type="checkbox" checked id="remember_me" name="remember">
									  <span class="checkmark">{{ __('Remember me') }}</span>
										</label>
									</div>
									<div class="w-50 text-md-right">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
									</div>
                         
		            </div>
		          </form>
		          <p class="text-center">Not a member?<a href="{{ route('register') }}" class="btn custom-btn bg-color mt-3" data-aos="fade-up" data-aos-delay="300" data-toggle="modal" >Registrasi</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="login-form-14/js/jquery.min.js"></script>
  <script src="login-form-14/js/popper.js"></script>
  <script src="login-form-14/js/bootstrap.min.js"></script>
  <script src="login-form-14/js/main.js"></script>

	</body>
</html>


<!-- <x-guest-layout> -->
    <!-- <x-jet-authentication-card> -->
        <!-- <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot> -->

        <!-- <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif -->

        <!-- <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class = "text-gray-900 dark:text-white">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full 	color: rgb(254 226 226)" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form> -->
    <!-- </x-jet-authentication-card> -->
<!-- </x-guest-layout> -->


