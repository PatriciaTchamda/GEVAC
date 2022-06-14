<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <title>{{ $title }}</title>
    </head>
    <body>
        <section id="menu">
            <div class="logo mb-3">
                <img src="{{ asset('img/logo.jpeg')}}" alt="" class="taille">
                <h2>GEVAC</h2>
            </div>
            <div>
                <div style="text-align: right; margin:0 20px;">
                    <a href=""><img src="{{ asset('img/home.png') }}" alt=""></a>
                    <a href=""><img src="{{ asset('img/settings.png') }}" alt=""></a>
                    <a href=""><img src="{{ asset('img/shutdown.png') }}" alt=""></a>
                </div>
            </div>
            <div class="items ">
                <img src="{{ asset('img/dashboard.png') }}" alt="" class="tailles"><a href="#">Dashboard</a><br><br>
                <img src="{{asset('img/icon2.png') }}" alt="" class="tailles"><a href="{{ route('listAnneeAcademique') }}">Année Academique</a> <br><br>
                <img src="{{ asset('img/icon5.png') }}" alt="" class="tailles"><a href="{{ route('listNiveau') }}">Niveau</a> <br><br>
                <img src="{{asset('img/icon3.png') }}" alt="" class="tailles"><a href="{{ route('ListFilieres') }}">Filière</a> <br><br>
                <img src="{{asset('img/icon6.png') }}" alt="" class="tailles"><a href="{{ route('liste') }}">Spécialité</a> <br><br>
                <img src="{{asset('img/icon.png') }}" alt="" class="tailles"><a href="{{ route('ListEnseignant') }}">Enseignant</a> <br><br>

                <li class="nav-item">
                    <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="collapse" data-bs-target="#sous-menu5" aria-controls="sous-menu5" aria-expanded="false" aria-label="Toggle navigation "><img src="{{ asset('img/icon1.png') }}" alt="" class="tailles"> Matière</a>
                    <ul class="dropdown-menu" id="sous-menu5">
                        <li><a class="dropdown-item" href="{{ route('ListMatiere') }}">Liste des Matière</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('ListMatiereSpecialite') }}">Liste des Matière / Spécialité</a></li><br><br>
                    </ul>
                </li>
                <img src="{{asset('img/emarger.png') }}" alt="" class="tailles"><a href="{{ route('listEmargement') }}">Emargement</a> <br><br>
                <img src="{{asset('img/money.png') }}" alt="" class="tailles"><a href="{{ route('CreateAnneeAcademique') }}">Etats Vacations</a> <br><br>
            </div>
        </section>

        <section id="interface">
            <div class="navigation">
                <div class="n1">
                    <div class="search">
                        <i class="far fa-search"></i>
                        <img src="{{ asset('img/icon8.png') }}" alt="" class="tailles"><input type="text" placeholder="search" name="search">

                    </div>
                </div>

                <div class="profile">
                    <i class=""></i>
                    <img src="{{ asset('img/log2.jpeg') }}" alt="" class="new">
                </div>
            </div>
            <div class="central container-flex">
                @yield('content')
            </div>
        </section>

    </body>
</html>
