<!doctype html>
<html lang="en">
  <head>
  	<title>Login Mikrotik</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="{{asset('LoginMikro')}}/https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('LoginMikro')}}/https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('LoginMikro')}}/css/style.css">

	</head>
    <style>
          .img-small {
        width: 300px; /* Sesuaikan dengan ukuran yang diinginkan */
        height: auto; /* Biarkan tinggi otomatis menyesuaikan agar tidak terdistorsi */
     }
    </style>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-4">
                    <img src="{{asset('LoginMikro')}}/images/mikrotik.png" alt="Judul Foto" class="img-small">				</div>
                </div>
			<div class="row justify-content-center">
				<div class="col-md-3 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url({{asset('LoginMikro')}}/images/bg2.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Login Here</h3>
			      		</div>
			      	</div>
					<form action="{{ route('login.post') }}" class="signin-form" method="POST">
                        @csrf
                        <div class="form-group mb-3">
			      			<label class="label" for="ip">IP Address</label>
			      			<input type="text" class="form-control @error('ip') is-invalid @enderror" name="ip" placeholder="IP Address" required>
			      		</div>
			      		<div class="form-group mb-3">
			      			<label class="label" for="user">Username</label>
			      			<input type="text" class="form-control @error('user') is-invalid @enderror" name="user" placeholder="Username" required>
			      		</div>
                        <div class="form-group mb-3">
                            <label class="label" for="pass">Password</label>
                        <input type="pass" class="form-control" name="pass" placeholder="Password" >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                        </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

  <script src="{{asset('LoginMikro')}}/js/jquery.min.js"></script>
  <script src="{{asset('LoginMikro')}}/js/popper.js"></script>
  <script src="{{asset('LoginMikro')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('LoginMikro')}}/js/main.js"></script>

	</body>
</html>

