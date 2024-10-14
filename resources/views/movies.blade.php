@extends('base.base')

@section('title')
    {{$title}}
@endsection

@if(session('success'))
    <div id="success-alert" class="fixed mx-auto mt-4 w-1/3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-md" role="alert">
        <div class="flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <button onclick="document.getElementById('success-alert').remove()" class="text-green-700 hover:text-green-900 font-bold ml-4">
                &times;
            </button>
        </div>
    </div>
@endif

@section('content')
<div class="container my-4 mx-auto grid grid-cols-1 md:grid-cols-3 gap-4">
    @foreach ($movies as $movie)
        <div class="bg-white dark:bg-slate-800 rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl">
            <h3 class="text-slate-900 dark:text-white mt-5 text-3xl font-medium tracking-tight">{{$movie['movie_title']}}</h3>
            <h3 class="text-slate-900 dark:text-white mt-2 text-base font-medium tracking-tight">Duration: {{$movie['duration']}} minutes</h3>
            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">
            Release Date: {{$movie['release_date']}}
            </p>
            <div class="mt-10 flex items-center justify-center">
                <a href="{{ route('movie.view', $movie->id) }}" class="rounded-md bg-indigo-600 px-3 py-3 text-sm mx-1 font-semibold hover:bg-indigo-400 text-white">Booked List</a>
                <a href="{{ route('movie.create', $movie->id) }}" class="rounded-md bg-indigo-600 px-3 py-3 text-sm mx-1 font-semibold hover:bg-indigo-400 text-white">Add Viewer</a>
            </div>
        </div>
    @endforeach
</div>
@endsection