@extends('layouts.main')

@section('content')
    <style>
        .movie-card-img {
            width: 100%;
            height: 90%;
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

        .two-lines {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
    </style>
    {{-- ------------------------- Movie Info ------------------------- --}}
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-8 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src={{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }} alt="poster" class="w-72" />
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{$movie['title']}}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-2">
                    <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24">
                        <g data-name="Layer 2">
                            <path
                                d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                                data-name="star" />
                        </g>
                    </svg>
                    <span class="ml-1">{{ $movie['vote_average'] * 10 . '%' }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M,d Y') }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($movie['genres'] as $genre)
                        {{ $genre['name'] }} @if (!$loop->last),
                        @endif
                    @endforeach
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{$movie['overview']}}
                </p>

                <div class="mt-8">
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex mt-4">
                        @foreach ( $credit['crew'] as $crew )
                            @if ($loop->index < 3)
                            <div class="mr-8">
                                <div>{{$crew['name']}}</div>
                                <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                @if (count($video['results']) > 0)
                    <div class="mt-8">
                        <a href="http://www.youtube.com/watch?v={{$video['results'][0]['key']}}"
                            class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-4 py-3 hover:bg-orange-600 transition ease-in-out duration-150">
                            <svg class="w-6 fill-current" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                            </svg>
                            <span class="ml-2">Play Trailer</span>
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>
    {{-- ----------------------End movie info --------------------------- --}}

    {{-- ------------------------- Movie cast ------------------------- --}}
    <div class="movie-cast px-8">
        <h2 class="tracking-wider text-white text-3xl font-bold mt-8">Cast</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-7 gap-6 mb-10">
            @foreach ( $credit['cast'] as $cast )
                @if ($loop->index < 7)
                    <div class="flex justify-center items-center">
                        <div class="w-[9rem] h-[15rem] mt-6  rounded-lg ">
                            <a href="">
                                <div class="movie-card-img">
                                    <img src="{{'https://image.tmdb.org/t/p/w500/' . $cast['profile_path']}}" alt="" />
                                </div>
                            </a>
                            <div class="mt-2">
                                <a href="" class="text-md mt-2 hover:text-gray:300 two-lines font-semibold" ">{{$cast['original_name']}}</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
