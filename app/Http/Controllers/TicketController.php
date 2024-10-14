<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Ticket;
use Carbon\Carbon;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create(Movie $movie) {
        return view('create', ['movie' => $movie, 'title' => 'Add Viewer']);
    }

    public function insert(Request $req) {
        $req->validate([
            'movie_id' => 'required',
            'customer_name' => 'required|string|max:100',
            'seat_number' => 'required|string|max:5|unique:tickets'
        ],
        [
            'customer_name.required' => 'Nama pelanggan wajib diisi',
            'seat_number.required' => 'Nomor kursi wajib diisi',
            'seat_number.unique' => 'Nomor kursi sudah digunakan',
            'seat_number.size' => 'Nomor kursi maksimal sepanjang 5 char'
        ]);

        $ticket = new Ticket;

        $ticket->movie_id = $req->movie_id;
        $ticket->customer_name = $req->customer_name;
        $ticket->seat_number = $req->seat_number;

        $ticket->save();

        return redirect('/movies')->with('success', 'Customer berhasil ditambahkan');
    }

    public function checkin(Ticket $ticket) {
        $checked = Ticket::findOrFail($ticket->id);

        $checked->is_checked_in = true;
        $checked->check_in_time = Carbon::now();

        $checked->save();

        return redirect()->back()->with('success', 'Check in berhasil!');
    }

    public function delete(Ticket $ticket) {
        if ($ticket->is_checked_in == 0) {
            $ticket->delete();
            return redirect()->back()->with('success', 'Ticket deleted successfully!');
        }
        else {
            return redirect()->back()->with('warning', 'Cannot delete ticket, customer has already checked in!');
        };
    }
}
