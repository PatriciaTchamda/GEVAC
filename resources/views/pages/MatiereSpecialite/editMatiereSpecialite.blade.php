@extends('layouts.master', ['title' => 'Reaffectation Matiere d\'une Specialite'])

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
        label{
            color: brown;
            font-weight: bold;
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

        <form action="{{ route('UpdateMatieresSpecialite', ['matiereSpecialite'=>$matiereSpecialite->id]) }}" method="POST" >
            <!--ajouter csrf lorsqu'on envoie des formulaire a laravel pour qu'il puisse traiter !-->
            @csrf

            <input type="hidden" name="_method" value="put">
            <div class="mb-3">
                <label for="specialite" class="form-label">Spécialite</label>
                <select name="specialite_id" id="" class="form-select">
                    <option value=""></option>
                    @foreach ($specialite as $specialite)
                        @if($specialite->id == $matiereSpecialite->specialite_id)
                            <option value="{{ $specialite->id }}" selected>{{ $specialite->intitule }}</option>
                        @else
                            <option value="{{ $specialite->id }}">{{ $specialite->intitule }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="matiere" class="form-label">Matière</label>
                <select name="matieres_id" id="" class="form-select">
                    <option value=""></option>
                    @foreach ($matiere as $matiere)
                        @if($matiere->id == $matiereSpecialite->matieres_id)
                            <option value="{{ $matiere->id }}" selected>{{ $matiere->intitule }}</option>
                        @else
                            <option value="{{ $matiere->id }}">{{ $matiere->intitule }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="{{ route('ListMatiereSpecialite') }}" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>
@endsection

