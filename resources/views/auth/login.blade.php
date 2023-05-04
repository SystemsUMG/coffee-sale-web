<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>Login</title>
<body>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="images-landing/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h3>Inicio de Sesión</h3>
                            <p class="mb-4">Bienvenido, ingresa tus credenciales.</p>
                        </div>
                        <form id="form-login" method="POST" action="{{ route('login') }}">
                            @csrf
                            <label>Correo Electrónico</label>
                            <div class="form-group last mb-3">
                                <input type="text" class="form-control"  id="email" name="email" value="{{ old('email') }}" required  autofocus>
                            </div>
                            <label>Contraseña</label>
                            <div class="form-group last mb-3">
                                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required>
                            </div>
                            <button type="submit" id="btn-login" class="btn btn-block btn-primary">
                                Iniciar Sesión
                                <span class="spinner-border spinner-border-sm" id="loader" role="status" hidden="hidden"></span>
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    function showAlert(type, title) {
        Toast.fire({
            icon: type,
            title: title
        })
    }
</script>
@if (session()->has('success'))
    <script>
        Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}'
        })
    </script>
@endif

@if (session()->has('error'))
    <script>
        Toast.fire({
            icon: 'error',
            title: '{{ session('error') }}'
        })
    </script>
@endif
<script src="https://preview.colorlib.com/theme/bootstrap/login-form-07/js/jquery-3.3.1.min.js"></script>
<script src="https://preview.colorlib.com/theme/bootstrap/login-form-07/js/popper.min.js"></script>
<script src="https://preview.colorlib.com/theme/bootstrap/login-form-07/js/bootstrap.min.js"></script>
<script src="https://preview.colorlib.com/theme/bootstrap/login-form-07/js/main.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"793dc65ff8da31c8","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}' crossorigin="anonymous"></script>
</body>
</html>
