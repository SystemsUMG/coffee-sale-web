<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Template -->
    <link rel="stylesheet" href="assets/css/login.css">
    <!-- Scripts -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- Title -->
    <title>Inicar Sesión</title>
</head>
<body>
<div class="main-container">
    <section class="ftco-section bg-img bg-cover content" style="background-image: url('/assets/img/background/coffee-login.jpg'); ">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center p-2">
                            <img src="{{ asset('assets/img/favicon.png') }}" alt="Image" class="img-fluid">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h1 class="heading-section text-center">Inicio de Sesión</h1>
                        <h3 class="text-center mb-4">Bienvenido, por favor ingresa tus credenciales.</h3>
                        <form class="login-form" id="form-login" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control rounded-left"  id="email" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required autofocus>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" class="form-control rounded-left" id="password" name="password" value="{{ old('password') }}" placeholder="Contraseña" required>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="form-group">
                                    <div class="text-right">
                                        <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary rounded submit mt-3 p-3 px-5">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer py-3 bg-primary text-white-50">
        <div class="container text-center ">
            <small>Copyright &copy; Grupo 6</small>
        </div>
    </footer>
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

</body>
</html>
