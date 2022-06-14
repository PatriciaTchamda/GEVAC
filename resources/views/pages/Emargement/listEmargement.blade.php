@extends('layouts.master', ['title' => 'Liste des Emargements'])

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
            <div class="offset-1"><a class="btn btn-outline-success fw-bold" href="{{ route('listEmarger') }}"><img src="{{ asset('img/add.png') }}" alt="">Emarger</a></div>
            {{ $matieres->links() }}
        </div>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr class="table-dark text-uppercase">
                    <th scope="col">Enseignant</th>
                    <th scope="col">Matière</th>
                    <th scope="col">Niveau</th>
                    <th scope="col">Heure Debut</th>
                    <th scope="col">Heure Fin</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emarger as $emarger)
                <tr>
                    <td>{{$emarger->matieres->enseignants->nom}} {{$emarger->matieres->enseignants->prenom}}</td>
                    <td>{{$emarger->matieres->intitule}}</td>
                    @foreach ($cycles as $cycle)
                        @if ($emarger->matieres->niveau->cycle_id == $cycle->id)
                            <td scope="row">{{$cycle->code}} {{$emarger->matieres->niveau->numero}}</td>
                        @endif
                    @endforeach
                    <td>{{$emarger->heureDebut}}</td>
                    <td>{{$emarger->heureFin}}</td>
                    <td class="fw-bold">
                        <a href="{{ route('editEmargement', ['emargement'=>$emarger->id]) }}" class="btn btn-primary offset-1"><img src="{{ asset('img/update.png') }}" alt="">Editer</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

