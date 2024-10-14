@extends('base.base')

@section('title')
    {{$title}}
@endsection

@section('content')
<div class="container my-4 mx-auto">
    <form action="{{ route('movie.insert') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="border-b border-gray-200 pb-3">
            <h2 class="text-3xl font-semibold text-gray-700">Input New Customer</h2>
            
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="movie_title" class="block text-lg font-medium leading-6 text-gray-900">Movie Title</label>
                    <div class="mt-2">
                        <input type="text" name="movie_title" id="movie_title" value="{{ $movie['movie_title'] }}" class="@error('movie_title') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" disabled>
                        <input type="hidden" name="movie_id" id="movie_id" value="{{ $movie['id'] }}" class="@error('movie_id') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" readonly>
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="customer_name" class="block text-lg font-medium leading-6 text-gray-900">Customer Name</label>
                    <div class="mt-2">
                        <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" class="@error('customer_name') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('customer_name')
                            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="seat_number" class="block text-lg font-medium leading-6 text-gray-900">Seat Number</label>
                    <div class="mt-2">
                        <input type="text" name="seat_number" id="seat_number" maxlength="5" value="{{ old('seat_number') }}" class="@error('seat_number') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('seat_number')
                            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/movies" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </div>
    </form>
</div>  
@endsection