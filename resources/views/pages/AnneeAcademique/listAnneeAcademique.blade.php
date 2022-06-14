@extends('layouts.master', ['title' => 'liste des Annee Academique'])

@section('content')

    @if (session()->has("succesDelete"))
        <h3 class="alert alert-success">{{ session()->get("succesDelete") }}</h3>
    @endif

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div>

        <div class="d-flex justify-content-between mb-2 ml-4">
            <div class="offset-1"><a class="btn btn-outline-success fw-bold" href="{{ route('CreateAnneeAcademique') }}"><img src="{{ asset('img/add.png') }}" alt="">Nouvelle Annee Academique</a></div>
            <div class="offset-5">{{ $liste->links() }}</div>
            <div></div>
        </div>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr class="table-dark text-uppercase">
                    <th scope="col">#</th>
                    <th scope="col">nom</th>
                    <th scope="col">intitule</th>
                    <th scope="col text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($liste as $liste)
                <tr>
                    <td scope="row">{{$loop->index + 1}}</td>
                    <td>{{$liste->nom}}</td>
                    <td>{{$liste->libelle}}</td>
                    <td class="fw-bold">
                        <a href="{{ route('editAnneeAcademique', ['annee'=>$liste->id]) }}" class="btn btn-primary offset-1"><img src="{{ asset('img/update.png') }}" alt="">Editer</a>
                        <a href="#" class="btn btn-danger offset-5" onclick="if(confirm('voulez vous supprimer cette Annee Academique ?')){
                            document.getElementById('form-{{$liste->id}}').submit()
                        }"><img src="{{ asset('img/delete.png') }}" alt="">Supprimer</a>

                        <!-- creation d'un formulaire pour envoyer une requete de type delete  !-->
                        <form id="form-{{$liste->id}}" action="{{ route('deleteAnneeAcademique',['annee'=>$liste->id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
