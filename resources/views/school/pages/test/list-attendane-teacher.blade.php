<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo/logo-M.png') }}" />
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('admin_assets/dist/css/style.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <title>MiSchool | Absensi</title>
    <style>
        .nav-pills .nav-link {
            background-color: #ffffff;
            border: 1px solid #d7d7d7;
            border-radius: 10px;
            color: #000000;
            /* Warna teks saat tidak aktif */
        }

        .nav-pills .nav-link.active {
            background-color: #87D4F7;
            color: #ffffff;
            /* Warna teks saat aktif */
            border: none;
            /* Menghilangkan border saat aktif */
        }

    </style>
</head>
<body>

    <div class="p-5">
        <div class="row p-2">
            <div class="col-lg-6 p-2">
                <div class="card" style="background-color: #f4f4f4">
                    <div class="p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <ul class="nav nav-pills gap-3">
                                <li class="nav-item">
                                    <a class="nav-link active px-4" id="active-tab" data-bs-toggle="pill" data-bs-target="#active" aria-current="page" href="#">Masuk</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-4" id="link1-tab" data-bs-toggle="pill" data-bs-target="#link1" href="#">Pulang</a>
                                </li>
                            </ul>

                            <h3 class="fw-semibold"><span style="color: #37B8F1;">1500</span> Siswa</h3>
                        </div>

                        <div class="tab-content mt-3">
                            <div class="tab-pane fade show active" id="active" role="tabpanel" aria-labelledby="active-tab">
                                <table class="table border customize-table align-middle">
                                    <thead>
                                        <tr style="background-color: #37B8F1;">
                                            <th style="background-color: #87D4F7;" class="text-white">Nama</th>
                                            <th style="background-color: #87D4F7;" class="text-white">Sekolah</th>
                                            <th style="background-color: #87D4F7;" class="text-white">Jam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($present as $data)
                                            <tr>
                                                <td>{{ $data->employee->user->name }}</td>
                                                <td>{{ $data->employee->school->user->name }}</td>
                                                <td>{{ $data->checkin }}</td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="link1" role="tabpanel" aria-labelledby="link1-tab">
                                <table class="table border customize-table align-middle">
                                    <thead>
                                        <tr style="background-color: #87D4F7;">
                                            <th style="background-color: #87D4F7;" class="text-white">Nama</th>
                                            <th style="background-color: #87D4F7;" class="text-white">Sekolah</th>
                                            <th style="background-color: #87D4F7;" class="text-white">Jam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($out as $item)
                                        <tr>
                                            <td>{{ $item->employee->user->name }}</td>
                                            <td>{{ $item->employee->school->user->name }}</td>
                                            <td>{{ $item->checkout }}</td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-lg-6 p-5">
                <h1 class="fw-semibold"><span style="color: #37B8F1;">Abs</span>ensi</h1>
                <div class="mt-3">
                    <h4>silahkan tap kartu <span style="color: #37B8F1;">RFID anda</span> untuk melakukan absensi</h4>
                </div>

                <div class="illustration-container d-flex justify-content-center my-3">
                    <img src="{{ asset('admin_assets/dist/images/ilustrations/scan.png') }}" style="width:200px"
                        alt="Illustration" />
                </div>
                <div>
                    <form action="{{ route('add-teacher-list-attendance.index') }}" method="POST" enctype="multipart/form-data">
                        @method('post')
                        @csrf
                        <h6 class="mb-3">RFID :</h6>
                        <input type="text" name="rfid" id="rfid-input" class="form-control pt-3" style="background-color: #F5F5F5; border: none; height: 50px; font-size: 18;">
                    </form>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <h6 style="color: #37B8F1;" class="mt-2">Copyright by Hummatech</h6>

                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 12 12"><path fill="currentColor" fill-rule="evenodd" d="M12 6A6 6 0 1 1 0 6a6 6 0 0 1 12 0M6.75 3.75a.75.75 0 1 1-1.5 0a.75.75 0 0 1 1.5 0M6 5.25a.75.75 0 0 0-.75.75v2.25a.75.75 0 1 0 1.5 0V6A.75.75 0 0 0 6 5.25"/></svg>
                        <button class="btn text-end d-flex ms-1" style="border-radius: 20px;border: 1px solid #e9e9e9">
                            Sync Siswa
                            <div class="p-1 ms-1" style="border-radius: 50%; background-color: #13DEB9;width: 23px;height: 23px;display: flex; justify-content: center; align-items: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24">
                                    <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 20v-5h-5M4 4v5h5m10.938 2A8.001 8.001 0 0 0 5.07 8m-1.008 5a8.001 8.001 0 0 0 14.868 3" /></svg>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('admin_assets/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--  core files -->
    <script src="{{ asset('admin_assets/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/js/custom.js') }}"></script>
    <!--  current page js files -->
    <script src="{{ asset('admin_assets/dist/js/dashboard.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#rfid-input').focus();
        });
    </script>
</body>
</html>
