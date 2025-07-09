<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absensi | Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .bg-image {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            height: 268px;
            width: 100%;
        }

        .card.custom-card {
            height: 268px;
            width: 100%;
        }

        .card-body.custom-card-body {
            height: 100%;
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            text-align: left;
            padding: 1rem;
        }

        .text-container {
            margin-top: 5%;
            margin-left: 10%;
        }

        .card a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>

    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch p-5">
            <div class="card w-100 full-height rounded" style="background-color: #F5F5F5; overflow: hidden;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h4 class="text-center">SISTEM PRESENSI HUMMATECH</h4>
                    <div class="row mx-5 mt-3">
                        <div class="col-lg-6 col-md-6 mb-4">
                            <a href="javascript:void(0)">
                                <div class="card bg-transparent border-0 custom-card bg-image"
                                    style="background-image: url('{{ asset('admin_assets/dist/images/ilustrations/presensi.png') }}');">
                                    <div class="card-body custom-card-body text-white">
                                        <div class="text-container">
                                            <h2>Presensi</h2>
                                            <p>Absensi</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <a href="/user-list">
                                <div class="card bg-transparent border-0 custom-card bg-image"
                                    style="background-image: url('{{ asset('admin_assets/dist/images/ilustrations/siswa.png') }}');">
                                    <div class="card-body custom-card-body text-white">
                                        <div class="text-container">
                                            <h2>Daftar Siswa</h2>
                                            <p>Absensi</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <a href="javascript:void(0)">
                                <div class="card bg-transparent border-0 custom-card bg-image"
                                    style="background-image: url('{{ asset('admin_assets/dist/images/ilustrations/today.png') }}');">
                                    <div class="card-body custom-card-body text-white">
                                        <div class="text-container">
                                            <h2>Presensi Hari ini</h2>
                                            <p> Daftar Absensi</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-4">
                            <a href="javascript:void(0)">
                                <div class="card bg-transparent border-0 custom-card bg-image"
                                    style="background-image: url('{{ asset('admin_assets/dist/images/ilustrations/sinkronisasi.png') }}');">
                                    <div class="card-body custom-card-body text-white">
                                        <div class="text-container">
                                            <h2>Sinkronisasi</h2>
                                            <p>Absensi</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
