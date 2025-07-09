    <!DOCTYPE html>
<html lang="id">

<head>
    <!--  Title -->
    <title>Mischool | Login</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="handheldfriendly" content="true">
    <meta name="MobileOptimized" content="width">
    <meta name="description" content="Mordenize">
    <meta name="author" content="">
    <meta name="keywords" content="Mordenize">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo/logo-M.png') }}">
    <!-- Core Css -->
    <style>

    </style>
    <link rel="stylesheet" href="https://school.mischool.id/assets/dist/css/app.css">
    <link id="themeColors" rel="stylesheet" href="{{ asset('admin_assets/dist/css/style.min.css') }}">
</head>
<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-7 col-xxl-8">
                        <a href="javascript:void(0)" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                            <img src="{{ asset('assets/images/logo/logo-M.png') }}" width="8%" alt="">
                        </a>
                        <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(89vh - 80px);">
                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg" alt="" class="img-fluid" width="500">
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                        <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="col-sm-8 col-md-6 col-xl-9">
                                <h2 class="mb-3 fs-7 fw-bolder">Selamat Datang di Mischool</h2>
                                <form method="POST" action="{{ route('login') }}">
                                    @method('post')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" id="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div id="failed-login" class="text-center error-text mb-3"></div>

                                    <div class="mb-3">
                                        <input type="checkbox" id="show">
                                        <label for="show" class="">Tampilkan Password</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Masuk</button>
                                </form>
                                {{-- <form method="POST" id="save-token" class="hidden" action="https://school.mischool.id/login">
                                    <input type="hidden" name="_token" value="lUfDHDTYzWukOghImBrnfOh2IC7hpLUUXwIdWCOz" autocomplete="off"> <input id="token" type="hidden" name="bearer">
                                </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="{{ asset('admin_assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#show').click(function() {
                var passwordInput = $('#password');
                var passwordConfirmationInput = $('#password_confirmation');
                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    passwordConfirmationInput.attr('type', 'text');
                } else {
                    passwordInput.attr('type', 'password');
                    passwordConfirmationInput.attr('type', 'password');
                }
            });
        });

    </script>

</body>
</html>

{{-- @section('script')
    <script src="{{ asset('admin_assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('admin_assets/dist/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin_assets/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#show').click(function() {
            var passwordInput = $('#password');
            var passwordConfirmationInput = $('#password_confirmation');
            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                passwordConfirmationInput.attr('type', 'text');
            } else {
                passwordInput.attr('type', 'password');
                passwordConfirmationInput.attr('type', 'password');
            }
        });
    });

</script>
<!--  core files -->
<script>
    $(document).ready(function() {
        const token = localStorage.getItem('token')
        $.ajax({
            url: "https://dev.mischool.id/api/user"
            , type: 'GET'
            , headers: {
                'Accept': 'application/json'
                , 'Authorization': 'Bearer ' + token
            , }
            , dataType: "JSON"
            , success: function(response) {
                if (response.data.role == 'head master') {
                    window.location.href = "https://school.mischool.id/dashboard"
                } else {
                    window.location.href = "https://school.mischool.id/login"
                }
            }
            , error: function(err) {
                $('.preloader').fadeOut()
            }
        })
        $('#form-login').submit(function(e) {
            e.preventDefault();
            $('.preloader').show()
            $.ajax({
                url: "https://dev.mischool.id/api/login"
                , type: "POST"
                , headers: {
                    'Accept': 'application/json'
                , }
                , data: $(this).serialize()
                , success: function(response) {
                    $('.preloader').fadeOut()
                    console.log(response.data.user.role);
                    if (response.data.user.role === 'head master' ||
                        response.data.user.role === 'admin school') {
                        localStorage.setItem('token', response.data.token)
                        $('#token').val(response.data.token)
                        $('#save-token').submit()
                    } else {
                        $('#failed-login').html('Email Atau Password Tidak Sesuai')
                        $('#password').val('');
                        $('.preloader').fadeOut()
                    }
                }
                , error: function(response) {
                    $('.preloader').fadeOut()
                    var response = response.responseJSON
                    var status = response.meta.code
                    if (status == 422) {
                        handleValidate(response.data)
                        $('#password').val('');
                    } else if (status == 400) {
                        $('#failed-login').html(response.meta.message)
                        $('#password').val('');
                    } else if (status == 403) {
                        $('#failed-login').html(response.meta.message)
                        $('#password').val('');
                    } else {
                        $('#failed-login').html('Error tidak diketahui')
                    }

                }
            })
        })
    })

    function handleValidate(messages) {
        const keys = Object.keys(messages);
        for (const key of keys) {
            const text = messages[key];
            var ErrorList = $('<li>').text(text[0])
            let inputElement = $(`#${key}`)
            inputElement.addClass('error')
            inputElement.next('ul').prepend(ErrorList)
        }

        $('.error').change(function() {
            $(this).removeClass('error')
            $(this).next('ul').html('')
        })
    }

</script>
@endsection --}}
