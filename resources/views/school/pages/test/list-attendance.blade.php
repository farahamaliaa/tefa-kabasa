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
            background-color: #37B8F1;
            color: #ffffff;
            /* Warna teks saat aktif */
            border: none;
            /* Menghilangkan border saat aktif */
        }
    </style>
</head>

<body>

    <div class="p-5">
        <div class="d-flex justify-content-between">
            <div>
                <img src="{{ asset('assets/images/logo/logo-miscool.png') }}" width="200px" alt="">
            </div>

            <div class="d-flex align-items-center">
                <button class="btn text-end d-flex" style="border-radius: 20px;border: 1px solid #e9e9e9" id="sync-btn"
                    onclick="syncAttendance()">
                    Sync Siswa
                    <div class="p-1 ms-1"
                        style="border-radius: 50%; background-color: #13DEB9;width: 23px;height: 23px;display: flex; justify-content: center; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24">
                            <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M20 20v-5h-5M4 4v5h5m10.938 2A8.001 8.001 0 0 0 5.07 8m-1.008 5a8.001 8.001 0 0 0 14.868 3" />
                        </svg>
                    </div>
                </button>
            </div>
        </div>
        <div class="text-end">
            <p style="color: #6c6c6c;">terakhir disinkronkan pada 3 Agustus 2023</p>
        </div>
        <div class="row">
            <div class="col-lg-6 p-2">
                <div>
                    <div class="p-3">
                        <ul class="nav nav-pills gap-3">
                            <li class="nav-item">
                                <a class="nav-link active px-4" id="active-tab" data-bs-toggle="pill"
                                    data-bs-target="#active" aria-current="page" href="#">Masuk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-4" id="link3-tab" data-bs-toggle="pill" data-bs-target="#link3"
                                    href="#">Pulang</a>
                            </li>
                        </ul>

                        <div class="tab-content mt-3">
                            <div class="tab-pane fade show active" id="active" role="tabpanel"
                                aria-labelledby="active-tab">
                                <table class="table border customize-table align-middle" id="checkin-table">
                                    <thead>
                                        <tr style="background-color: #37B8F1;">
                                            <th style="background-color: #37B8F1;" class="text-white">Nama</th>
                                            <th style="background-color: #37B8F1;" class="text-white">Sekolah</th>
                                            <th style="background-color: #37B8F1;" class="text-white">Jam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @forelse ($present as $item)
                                            <tr>
                                                <td>{{ $item->classroomStudent->student->user->name }}</td>
                                                <td>{{ $item->classroomStudent->classroom->schoolYear->school->user->name }}
                                                </td>
                                                <td>{{ $item->checkin }}</td>
                                            </tr>
                                        @empty
                                        @endforelse --}}
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="link3" role="tabpanel" aria-labelledby="link3-tab">
                                <table class="table border customize-table align-middle" id="checkout-table">
                                    <thead>
                                        <tr style="background-color: #37B8F1;">
                                            <th style="background-color: #37B8F1;" class="text-white">Nama</th>
                                            <th style="background-color: #37B8F1;" class="text-white">Sekolah</th>
                                            <th style="background-color: #37B8F1;" class="text-white">Jam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 p-4 mt-5">
                <h1 class="fw-semibold"><span style="color: #37B8F1;">Ma</span>suk</h1>
                <div class="mt-3">
                    <h4>silahkan tap kartu <span style="color: #37B8F1;">RFID anda</span> untuk melakukan absensi</h4>
                </div>

                <div class="illustration-container d-flex justify-content-center my-3">
                    <img src="{{ asset('admin_assets/dist/images/ilustrations/scan.png') }}" style="width:200px"
                        alt="Illustration" />
                </div>
                <div>
                    <h5 class="mb-3">RFID :</h5>
                    <form id="form-check">
                        @method('post')
                        @csrf
                        <input type="text" class="form-control pt-3" name="rfid" id="rfid-input"
                            style="background-color: #F5F5F5; border: none; height: 50px; font-size: 18;">
                    </form>
                </div>
                <div>
                    <h5 style="color: #37B8F1;" class="mt-2">Copyright by Hummatech</h5>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--  current page js files -->
    <script src="{{ asset('admin_assets/dist/js/dashboard.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#rfid-input').focus();

            $('#form-check').submit(function(event) {
                event.preventDefault();
                masterKeyCheck();
            });
        });

        function syncAttendance() {
            $.ajax({
                type: 'GET',
                url: "{{ route('sync.student') }}",
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('auth_token')
                },
                success: function(data) {
                    var tableBody = '';
                    $.each(data.data.present, function(index, item) {
                        tableBody += '<tr>';
                        tableBody += '<td>' + item.name + '</td>';
                        tableBody += '<td>' + item.school + '</td>';
                        tableBody += '<td>' + item.checkin + '</td>';
                        tableBody += '</tr>';
                    });
                    $('#checkin-table tbody').html(tableBody);

                    tableBody = '';
                    $.each(data.data.out, function(index, item) {
                        tableBody += '<tr>';
                        tableBody += '<td>' + item.name + '</td>';
                        tableBody += '<td>' + item.school + '</td>';
                        tableBody += '<td>' + item.checkout + '</td>';
                        tableBody += '</tr>';
                    });
                    $('#checkout-table tbody').html(tableBody);
                    $('#rfid-input').val('')
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    $('#rfid-input').val('')
                }
            });

        }

        function masterKeyCheck() {
            $.ajax({
                type: 'POST',
                url: "{{ route('add-list-attendance.index') }}",
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('auth_token')
                },
                data: {
                    rfid: $('#rfid-input').val()
                },
                success: function(data) {
                    // console.log(data);
                    if (data.status === 'success') {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1000
                        });
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1000
                        });
                    }

                    $('#rfid-input').val('')
                },
                error: function(xhr, status, error) {
                    let errorObj = JSON.parse(xhr.responseText);
                    Swal.fire({
                        position: "center",
                        icon: errorObj.status,
                        title: errorObj.message,
                        showConfirmButton: false,
                        timer: 1000
                    });

                    if (xhr.status == 401) {
                        window.location.href = "{{ route('attendance-test.index') }}";
                    }

                    $('#rfid-input').val('')
                }
            });
        }
    </script>
</body>

</html>
