<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="/css/sign.css" rel="stylesheet">
    </head>
    <body>
       <div class="container">
            <h1>Créer un compte</h1>

            <form method="POST" action="{{route('sign')}}">
                @csrf
                <label id="nom">Nom</label><br>
                <input type="text" name="nom" placeholder="Entrez votre nom" from="nom"><br>
                <label id="prenom">Prénom(s)</label><br>
                <input type="text" name="prenom" placeholder="Entrez votre prénom(s)" from="prenom"><br>
                <label id="sexe">Sexe</label><br>
                <input type="text" name="sexe" placeholder="Entrez votre sexe" from="sexe"><br>
                <label id="tel">Téléphone</label><br>
                <input type="text" name="telephone" placeholder="Entrez votre telephone" from="tel"><br>
                <label id="ad">Adresse Email</label><br>
                <input type="email" name="email" placeholder="Entrez votre Adresse email" from="ad"><br>
                <label id="mdp">Mot de passe</label><br>
                <input type="password" name="mdp" placeholder="Entrez votre Mot de passe" from="mdp"><br>
                <label id="conf">Confirmation</label><br>
                <input type="password" name="confirm" placeholder="confirmer" from="conf"><br>
                <input type="checkbox">
                <button type="submit">S'inscrire</button>
            </form>
       </div>
    </body>
</html>