@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-6 offset-3">
            <form method="POST" action="{{route('cinemovies.update', $film->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <div class="mb-3">
                  <label>Nom</label>
                  <input type="text" name="nom" class="form-control" placeholder="Nom du film" value="{{$film->nom}}">
                </div>
                <div class="mb-3">
                  <label>Catégorie</label>
                  <select class="form-select" name="categorie_id" value="{{$film->categorie_id}}">
                    <option disabled selected value>Choisissez une nouvelle catégorie</option>
                    @foreach ($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" name="image" value="{{$film->image}}">
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
@endsection