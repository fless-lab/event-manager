<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Laravel</title>
        <link href="/css/home.css" rel="stylesheet">
    </head>
    <body>
        <div class="contain">
            <div class="container">
                <div class="nav">
                    <p class="logo">R-EVENT</p>
                    <input type="checkbox" id="menu">
                    <label for="menu">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                    <div class="menu">
                        <ul>
                        @Auth
                            <li><a href="#">home</a></li>
                            <li><a href="#event">Event</a></li>
                            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li><a href="#contacts">Contacts</a></li>
                            <li><a href="{{route('logout')}}" class="login">Log Out</a></li>
                        @else
                            <li><a href="#">home</a></li>
                            <li><a href="#event">Event</a></li>
                            <li><a href="#contacts">Contacts</a></li>
                            <li><a href="#" class="login">Login</a></li>
                        @endauth
                        </ul>
                    </div>
                </div>
                <div class="text">
                    <h2>Bienvenue sur votre plateforme de gestion d'événement</h2>
                    <p> Voici nos meilleurs événement </p>
                </div>
            </div>
            <div class="cards" id="event">
                <div class="card-1">
                    <div class="card car-01">
                        <h2>Titre</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <a href="#">ticket</a>
                    </div>
                    <div class="card car-02">
                        <h2>Titre</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <a href="#">ticket</a>
                    </div>
                    <div class="card car-03">
                        <h2>Titre</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <a href="#">ticket</a>
                    </div>
                </div>
                <div class="card-2">
                    <div class="cardt car-01">
                        <h2>Titre</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <a href="#">ticket</a>
                    </div>
                    <div class="cardt car-02">
                        <h2>Titre</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <a href="#">ticket</a>
                    </div>
                </div>
                <div class="card-1">
                    <div class="card car-01">
                        <h2>Titre</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <a href="#">ticket</a>
                    </div>
                    <div class="card car-02">
                        <h2>Titre</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <a href="#">ticket</a>
                    </div>
                    <div class="card car-03">
                        <h2>Titre</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <a href="#">ticket</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="event" class="btn">Voir plus</a>
        <footer id="contacts"></footer>

    </body>
</html>