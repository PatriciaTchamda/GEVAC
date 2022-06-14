@extends('layouts.master', ['title' => 'Liste des Enseignants'])

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
        <div>
            <div class="d-flex justify-content-between mb-4">
                <div class="offset-1"><a class="btn btn-outline-success" href="{{ route('FormEnseignant') }}"><img src="{{ asset('img/add.png') }}" alt="">Ajouter un Enseignant</a></div>
                {{-- <div>{{ $liste->links() }}</div> --}}
            </div>

            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="table-dark text-uppercase">
                        <th scope="col">Code</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Adresse</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listes as $liste)
                        <tr>
                            <td scope="row">{{$liste->code}}</td>
                            <td>{{$liste->nom}}</td>
                            <td>{{$liste->prenom}}</td>
                            <td>{{$liste->tel}}</td>
                            <td>{{$liste->adresse}}</td>
                            <td class="fw-bold">
                                <a href="{{ route('EditEnseignant', ['enseignants'=>$liste->id]) }}" class="btn btn-primary offset-1"><img src="{{ asset('img/update.png') }}" alt="">Modifier</a>
                                <a href="#" class="btn btn-danger offset-3" onclick="if(confirm('Etes vous sur de vouloir supprimer cette enseignant?')){
                                    document.getElementById('form-{{$liste->id}}').submit()
                                }"><img src="{{ asset('img/delete.png') }}" alt="">Supprimer</a>

                                <!-- creation d'un formulaire pour envoyer une requete de type delete  !-->
                                <form id="form-{{$liste->id}}" action="{{ route('DeleteEnseignant', ['enseignants'=>$liste->id]) }}" method="POST">
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

