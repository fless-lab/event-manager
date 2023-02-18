
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('/css/style.css')}} " rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <form action="{{route('register')}}" method="post">
                            @method('post')
                            @csrf
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="#" class="">
                                    <h3 class="text-primary"></i>NBF-Event</h3>
                                </a>
                                <h3>Inscription</h3>
                            </div>
                            @if($errors)
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control" id="floatingText" placeholder="jhondoe">
                                <label for="floatingText">Nom d'utilisateur</label>
                            </div>
                                @error('name')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Adresse email</label>
                            </div>
                                @error('email')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            <div class="form-floating mb-4">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Mot de passe</label>
                            </div>
                                @error('password')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" value="1" name="promo" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Etes vous promoteurs?</label>
                                </div>
                            @endif
                                <a href="">Mot de passe oublié?</a>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">S'inscrire</button>
                            <p class="text-center mb-0">Vous avez déja un compte? <a href="{{route('login')}}">Connectez-vous</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/js/chart.min.js')}}"></script>
    <script src="{{asset('/js/easing.min.js')}}"></script>
    <script src="{{asset('/js/waypoints.min.js')}}"></script>
    <script src="{{asset('/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/js/moment.min.js')}}"></script>
    <script src="{{asset('/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>