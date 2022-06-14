@extends('layouts.master', ['title' => 'Liste des Matieres'])

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

        <div class="d-flex justify-content-between mb-4">
            <div class="offset-1"><a class="btn btn-outline-success" href="{{ route('FormMatiere') }}"><img src="{{ asset('img/add.png') }}" alt="">Affecter une matière</a></div>
            {{ $matieres->links() }}
        </div>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr class="table-dark text-uppercase">
                    {{-- <th scope="col">Code</th> --}}
                    <th scope="col">intitule</th>
                    <th scope="col">Quota</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Enseignant</th>
                    <th scope="col">Niveau</th>
                    <th scope="col">Prix</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matieres as $matiere)
                <tr>
                    {{-- <td scope="row">{{$matiere->code}}</td> --}}
                    <td>{{$matiere->intitule}}</td>
                    <td>{{$matiere->quota}}</td>
                    <td>S {{$matiere->semestre}}</td>
                    <td>{{$matiere->enseignants->nom}} {{$matiere->enseignants->prenom}}</td>
                    @foreach ($cycles as $cycle)
                        @if ($matiere->niveau->cycle_id == $cycle->id)
                            <td scope="row">{{$cycle->code}} {{$matiere->niveau->numero}}</td>
                        @endif
                    @endforeach
                    <td>{{$matiere->PU}}</td>
                    <td class="fw-bold">
                        <a href="{{ route('EditMatiere', ['matiere'=>$matiere->id]) }}" class="btn btn-primary"><img src="{{ asset('img/update.png') }}" alt="">Editer</a>
                        <a href="#" class="btn btn-danger offset-2" onclick="if(confirm('voulez vous supprimer cette affectation de cour?')){
                            document.getElementById('form-{{$matiere->id}}').submit()
                        }"><img src="{{ asset('img/delete.png') }}" alt="">Supprimer</a>

                        <!-- creation d'un formulaire pour envoyer une requete de type delete  !-->
                        <form id="form-{{$matiere->id}}" action="{{ route('DeleteMatiere',['matiere'=>$matiere->id]) }}" method="POST">
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

