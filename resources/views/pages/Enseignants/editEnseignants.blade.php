@extends('layouts.master', ['title' => 'Modifier un enseignant'])

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
        label{
            color: brown;
            font-weight: bold;
        }
    </style>

    <!--pour afficher le message de succes apres l'enregistrement !-->
    @if (session()->has("successUpdate"))
        <h3 class="alert alert-success">{{ session()->get("successUpdate") }}</h3>
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

        <form action="{{ route('UpdateEnseignant', ['enseignants'=>$enseignants->id]) }}" method="POST" >
            <!--ajouter csrf lorsqu'on envoie des formulaire a laravel pour qu'il puisse traiter !-->
            @csrf

            <!--ajouter le name="_method" pour adapter le formulaire lorsqu'on utilise une autre methode que post !-->
            <input type="hidden" name="_method" value="put">

            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input class="form-control" type="text" value="{{$enseignants->code}}" name="code" id="">
            </div>
            <div class="mb-3">
                <label for="intitule" class="form-label">Nom</label>
                <input class="form-control" type="text" value="{{$enseignants->nom}}" name="nom" id="">
            </div>
            <div class="mb-3">
                <label for="intitule" class="form-label">Prenom</label>
                <input class="form-control" type="text" value="{{$enseignants->prenom}}" name="prenom" id="">
            </div>
            <div class="mb-3">
                <label for="intitule" class="form-label">Telephone</label>
                <input class="form-control" type="text" value="{{$enseignants->tel}}" name="tel" id="">
            </div>
            <div class="mb-3">
                <label for="intitule" class="form-label">Email</label>
                <input class="form-control" type="email" value="{{$enseignants->email}}" name="email" id="">
            </div>
            <div class="mb-3">
                <label for="intitule" class="form-label">Adresse</label>
                <input class="form-control" type="text" value="{{$enseignants->adresse}}" name="adresse" id="">
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="{{ route('ListEnseignant') }}" class="btn btn-danger">Annuler</a>
            </div>

        </form>
    </div>
@endsection

