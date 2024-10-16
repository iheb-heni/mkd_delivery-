<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Application de Livraison</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS Bundle (includes Popper.js) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Styles -->
    <style>

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand mt-0" href="#">
                <img src="{{ asset('assets/imgs/logo.png') }}" alt="Logo" style="height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5 active" aria-current="page" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5" href="#about">À Propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold fs-5" href="#contact">Contact</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link fw-bold fs-5 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Blog
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Conseils Livraison</a></li>
                          <li><a class="dropdown-item" href="#">Actualités</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Authentication Links -->
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('register') }}">Inscription</a>
                        </li>
                    @else
                        @if (Auth::user()->role === 'admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Admin
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Tableau de Bord Admin</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Déconnexion
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @elseif (Auth::user()->role === 'livreur')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Livreur
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('livreur.dashboard') }}">Tableau de Bord Livreur</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Déconnexion
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero">
        <h1>MK DELIVERY</h1>
    </section>
    <section style="background-color: #f8f9fa;" id="about">
        <h2 class="text-center my-4">À Propos de Nous</h2>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <p class="lead">Bienvenue chez MK Delivery, votre solution de livraison rapide et fiable. Nous nous engageons à offrir un service de qualité supérieure à nos clients.</p>
                    <p>Depuis notre création, nous avons pour mission de rendre vos livraisons simples et accessibles. Que ce soit pour des colis urgents ou des envois réguliers, notre équipe dédiée travaille sans relâche pour répondre à vos besoins.</p>
                    <p>Notre flotte moderne et notre technologie avancée de suivi des colis garantissent que vos envois arrivent à destination en toute sécurité et dans les délais. Faites confiance à MK Delivery pour tous vos besoins de livraison !</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/imgs/about.jpg') }}" class="img-fluid" alt="À propos de nous">
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="container">
        <h2 class="text-center my-4">Nos Services</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('assets/imgs/LivraisonExpress.jpg') }}" class="card-img-top" alt="Livraison Express">
                    <div class="card-body">
                        <h5 class="card-title">Livraison Express</h5>
                        <p class="card-text">Bénéficiez d'une livraison ultra-rapide en moins de 24 heures, parfaite pour vos besoins urgents. Nous faisons tout pour respecter vos délais.</p>
                        <a href="#" class="btn btn-primary">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('assets/imgs/standard-delivery.jpg') }}" class="card-img-top" alt="Livraison Standard">
                    <div class="card-body">
                        <h5 class="card-title">Livraison Standard</h5>
                        <p class="card-text">Un service de livraison économique et fiable pour tous vos envois non urgents. Faites-nous confiance pour livrer vos colis en toute sécurité.</p>
                        <a href="#" class="btn btn-primary">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('assets/imgs/tracking.jpg') }}" class="card-img-top" alt="Suivi des Colis">
                    <div class="card-body">
                        <h5 class="card-title">Suivi des Colis</h5>
                        <p class="card-text">Restez informé à chaque étape de la livraison grâce à notre système de suivi en temps réel. Savoir où se trouve votre colis n'a jamais été aussi simple !</p>
                        <a href="#" class="btn btn-primary">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="contact" class="container">
        <h2 class="text-center my-4">Nous Contacter</h2>
        <p>Si vous avez des questions ou des demandes spécifiques, n'hésitez pas à nous contacter via notre formulaire ou appelez-nous au 01 23 45 67 89.</p>
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
        <form action="{{ route('contact.submit') }}" method="POST" class="form-inline  ">
            @csrf
            <div class="mb-3 d-flex align-items-center">
                <label for="name" class="form-label me-4">Nom </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom" required style="flex: 1;">
            </div>
            <div class="mb-3 d-flex align-items-center">
                <label for="email" class="form-label me-4">Email </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Votre adresse email" required style="flex: 1;">
            </div>
            <div class="mb-3 d-flex align-items-center">
                <label for="subject" class="form-label me-4">Sujet </label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Sujet de votre message" required style="flex: 1;">
            </div>
            <div class="mb-3 d-flex align-items-center">
                <label for="login" class="form-label me-4">Login </label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Votre identifiant" required style="flex: 1;">
            </div>
            <div class="mb-3 d-flex align-items-center">
                <label for="message" class="form-label me-4">Message </label>
                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Votre message" required style="flex: 1;"></textarea>
            </div>
            <div >
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
    </section>


    <footer class="text-center py-4">
        <p>&copy; 2024 MK DELIVERY. Tous droits réservés.</p>
    </footer>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
