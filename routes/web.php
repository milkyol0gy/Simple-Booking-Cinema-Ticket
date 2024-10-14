<?php

use Illuminate\Support\Facades\Route;
use App\Models\Movie;
use App\Models\Ticket;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movies', [MovieController::class, 'index']);

Route::get('/movies/view/{movie:id}', [MovieController::class, 'show'])->name('movie.view');

Route::get('/movies/book/{movie:id}', [TicketController::class, 'create'])->name('movie.create');

Route::post('/ticket/submit', [TicketController::class, 'insert'])->name('movie.insert');

Route::put('/ticket/checkin/{ticket:id}', [TicketController::class, 'checkin'])->name('ticket.checkin');

Route::delete('/ticket/delete/{ticket:id}', [TicketController::class, 'delete'])->name('ticket.delete');