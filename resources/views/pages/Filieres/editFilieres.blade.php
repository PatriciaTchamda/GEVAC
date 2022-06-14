@extends('layouts.master', ['title' => 'Modifier Filiere'])

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

        <form action="{{ route('UpdateFilieres', ['filiere'=>$filiere->id]) }}" method="POST" >
            <!--ajouter csrf lorsqu'on envoie des formulaire a laravel pour qu'il puisse traiter !-->
            @csrf

            <input type="hidden" name="_method" value="put">
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input class="form-control" type="text" name="code" id="" value="{{ $filiere->code }}">
            </div>
            <div class="mb-3">
                <label for="intitule" class="form-label">Intitule</label>
                <input class="form-control" type="text" name="intitule" id="" value="{{ $filiere->intitule }}">
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="{{ route('ListFilieres') }}" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>
@endsection

