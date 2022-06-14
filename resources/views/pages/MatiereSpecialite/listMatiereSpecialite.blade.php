@extends('layouts.master', ['title' => 'liste des matieres des specialites'])

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
            <div class="offset-1"><a class="btn btn-outline-success fw-bold" href="{{ route('CreateMatiereSpecialite') }}"><img src="{{ asset('img/add.png') }}" alt="">Affecter une matiere à une specialite</a></div>
            <div class="offset-5">{{ $liste->links() }}</div>
            <div></div>
        </div>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr class="table-dark text-uppercase">
                    <th scope="col">#</th>
                    <th scope="col">Specialite</th>
                    <th scope="col">Matiere</th>
                    <th scope="col" class=" text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($liste as $liste)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    @foreach ($specialite as $specialite)
                        @if ($liste->specialite_id == $specialite->id)
                            <td>{{$specialite->intitule}}</td>
                        @endif
                    @endforeach

                    @foreach ($matiere as $matiere)
                        @if ($liste->matieres_id == $matiere->id)
                            <td>{{$matiere->intitule}}</td>
                        @endif
                    @endforeach

                    <td class="fw-bold">
                        <a href="{{ route('EditMatiereSpecialite', ['matiereSpecialite'=>$liste->id]) }}" class="btn btn-primary offset-1"><img src="{{ asset('img/update.png') }}" alt="">Modifier</a>
                        <a href="#" class="btn btn-danger offset-5" onclick="if(confirm('voulez vous supprimer la matiere dans cette Specialite?')){
                            document.getElementById('form-{{$liste->id}}').submit()
                        }"><img src="{{ asset('img/delete.png') }}" alt="">Supprimer</a>

                        <!-- creation d'un formulaire pour envoyer une requete de type delete  !-->
                        <form id="form-{{$liste->id}}" action="{{ route('DeleteMatiereSpecialite',['matiereSpecialite'=>$liste->id]) }}" method="POST">
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
