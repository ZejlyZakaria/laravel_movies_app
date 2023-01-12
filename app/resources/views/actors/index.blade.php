@extends('layouts.main')

@section('content')
    <style>
        .actor-card {
            width: 100%;
            max-width: 200px;
            max-height: 280px;
        }

        .actor-card-img {
            width: 90%;
            min-width: 9rem;
            height: 70%;
            min-height: 13.5rem;
            max-height: 270px;
        }

        img {
            border-radius: 8px;
            width: 100%;
            height: 100%;
            object-fit: cover;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .actor-info {
            width: 90%;
            min-width: 9rem;
        }

        .one-line {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
    </style>


    <div class="popular-actors mx-auto pt-8 py-2">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-bold">Popular Actors</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-7 gap-6 mb-10">
            @foreach ($popularActors as $actor)
                <div class="actor-card-container mt-6 flex justify-center">
                    <div class="actor-card">
                        <div class="actor-card-img">
                            @if (strlen($actor['profile_path']) > 35)
                                <img src="{{ $actor['profile_path'] }}" alt="" />
                            @else
                                <img src='https://ui-avatars.com/api/?name={{ $actor['name'] }}' alt="">
                            @endif
                        </div>
                        <div class="actor-info mt-2">
                            <div class="text-md font-semibold">{{ $actor['name'] }}</div>
                            <div class="text-gray-400 text-sm one-line font-weight-600 mt-1 one-line">
                                {{ $actor['known_for'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="flex justify-between mb-6">
        @if ($previous)
            <a href="/actors/page/{{ $previous }}">
                <div class="pt-1 pb-1 pr-3 pl-3 flex justify-center border-solid border-2 border-orange-500"
                    style="border-radius : 8px">
                    <i class='bx bx-left-arrow-alt text-orange-500' class="font-extrabold" style="font-size: 25px"></i>
                </div>
            </a>
        @else
            <div></div>
        @endif
        @if ($next)
            <a href="/actors/page/{{ $next }}">
                <div class="pt-1 pb-1 pr-3 pl-3 flex justify-center border-solid border-2 border-orange-500"
                    style="border-radius : 8px">
                    <i class='bx bx-right-arrow-alt text-orange-500' class="font-extrabold" style="font-size: 25px"></i>
                </div>
            </a>
        @else
            <div></div>
        @endif
    </div>
    </div>
@endsection
