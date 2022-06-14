@extends('layouts.master', ['title' => 'Nouvelle Annee Academique'])

@section('content')
    <style>
        #cont
        {
            height: 280px;
            width: 600px;
            border: 3px solid rgb(18, 123, 209);
            border-radius: 1Opx ;
            padding: 30px;
            margin-top: 8%;
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

        <form action="{{ route('updateAnneeAcademique', ['annee'=>$annee->id]) }}" method="POST" >
            <!--ajouter csrf lorsqu'on envoie des formulaire a laravel pour qu'il puisse traiter !-->
            @csrf

            <input type="hidden" name="_method" value="put">
            <div class="mb-3">
                <label for="intitule" class="form-label">Nom</label>
                <input class="form-control" type="text" name="nom" id="" value="{{ $annee->nom }}">
            </div>
            <div class="mb-3">
                <label for="intitule" class="form-label">Libelle</label>
                <input class="form-control" type="text" name="libelle" id="" value="{{ $annee->libelle }}">
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Modifer</button>
                <a href="{{ route('listAnneeAcademique') }}" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>
@endsection

