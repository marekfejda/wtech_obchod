<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function index(Request $request)
    {

        $films = Film::orderBy('id', 'asc')->simplePaginate(10);
        return view('films.index')->with('films', $films);
    }

    public function show($id)
    {
        $film = Film::findOrFail($id); // ak neexistuje, vyhodí 404
        return view('films.show', compact('film'));
    }
}


