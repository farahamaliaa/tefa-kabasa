<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi | Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .full-height {
            height: calc(100vh - 10rem);
            /* Adjust height to account for padding */
        }

        .card-body {
            display: flex;
            flex-direction: column;
        }

        .illustration-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @media (max-width: 768px) {
            .card-body {
                padding: 20px;
                /* Add padding for smaller screens */
            }

            .illustration-container img {
                max-width: 100%;
                height: auto;
            }
        }
    </style>
</head>

<body>
    <div class="row no-gutters">

        <div class="col-lg-6 d-flex align-items-stretch p-5">
            <div class="card w-100 full-height rounded" style="background-color: #F5F5F5; overflow: hidden;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <img src="{{ asset('assets/images/logo/logo-miscool.png') }}" style="width:150px"
                            alt="Logo" />
                        <h4 class="mt-3 text-muted">untuk memasuki halaman absensi anda membutuhkan master card</h4>
                    </div>
                    <div class="illustration-container d-flex justify-content-center">
                        <img src="{{ asset('admin_assets/dist/images/ilustrations/absensi.png') }}"
                            style="max-width: 83%;" alt="Illustration" />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 d-flex align-items-stretch p-5">
            <div class="card w-100 full-height rounded border-0">
                <div class="card-body">
                    <div>
                        <h2><b style="color: #5D87FF">Ma</b><b>suk</b></h2>
                        <h4 class="pt-3 text-muted">silahkan tap master card Siswa sekolah anda untuk memasuki halaman
                            absensi</h4>
                    </div>
                    <div class="illustration-container my-3">
                        <img src="{{ asset('admin_assets/dist/images/ilustrations/scan.png') }}" style="width:250px"
                            alt="Illustration" />
                    </div>
                    <form id="form-check">
                        <div class="mb-3">
                            <label for="rfid" class="form-label">RFID :</label>
                            <input type="text" name="rfid" id="rfid-input" class="form-control pt-3"
                                style="background-color: #F5F5F5; border: none; height: 50px; font-size: 18;" required>
                            @error('rfid')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </form>
                    <button type="submit" class="btn btn-light-primary text-primary">Masuk</button>
                    <div class="text-end pt-3">
                        <a href="/school" type="button" class="btn btn-primary w-25"
                            style="background-color: #5D87FF; border: none">Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#rfid-input').focus();

            $('#form-check').submit(function(event) {
                event.preventDefault();
                masterKeyCheck();
            });
        });

        function masterKeyCheck() {

            $.ajax({
                type: 'POST',
                url: "{{ route('attendance-test.check') }}",
                data: {
                    rfid: $('#rfid-input').val()
                },
                success: function(data) {
                    if (data.status === 'success') {
                        localStorage.setItem('auth_token', data.data.token);
                        localStorage.setItem('auth_user', JSON.stringify(data.data.user));
                        window.location.href = "{{ route('list-attendance.index') }}";
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message,
                            showConfirmButton: true
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
                    $('#rfid-input').val('')
                },
                complete: function() {
                    Swal.hideLoading();
                    $('#rfid-input').val('')
                }
            });
        }
    </script>
</body>

</html>
