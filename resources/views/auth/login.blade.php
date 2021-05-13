<!DOCTYPE html>
<html lang="en">
<head>
	<title>Gemma</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('storage/images/favicon.png')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/utilidades.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url({{asset('storage/inicio.jpeg')}});">
			<div class="wrap-login100">
				<form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
					<span class="login100-form-logo">
						<img src="{{asset('storage/icon.jpeg')}}" alt="" class="imagenlogo">
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Iniciar Sesion
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Email Usuario">
						<input class="input100" type="email" name="email" placeholder="Escriba su email">
						<span class="focus-input100 "><i id="logoemail" class="zmdi zmdi-email"></i></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Contraseña Usuario">
						<input class="input100" type="password" name="password" placeholder="Escriba su contraseña">
						<span class="focus-input100"><i id="passlogo" class="fas fa-lock"></i></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" name="remember" id="remember_me" type="checkbox" name="recordar">
						<label class="label-checkbox100" for="remember_me">
							Recuerdame
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Iniciar
						</button>
					</div>
                    @if (Route::has('password.request'))
					<div class="text-center p-t-90">
						<a class="txt1" href="{{ route('password.request') }}">
							¿Olvidó La Contraseña?
						</a>
					</div>
                    @endif
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
