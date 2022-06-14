@extends('layouts.master', ['title' => 'Modifier une Specialite'])

@section('content')
    <style>
        #cont
        {
            height: 400px;
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

        <form action="{{ route('updateSpecialite', ['specialite'=>$specialite->id]) }}" method="POST" >
            <!--ajouter csrf lorsqu'on envoie des formulaire a laravel pour qu'il puisse traiter !-->
            @csrf

            <input type="hidden" name="_method" value="put">
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input class="form-control" type="text" name="code" value="{{ $specialite->code }}" id="">
            </div>
            <div class="mb-3">
                <label for="intitule" class="form-label">Intitule</label>
                <input class="form-control" type="text" name="intitule" value="{{ $specialite->intitule }}" id="">
            </div>
            <div class="mb-3">
                <label for="filiere" class="form-label">Filiere</label>
                <select name="filieres_id" id="" class="form-select">
                    <option value=""></option>
                    @foreach ($filiere as $filiere)
                        @if($filiere->id == $specialite->filieres_id)
                            <option value="{{ $filiere->id }}" selected>{{ $filiere->intitule }}</option>
                        @else
                            <option value="{{ $filiere->id }}">{{ $filiere->intitule }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="{{ route('liste') }}" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>
@endsection
