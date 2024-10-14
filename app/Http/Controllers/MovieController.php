<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
   public function index() {
        $movies = Movie::all();
        return view('movies', ['movies' => $movies, 'title' => 'Movie List']);
   }

   public function show(Movie $movie) {
        $movie->load(['tickets']);
        return view('movie',
        ['movie' => $movie,
        'tickets' => $movie->tickets,
   ]);
   }
}
