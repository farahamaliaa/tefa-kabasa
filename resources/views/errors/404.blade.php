<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Tidak Ditemukan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #0d1b42;
            color: #fff;
            text-align: center;
            padding: 0;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle at 20% 50%, #0d1b42, #090e2d 100%);
            overflow: hidden;
        }

        .container {
            text-align: center;
            position: relative;
        }

        h1 {
            font-size: 10rem;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        h1 img {
            width: 150px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        .button {
            padding: 1rem 2rem;
            background-color: #0066ff;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 1.2rem;
            cursor: pointer;
            text-decoration: none;
        }

        .button:hover {
            background-color: #0055cc;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1), transparent);
            z-index: 0;
        }

        .planet {
            position: absolute;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            animation: float 10s infinite ease-in-out;
        }

        .planet-1 {
            width: 200px;
            height: 200px;
            top: 10%;
            left: 10%;
        }

        .planet-2 {
            width: 500px;
            height: 500px;
            bottom: 0%;
            right: 0%;
        }

        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(20px); }
            100% { transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="planet planet-1"></div>
        <div class="planet planet-2"></div>
    </div>

    <div class="container">
        <h1>404<img src="{{ asset('assets/images/lostman.png') }}" alt="Astronaut"></h1>
        <p>Halaman Tidak Ditemukan</p>
        <p>Kami tidak dapat menemukan halaman yang Anda cari</p>
        <a href="{{ url('/') }}" class="button">Kembali ke Beranda</a>
    </div>
</body>
</html>
