<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f6f9;
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
            box-shadow: 0 10px 30px rgba(0, 0, 0, .1);
            box-sizing: border-box;
        }

        .auth-card h4 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .auth-card input.form-control {
            padding: 10px;
            font-size: 1rem;
        }

        .glass-card {
            margin-bottom: 1.5rem;
            background: rgba(255, 255, 255, 0.88);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
            backdrop-filter: blur(12px);
        }

        .card-body {
            padding: 1.3rem 1.5rem;
        }

        .input-group-text {
            background: #e9ecef;
        }
    </style>
</head>

<body>

    <div class="auth-container">
        <form action="{{ route('login.store') }}" method="POST" class="auth-card">
            @csrf

            <div class="glass-card shadow-lg">
                <div class="card-body text-center" id="weather">
                    @if(isset($weather))
                        <h5>{{ $weather['city'] }}</h5>
                        <div style="font-size: 1.8rem; font-weight: bold;">
                            {{ $weather['temp'] }}°C
                        </div>
                        <div style="text-transform: capitalize;">
                            {{ $weather['description'] }}
                        </div>
                    @else
                        <div>Loading weather...</div>
                    @endif
                </div>
            </div>

            <h4 class="text-center mb-3">Login</h4>

        @if ($errors->any())
            <div class="alert alert-danger py-2 px-3 mb-3" style="font-size: 0.85rem;">
                {{ $errors->first() }}
            </div>
        @endif



        <!-- Email -->
        <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-envelope"></i>
                </span>
                <input type="email" name="email" class="form-control" placeholder="Email Address"
                    value="{{ old('email') }}" required>
            </div>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100 mb-3">
            <i class="fa-solid fa-right-to-bracket me-2"></i> Login
        </button>

        <p class="text-center mb-0" style="font-size: 0.9rem; color: #6c757d;">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-decoration-none">
                Register
            </a>
        </p>
    </form>
    </div>

</body>

</html>

<script>
    async function loadWeather() {
        try {
            const res = await fetch('/weather');
            const data = await res.json();


            document.getElementById('weather').innerHTML = `
            <h5>${data.name}</h5>
            <div style="font-size:1.8rem;font-weight:bold;">
                ${data.main.temp}°C
            </div>
            <div style="text-transform: capitalize;">
                ${data.weather[0].description}
            </div>
        `;
        } catch (error) {
            console.error("Weather load failed", error);
        }
    }


    loadWeather();
    setInterval(loadWeather, 60000);
</script>