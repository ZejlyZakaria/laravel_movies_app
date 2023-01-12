@extends('layouts.main')

@section('content')
    <style>
        .movie-card-img {
            width: 100%;
            height: 72%;
        }

        .movie-card-img img {
            border-radius: 8px;
            width: 100%;
            height: 100%;
            object-fit: cover;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .category {
            margin-top: 5px;
            font-weight: 600;
        }

        .one-line {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
    </style>
    <div class="popular-movies mx-auto pt-8 py-4">
        {{-- ------------------------------- Popular Movies ------------------------------- --}}
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-bold">Popular Movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-7 gap-6">
                @foreach ($popularMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres"/>
                @endforeach
            </div>
        </div>

        {{-- ------------------------------- now playing Movies ------------------------------- --}}
        <div class="now-playing-movies py-6 mt-8">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-bold">Now Playing Movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-7 gap-6">
                @foreach ($nowPlayingMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres"/>
                @endforeach
            </div>
        </div>
    </div>
@endsection
