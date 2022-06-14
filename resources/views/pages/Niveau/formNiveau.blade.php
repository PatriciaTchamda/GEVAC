@extends('layouts.master', ['title' => 'Nouveau Niveau'])

@section('content')
    <style>
        #cont
        {
            height: 280px;
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

    <style>
        label{
            color: brown;
            font-weight: bold;
        }
    </style>

    <div id="cont" class="container">

        <form action="{{ route('addNiveau') }}" method="POST" >
            <!--ajouter csrf lorsqu'on envoie des formulaire a laravel pour qu'il puisse traiter !-->
            @csrf

            <div class="mb-3">
                <label for="numero" class="form-label">Numero</label>
                <input class="form-control" type="number" name="numero" id="">
            </div>
            <div class="mb-3">
                <label for="cycle_id" class="form-label">Cycle</label>
                <select name="cycle_id" id="" class="form-select">
                    <option value="">Selectionner un cycle</option>
                    @foreach ($cycles as $cycle)
                        <option value="{{ $cycle->id }}">{{ $cycle->code }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('listNiveau') }}" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>
@endsection

