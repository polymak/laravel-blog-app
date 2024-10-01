<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>@yield('title')</title>
    <style>
        body {
            background-color: white;
        }
        .navbar {
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.6)); /* Dégradé de fond */
            backdrop-filter: blur(15px); /* Flou en arrière-plan */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Ombre pour donner de la profondeur */
        }
        .navbar-brand, .nav-link {
            color: #34495e; /* Couleur de texte légèrement plus sombre */
        }
        .nav-link:hover {
            color: #2980b9; /* Couleur au survol */
            text-decoration: underline; /* Soulignement au survol */
        }
        @media (max-width: 768px) {
            .navbar-collapse {
                background: rgba(255, 255, 255, 0.9); /* Fond légèrement transparent pour le menu mobile */
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand" href="{{ route('home') }}">Mon Blog à LARAVEL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('articles.liste') }}">Liste Articles</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('articles.create') }}">Publier Article</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Catégories</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
