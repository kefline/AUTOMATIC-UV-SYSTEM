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
                                @include('_message')
                                <form action="{{ route('password.email') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email Address:</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="Enter your email" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sending Password Reset Link</button>
                                </form>


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
