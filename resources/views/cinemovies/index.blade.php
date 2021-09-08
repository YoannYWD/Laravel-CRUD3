@extends('layout')

@section('content')

<div class="container mt-5">
    <div class="row">

            <h1 class="text-center">Liste des films</h1>
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br />
            @endif
            
            <a href="{{route('cinemovies.create')}}" class="btn btn-primary">Ajouter un film</a>


            @foreach($films as $film)
            <div class="col-3 mt-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{$film->image}}" class="card-img-top" alt="Image de {{$film->nom}}" style="height: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$film->nom}}</h5>
                        <p>#{{$film->id}}</p>
                        <p>{{$film->categorie}}</p>
                        <form action="{{route('cinemovies.destroy', $film->id)}}" method="POST">
                                <a href="{{route('cinemovies.edit', $film->id)}}" class="btn btn-primary">Editer</a>
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</a>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        
    </div>
</div>

@endsection