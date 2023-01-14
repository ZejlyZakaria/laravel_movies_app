@extends('layouts.main')

@section('content')
    <style>
        .tv-card-img {
            width: 100%;
            height: 75%;
        }

        .tv-card-img img {
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
    <div class="popular-tvshow container mx-auto px-4 pt-8">
        {{-- ------------------------------- Popular Movies ------------------------------- --}}
        <div class="popular-tvshow">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-bold">Popular Show</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-7 gap-6">
                @foreach ($popularTv as $tvShow)
                    <x-tv-card :tvShow="$tvShow" :genres="$genres"/>
                @endforeach
            </div>
        </div>

        {{-- ------------------------------- now playing Movies ------------------------------- --}}
        <div class="top-rated-shows py-6 mt-8">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-bold">Top Rated Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-7 gap-6">
                @foreach ($topRatedTv as $tvShow)
                    <x-tv-card :tvShow="$tvShow" :genres="$genres"/>
                @endforeach
            </div>
        </div>
    </div>
@endsection

