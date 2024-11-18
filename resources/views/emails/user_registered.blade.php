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
        <h2>Welcome, {{ $user->name }}!</h2>
        <p>Your account has been created successfully. Here are your login details:</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Default Password:</strong> {{ $defaultPassword }}</p>
        <p>We recommend logging in and updating your password as soon as possible.</p>
        <a href="{{route('Auth.login')}}" class="btn">Login Now</a>
    </div>
</body>
</html>
