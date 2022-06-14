@extends('layouts.master', ['title' => 'Emargement des Enseignants'])

@section('content')
    @if (session()->has("succesDelete"))
        <h3 class="alert alert-success">{{ session()->get("succesDelete") }}</h3>
    @endif

    <!--pour afficher le message de succes apres l'enregistrement !-->
    @if (session()->has("Termine"))
        <h3 class="alert alert-success">{{ session()->get("Termine") }}</h3>
    @endif

    <!--pour afficher le message de succes apres l'enregistrement !-->
    @if (session()->has("success"))
        <h3 class="alert alert-success">{{ session()->get("success") }}</h3>
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
            {{ $matieres->links() }}
        </div>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr class="table-dark text-uppercase">
                    <th scope="col">Enseignant</th>
                    <th scope="col">Matière</th>
                    <th scope="col">Specialite</th>
                    <th scope="col">Niveau</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matieres as $matiere)
                <tr>
                    <td>{{$matiere->enseignants->nom}} {{$matiere->enseignants->prenom}}</td>
                    <td>{{$matiere->intitule}}</td>
                    @foreach ($matiereSpecialites as $matiereSpecialite)
                        @if ($matiere->id == $matiereSpecialite->matieres_id)
                            @if ($matiereSpecialite->specialite->intitule != "")
                                <td scope="row">{{$matiereSpecialite->specialite->intitule}}</td>
                            @endif
                        @else
                        <td scope="row">Aucune spécialité défini</td>
                        @endif
                    @endforeach
                    @foreach ($cycles as $cycle)
                        @if ($matiere->niveau->cycle_id == $cycle->id)
                            <td scope="row">{{$cycle->code}} {{$matiere->niveau->numero}}</td>
                        @endif
                    @endforeach
                    <td class="fw-bold">
                        <a href="{{ route('formEmargement', ['matieres'=>$matiere->id]) }}" class="btn btn-primary"><img src="{{ asset('img/hand.png') }}" alt="">Emarger</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

