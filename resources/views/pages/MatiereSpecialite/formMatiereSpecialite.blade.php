@extends('layouts.master', ['title' => 'Nouvelle Matiere d\'une Specialite'])

@section('content')
    <style>
        #cont
        {
            height: 300px;
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

    <!--pour afficher des erreurs au cas ou il y'en a !-->
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div id="cont" class="container">

        <form action="{{ route('AddMatiereSpecialite') }}" method="POST" >
            <!--ajouter csrf lorsqu'on envoie des formulaire a laravel pour qu'il puisse traiter !-->
            @csrf

            <div class="mb-3">
                <label for="specialite" class="form-label">Spécialite</label>
                <select name="specialite_id" id="" class="form-select">
                    <option value="">Selectionner une spécialite</option>
                    @foreach ($specialite as $specialite)
                        <option value="{{ $specialite->id }}">{{ $specialite->intitule }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="matiere" class="form-label">Matière</label>
                <select name="matieres_id" id="" class="form-select">
                    <option value="">Selectionner une matière</option>
                    @foreach ($matiere as $matiere)
                        <option value="{{ $matiere->id }}">{{ $matiere->intitule }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('ListMatiereSpecialite') }}" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>
@endsection

