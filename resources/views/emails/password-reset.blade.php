<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hello, {{ $user->name }}!</h2>
        <p>Your password has been reset successfully. Here are your new login details:</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>New Password:</strong> {{ $newPassword }}</p>
        <p>We recommend logging in and changing your password to something more secure.</p>
        <a href="{{route('Auth.login')}}" class="btn">Login Now</a>

    </div>
</body>
</html>
