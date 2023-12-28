<!DOCTYPE html>
<html>
<head>
    <title>Sistem Penjagaan KGB & KB</title>
    <style>
        body {
            background: radial-gradient(circle, #2060a3, #2f8ab1);
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            padding: 20px;
            border: 1px solid #0a254b;
            border-radius: 20px;
            background-color: #0a254b;
        }

        .card {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #0a254b;
            border-radius: 20px;
            background-color: #0a254b;
        }

        .card-header {
            font-size: 18px;
            color: #fff;
            font-weight: bold;
            text-align: center;
        }

        .form-control {
            width: 100%;
            height: 25px;
            padding: 0;
            font-size: 16px;
            border: 4px solid #ddd;
            border-radius: 5px;
        }

        .mb-2 {
            margin-bottom: 20px;
            color: #ddd;
            text-align: left;
        }

        .btn-primary {
            padding: 10px 20px;
            margin: 0 10px;
            cursor: pointer;
            border: none;
            border-radius: 50px;
            font-weight: 900;
            font-size: 20px;
            color: #261d66;
            transition: background-color 0.3s ease;
            background: linear-gradient(45deg, #66ded6, #54d1e9, #40c6f6, #3dc3fd);
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="auth">
            @auth
                <h1>Welcome Back, {{ auth()->user()->name }}</h1>
                <a href="{{ url('/home') }}" class="btn btn-primary">Home</a>
            @else
                <div class="card">
                    <div class="card-header">L O G I N</div>
                    <h4 style="text-align: center; color:#fff; font-style: italic;">Sistem Kenaikan Gaji Berkala <br>
                        DPPKB PPPA Kabupaten Madiun
                    </h4>
                    <div class="card-body" style="text-align: center;">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-2">
                                <label for="email">Email Address:</label>
                                <input style="font-style: italic" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder =" masukan email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="password">Password:</label>
                                <input style="font-style: italic" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" placeholder =" masukan password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-0">
                                <button type="submit" class="btn-primary">
                                        LOGIN
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</body>
</html>
