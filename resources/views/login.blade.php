<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="/css/login.css" rel="stylesheet">
    </head>
    <body>
       <div class="container">
            <h1>Se connecter</h1>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="erreur">
                    {{ $error }}
                </div>
                @endforeach
            @endif
            <form method="POST" action="{{route('login')}}">
                @csrf
                <label for="login">Identifiant</label><br>
                <input type="text" name="username" placeholder="Identifiant" id="login"><br>
                <label for="mdp">Mot de Passe</label><br>
                <input type="password" name="password" placeholder="Mot de passe" id="mdp"><br>
                <button type="submit">Se connecter</button>
                <h4><a href="{{route('sign')}}">S'incrire</a></h4>
            </form>
       </div>
    </body>
</html>