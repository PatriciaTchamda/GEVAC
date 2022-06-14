@extends('layouts.master', ['title' => 'Nouvelle Matiere'])

@section('content')
    <style>
        #cont
        {
            height: 650px;
            width: 650px;
            border: 3px solid rgb(18, 123, 209);
            border-radius: 1Opx ;
            font-size: 1rem;
            margin-top: 1%;
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

        <form action="{{ route('AddMatiere') }}" method="POST" >
            <!--ajouter csrf lorsqu'on envoie des formulaire a laravel pour qu'il puisse traiter !-->
            @csrf

            <div class="mb-2">
                <input class="form-control" type="hidden" name="etat" id="" value="execution" >
                <label for="code" class="form-label">Code</label>
                <input class="form-control" type="text" name="code" id="">
            </div>
            <div class="mb-2">
                <label for="intitule" class="form-label">Intitule</label>
                <input class="form-control" type="text" name="intitule" id="">
            </div>
            <div class="mb-2">
                <label for="intitule" class="form-label">Quota Horaire</label>
                <input class="form-control" type="number" name="quota" id="">
            </div>
            <div class="mb-2">
                <label for="intitule" class="form-label">Semestre</label>
                <select name="semestre" id="" class="form-select">
                    <option value="">Selectionner un semestre</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Enseignant en charge</label>
                <select name="enseignants_id" id="" class="form-select">
                    <option value="">Selectionner un enseignant</option>
                    @foreach ($enseignants as $enseignant)
                        <option value="{{ $enseignant->id }}">{{ $enseignant->nom }} {{ $enseignant->prenom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="filiere" class="form-label">Niveau</label>
                <select name="niveau_id" id="" class="form-select">
                    <option value="">Selectionner un niveau</option>
                    @foreach ($niveaux as $niveau)
                        @foreach ($cycles as $cycle)
                            @if ($niveau->cycle_id == $cycle->id)
                                <option value="{{ $niveau->id }}">{{$cycle->code}} {{ $niveau->numero }}</option>
                            @endif
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label for="intitule" class="form-label">Prix Unitaire par Heure</label>
                <input class="form-control" type="number" name="PU" id="">
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('ListMatiere') }}" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>
@endsection

