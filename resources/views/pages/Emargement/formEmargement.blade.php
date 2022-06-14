@extends('layouts.master', ['title' => 'nouveau emergement'])

@section('content')
    <style>
        #cont
        {
            height: 450px;
            width: 600px;
            border: 3px solid rgb(18, 123, 209);
            border-radius: 1Opx ;
            font-size: 1rem;
            margin-top: 8%;
            padding: 30px;
        }
    </style>

    <!--pour afficher le message de succes apres l'enregistrement !-->
    @if (session()->has("success"))
        <h3 class="alert alert-success">{{ session()->get("success") }}</h3>
    @endif

    @if (session()->has("Termine"))
        <h3 class="alert alert-success">{{ session()->get("Termine") }}</h3>
    @endif


    <!--pour afficher des erreurs au cas ou il y'en a !-->
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div id="cont" class="container">

        <form action="{{ route('addEmargement') }}" method="POST">
            <!--ajouter csrf lorsqu'on envoie des formulaire a laravel pour qu'il puisse traiter !-->
            @csrf

            <div class="mb-3">
                <label for="code" class="form-label">Enseignant</label>
                <input class="form-control" type="text" name="enseignant" id="" value="{{$matieres->enseignants->nom}} {{$matieres->enseignants->prenom}}" disabled>
            </div>
            <div class="mb-3">
                <label for="intitule" class="form-label">Matiere</label>
                <input class="form-control" type="text" name="" id="" value="{{$matieres->intitule}}" disabled>
                <input class="form-control" type="hidden" name="matiere" id="" value="{{$matieres->id}}">
            </div>
            <div class="mb-3">
                <label for="intitule" class="form-label">Heure de Debut</label>
                <input class="form-control" type="time" name="heuredeb" id="" >
            </div>
            <div class="mb-3">
                <label for="intitule" class="form-label">Heure de Fin</label>
                <input class="form-control" type="time" name="heurefin" id="" >
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Emarger</button>
                <a href="{{ route('listEmargement') }}" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>
@endsection
