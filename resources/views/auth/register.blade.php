<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

     <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }

        .auth-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px; 
        }

        .auth-card {
            width: 90%;          
            max-width: 400px;    
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,.1);
            box-sizing: border-box; 
        }

        .auth-card h5 {
            font-size: 1.2rem;   
            margin-bottom: 15px;
        }

        .auth-card input.form-control {
            padding: 10px;
            font-size: 1rem;     
        }

        .input-group-text {
            background: #e9ecef;
        }
    </style>
</head>
<body>

<div class="auth-container">
    <form action="{{ route('register.store') }}" method="POST" class="auth-card">
        @csrf

        <h5 class="text-center mb-3">Create Account</h5>

        <!-- Full Name -->
        <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-user"></i>
                </span>
                <input type="text" name="name" class="form-control" 
                       placeholder="Full Name" 
                       value="{{ old('name') }}">
            </div>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-envelope"></i>
                </span>
                <input type="email" name="email" class="form-control" 
                       placeholder="Email Address" 
                       value="{{ old('email') }}">
            </div>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input type="password" name="password" 
                       class="form-control" 
                       placeholder="Password">
            </div>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

            <!-- Admin Key -->
        <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-key"></i>
                </span>
                <input type="text" name="admin_key" 
                       class="form-control" 
                       placeholder="Admin Key (optional)">
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <i class="fa-solid fa-user-plus me-2"></i> Register
        </button>
    </form>
</div>

</body>
</html>