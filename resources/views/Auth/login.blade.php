<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Solar Admin - Log in </title>

    <link rel="stylesheet"
        href="https://solar-admin-template.multipurposethemes.com/bs5/template/vertical/src/css/vendors_css.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/skin_color.css">

</head>

<body class="hold-transition theme-primary bg-img"
    style="background-image: url(https://solar-admin-template.multipurposethemes.com/bs5/images/auth-bg/bg-16.jpg)">

    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">

            <div class="col-12">
                <div class="row justify-content-center g-0">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="bg-white rounded10 shadow-lg">
                            <div class="content-top-agile p-20 pb-0">
                                <h2 class="text-primary fw-600">Let's Get Started</h2>
                                <p class="mb-0 text-fade">Sign in to continue to Solar Admin.</p>
                            </div>
                            <div class="p-40">
                                @if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
                            
                                <form
                                    action="{{route('Auth.authenticate')}}"
                                    method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-transparent"><i class="fas fa-user"></i></span>
                                            <input type="email" name="email" class="form-control ps-15 bg-transparent"
                                                placeholder="enter your email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text  bg-transparent">
                                                <i class="fas fa-lock"></i></span>
                                            <input type="password" class="form-control ps-15 bg-transparent" name="password"
                                                placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="checkbox">
                                                <input type="checkbox" id="basic_checkbox_1">
                                                <label for="basic_checkbox_1">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="fog-pwd text-end">
                                                <a href="{{route('password.request')}}"
                                                    class="text-primary fw-500 hover-primary"><i
                                                        class="ion ion-locked"></i> Forgot password?</a><br>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary w-p100 mt-10">SIGN IN</button>
                                        </div>
                                    </div>
                                </form>
                                

                                <div class="text-center">
                                    <p class="mt-20 text-fade">- Sign With -</p>
                                    <p class="gap-items-2 mb-0">
                                        <a class="waves-effect waves-circle btn btn-social-icon btn-circle btn-facebook-light" href="#">
                                            <i class="fa-brands fa-facebook"></i>
                                        </a>
                                        <a class="waves-effect waves-circle btn btn-social-icon btn-circle btn-twitter-light" href="#">
                                            <i class="fa-brands fa-google"></i>
                                        </a>
                                        <a class="waves-effect waves-circle btn btn-social-icon btn-circle btn-instagram-light" href="#">
                                            <i class="fa-brands fa-github"></i>
                                        </a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="/assets/js/vendors.min.js"></script>
    <script src="/assets/js/chat-popup.js"></script>
    <script src="/assets/js/feather.min.js"></script>

</body>

</html>
