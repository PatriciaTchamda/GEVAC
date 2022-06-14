@extends('layouts.master', ['title' => 'modifier une matiere'] )

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

    <form action="{{ route('UpdateMatiere',['matiere'=>$matiere->id]) }}" method="POST" >
        <!--ajouter csrf lorsqu'on envoie des formulaire a laravel pour qu'il puisse traiter !-->
        @csrf

        <input type="hidden" name="_method" value="put">

        <div class="mb-2">
            <label for="code" class="form-label">Code</label>
            <input class="form-control" type="text" value="{{ $matiere->code }}" name="code" id="">
        </div>
        <div class="mb-2">
            <label for="intitule" class="form-label">Intitule</label>
            <input class="form-control" type="text" value="{{ $matiere->intitule }}" name="intitule" id="">
        </div>
        <div class="mb-2">
            <label for="intitule" class="form-label">Quota Horaire</label>
            <input class="form-control" type="number" value="{{ $matiere->quota }}" name="quota" id="">
        </div>
        <div class="mb-2">
            <label for="intitule" class="form-label">Semestre</label>
            <select name="semestre" id="" class="form-select">
                <option value="" selected>{{ $matiere->semestre }}</option>
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
                <option value=""></option>
                @foreach ($enseignants as $enseignant)
                    @if ($enseignant->id == $matiere->enseignants_id)
                        <option value="{{ $enseignant->id }}" selected>{{ $enseignant->nom }} {{ $enseignant->prenom }}</option>
                    @else
                        <option value="{{ $enseignant->id }}">{{ $enseignant->nom }} {{ $enseignant->prenom }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label for="filiere" class="form-label">Niveau</label>
            <select name="niveau_id" id="" class="form-select">
                <option value=""></option>
                @foreach ($niveaux as $niveau)
                    @if ($niveau->id == $matiere->niveau_id)
                        @foreach ($cycles as $cycle)
                            @if ($niveau->cycle_id == $cycle->id)
                                <option value="{{ $niveau->id }}" selected>{{$cycle->code}} {{ $niveau->numero }}</option>
                            @endif
                        @endforeach
                    @else
                        @foreach ($cycles as $cycle)
                            @if ($niveau->cycle_id == $cycle->id)
                                <option value="{{ $niveau->id }}">{{$cycle->code}} {{ $niveau->numero }}</option>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label for="intitule" class="form-label">Prix Unitaire par Heure</label>
            <input class="form-control" type="number" value="{{ $matiere->PU }}" name="PU" id="">
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('ListMatiere') }}" class="btn btn-danger">Annuler</a>
        </div>
    </form>
</div>
@endsection

