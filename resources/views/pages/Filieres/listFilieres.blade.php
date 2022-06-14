@extends('layouts.master', ['title' => 'liste des filieres'])

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
            <div class="offset-1"><a class="btn btn-outline-success fw-bold" href="{{ route('FormFilieres') }}"><img src="{{ asset('img/add.png') }}" alt="">Nouvelle Filiere</a></div>
            <div>{{ $liste->links() }}</div>
        </div>
        <div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="table-dark text-uppercase">
                        <th scope="col">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">intitule</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($liste as $liste)
                    <tr>
                        <td scope="row">{{$loop->index + 1}}</td>
                        <td>{{$liste->code}}</td>
                        <td>{{$liste->intitule}}</td>
                        <td class="fw-bold">
                            <a href="{{ route('EditFilieres', ['filiere'=>$liste->id]) }}" class="btn btn-primary offset-1"><img src="{{ asset('img/update.png') }}" alt="">Editer</a>
                            <a href="#" class="btn btn-danger offset-3" onclick="if(confirm('Etes vous sur de vouloir supprimer cette Filiere ?')){
                                document.getElementById('form-{{$liste->id}}').submit()
                            }"><img src="{{ asset('img/delete.png') }}" alt="">Supprimer</a>

                            <!-- creation d'un formulaire pour envoyer une requete de type delete  !-->
                            <form id="form-{{$liste->id}}" action="{{ route('DeleteFilieres',['filiere'=>$liste->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
