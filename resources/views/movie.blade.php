@extends('base.base')

@if(session('warning'))
    <div id="warning-alert" class="fixed mx-auto mt-4 w-1/3 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-md" role="alert">
        <div class="flex justify-between items-center">
            <span>{{ session('warning') }}</span>
            <button onclick="document.getElementById('warning-alert').remove()" class="text-red-700 hover:text-red-900 font-bold ml-4">
                &times;
            </button>
        </div>
    </div>
@endif

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
<h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl text-center my-3">{{$movie['movie_title']}}</h1>
<a href="/movies" class="rounded-md bg-indigo-600 px-2 py-2 text-sm mx-1 font-semibold hover:bg-indigo-400 text-white">Back to Menu</a>
<h4 class="text-xl font-semibold text-gray-900 my-1">Details:</h4>
<p class="text-l text-gray-900 my-1">
    Duration: {{$movie['duration']}} minutes <br>
    Release date: {{$movie['release_date']}}
</p>
<h4 class="text-xl font-semibold text-gray-900 my-2">Booked list:</h4>
<table class="border-collapse table-auto w-full text-md">
    <thead class="bg-white">
        <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-gray-900 dark:text-slate-200 text-left">Customer name</th>
        <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-gray-900 dark:text-slate-200 text-left">Seat number</th>
        <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-gray-900 dark:text-slate-200 text-left">Check in status</th>
        <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-gray-900 dark:text-slate-200 text-left">Action</th>
    </thead>
    <tbody class="bg-white">
        @foreach ($tickets as $ticket)
        <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-gray-800 dark:text-slate-400">{{$ticket['customer_name']}}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-gray-800 dark:text-slate-400">{{$ticket['seat_number']}}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-gray-800 dark:text-slate-400">@if ($ticket['is_checked_in'] == 0)
                Not checked in yet
            @else
                Checked in
            @endif</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-gray-800 dark:text-slate-400">
                <form action="{{route('ticket.checkin', $ticket->id)}}" method="POST" style="display: inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="rounded-md bg-indigo-600 px-2 py-2 text-sm mx-1 font-semibold hover:bg-indigo-400 text-white">Check in</button>
                </form>
                <form action="{{route('ticket.delete', $ticket->id)}}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-md bg-indigo-600 px-2 py-2 text-sm mx-1 font-semibold hover:bg-indigo-400 text-white">Cancel book</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection