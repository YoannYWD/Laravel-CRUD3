<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    //Afficher les films
    public function index() {
        $films = DB::table('films')
            ->join('categories', 'films.categorie_id', '=', 'categories.id')
            ->select('films.id', 'films.nom', 'films.image', 'categories.nom as categorie')
            ->get();
        return view ('cinemovies.index', compact('films'));
    }

    //Créer un film
    public function create() {
        $categories = Categorie::all();
        return view('cinemovies.create', compact('categories'));
    }

    public function store(Request $request) {
        $imageName = "";
        if ($request->image) {
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        $newFilm = new Film;
        $newFilm->nom = $request->nom;
        $newFilm->image = '/images/' . $imageName;
        $newFilm->categorie_id = $request->categorie_id;
        $newFilm->save();

        return redirect()->route('cinemovies.index')
                         ->with('success', 'Film enregistré !')
                         ->with('image', $imageName);

    }
    

    //Editer un film
    public function edit($id) {
        $film = Film::findOrFail($id);
        $categories = Categorie::all();
        return view ('cinemovies.edit', compact('film', 'categories'));
    }

    public function update(Request $request, $id) {
        $updateFilm = $request->validate([
            'nom' => 'required'
        ]);
        $updateFilm = $request->except(['_token', '_method']);

        if ($request->image) {
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $updateFilm['image'] = '/images/' . $imageName;

        }
        
        Film::whereId($id)->update($updateFilm);
        return redirect()->route('cinemovies.index')
                         ->with('success', 'Film modifié !');
    }



    //Supprimer un personnage
    public function destroy($id) {
        $personnage = Film::findOrFail($id);
        $personnage->delete();
        return redirect()->route('cinemovies.index')
                         ->with('success', 'Film supprimé !');
    }



}
