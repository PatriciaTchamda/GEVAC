@extends('layouts.master', ['title' => 'nouveau enseignant'])

@section('content')
    <style>
        #cont
        {
            height: 600px;
            width: 600px;
            border: 3px solid rgb(18, 123, 209);
            border-radius: 1Opx ;
            font-size: 1rem;
            margin-top: 3%;
            padding: 30px;
        }
    </style>

    <!--pour afficher le message de succes apres l'enregistrement !-->
    @if (session()->has("success"))
        <h3 class="alert alert-success">{{ session()->get("success") }}</h3>
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

        <form action="{{ route('AddEnseignant') }}" method="POST">
            <!--ajouter csrf lorsqu'on envoie des formulaire a laravel pour qu'il puisse traiter !-->
            @csrf

            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input class="form-control" type="text" name="code" id="" placeholder="Entrer le code de l'enseignant" >
            </div>
            <div class="mb-3">
                <label for="intitule" class="form-label">Nom</label>
                <input class="form-control" type="text" name="nom" id="" placeholder="Entrer le nom de l'enseignant">
            </div>
            <div class="mb-3">
                <label for="intitule" class="form-label">Prenom</label>
                <input class="form-control" type="text" name="prenom" id="" placeholder="Entrer le prenom de l'enseignant">
            </div>
            <div class="mb-3">
                <label for="intitule" class="form-label">Telephone</label>
                <input class="form-control" type="text" name="tel" id="" placeholder="Entrer le téléphone de l'ensignant">
            </div>
            <div class="mb-3">
                <label for="intitule" class="form-label">Email</label>
                <input class="form-control" type="email" name="email" id="" placeholder="Entrer l'email de l'enseignant">
            </div>
            <div class="mb-3">
                <label for="intitule" class="form-label">Adresse</label>
                <input class="form-control" type="text" name="adresse" id="" placeholder="Entrer l'adresse de l'enseignant">
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('ListEnseignant') }}" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>
@endsection
