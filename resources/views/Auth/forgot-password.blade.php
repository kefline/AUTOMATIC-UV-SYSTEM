<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Password Reset - Automated Solar Panel UV Tracking System</title>

    <link rel="stylesheet"
        href="https://solar-admin-template.multipurposethemes.com/bs5/template/vertical/src/css/vendors_css.css">
    <link href="/assets/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/skin_color.css">

    <style>
        .system-title {
            background: linear-gradient(135deg,rgb(53, 83, 255), #f7931e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            text-align: center;
            margin-bottom: 15px;
            font-size: 1.3rem;
            letter-spacing: 1px;
        }
        .system-subtitle {
            color: #666;
            text-align: center;
            font-size: 0.85rem;
            margin-bottom: 25px;
        }
        .solar-icon {
            color: #ff6b35;
            font-size: 2rem;
            margin-bottom: 15px;
            text-align: center;
            display: block;
        }
        .reset-icon {
            color: #17a2b8;
            font-size: 3rem;
            margin-bottom: 20px;
            text-align: center;
            display: block;
        }
        .form-control:focus {
            border-color:rgb(53, 73, 255);
            box-shadow: 0 0 0 0.2rem rgba(255, 107, 53, 0.25);
        }
        .btn-primary {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            border: none;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #e55a2b, #de831a);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 107, 53, 0.3);
        }
        .btn-secondary {
            background: #6c757d;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-1px);
        }
        .security-info {
            background: linear-gradient(135deg, #e3f2fd, #f3e5f5);
            border-left: 4px solid #ff6b35;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .security-info i {
            color: #ff6b35;
            margin-right: 8px;
        }
    </style>

</head>

<body class="hold-transition theme-primary bg-img"
    style="background-image: url(https://solar-admin-template.multipurposethemes.com/bs5/images/auth-bg/bg-16.jpg)">

    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">

            <div class="col-12">
                <div class="row justify-content-center g-0">
                    <div class="col-lg-5 col-md-6 col-12">
                        <div class="bg-white rounded10 shadow-lg">
                            <div class="content-top-agile p-20 pb-0">
                               
                                <h1 class="system-title">AUTOMATED SOLAR PANEL UV TRACKING SYSTEM</h1>
                                <p class="system-subtitle">Advanced Solar Energy Management Platform</p>
                                
                                <div class="text-center">
                                    <i class="fas fa-key reset-icon"></i>
                                </div>
                                <h2 class="text-primary fw-600 text-center">Reset Your Password</h2>
                                <p class="mb-0 text-fade text-center">Enter your email address and we'll send you a secure link to reset your password.</p>
                            </div>
                            <div class="p-40">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @include('_message')
                                
                                <form action="{{ route('password.email') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label for="email" class="form-label fw-500">
                                            <i class="fas fa-envelope me-2 text-primary"></i>Email Address
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-transparent">
                                                <i class="fas fa-at"></i>
                                            </span>
                                            <input type="email" id="email" name="email" 
                                                   class="form-control ps-15 bg-transparent"
                                                   placeholder="Enter your registered email address" 
                                                   required
                                                   value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    
                                    <div class="security-info">
                                        <p class="mb-2">
                                            <i class="fas fa-shield-alt"></i>
                                            <strong>Security Notice:</strong>
                                        </p>
                                        <p class="mb-0 small text-muted">
                                            For your security, the password reset link will expire in 60 minutes. 
                                            If you don't receive the email, check your spam folder or contact system administrator.
                                        </p>
                                    </div>
                                    
                                    <div class="d-flex gap-3 mt-4">
                                        <a href="{{ route('login.authenticate') }}" class="btn btn-secondary flex-fill">
                                            <i class="fas fa-arrow-left me-2"></i>Back to Login
                                        </a>
                                        <button type="submit" class="btn btn-primary flex-fill">
                                            <i class="fas fa-paper-plane me-2"></i>Send Reset Link
                                        </button>
                                    </div>
                                </form>

                                <div class="text-center mt-4">
                                    <div class="border-top pt-3">
                                        <p class="text-muted small mb-0">
                                            <i class="fas fa-question-circle me-2"></i>
                                            Need help? Contact your system administrator
                                        </p>
                                    </div>
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

    <script>
        // Add some interactive feedback
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            form.addEventListener('submit', function() {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
                
                // Re-enable after 5 seconds to prevent permanent disable if there's an error
                setTimeout(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }, 5000);
            });
        });
    </script>

</body>

</html>