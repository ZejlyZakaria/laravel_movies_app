@extends('layouts.main')

@section('content')
<style>
    img {
        border-radius: 8px;
    }
</style>
    {{-- ------------------------- Movie Info ------------------------- --}}
    <div class="actor-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $actor['profile_path'] }}" alt="poster" class="w-72" />
                <ul class="flex items-center mt-4">
                        @if ($social['facebook'])
                            <li class="mr-4">
                                <a href="{{ $social['facebook']}}" title="Facebook"  target="_blank">
                                    <i class='bx bxl-facebook-square text-3xl'></i>
                                </a>
                            </li>
                        @endif
                        @if ($social['instagram'])
                            <li class="mr-4">
                                <a href="{{ $social['instagram']}}" title="instagram"  target="_blank">
                                    <i class='bx bxl-instagram text-3xl'></i>
                                </a>
                            </li>
                        @endif
                        @if ($social['twitter'])
                            <li class="mr-4">
                                <a href="{{ $social['twitter']}}" title="twitter"  target="_blank">
                                    <i class='bx bxl-twitter text-3xl' ></i>
                                </a>
                            </li>
                        @endif
                        @if ($actor['homepage'])
                            <li class="mr-4">
                                <a href="{{$actor['homepage']}}" title="homepage" target="_blank">
                                    <i class='bx bx-world text-3xl'></i>
                                </a>
                            </li>
                        @endif
                </ul>
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{ $actor['name'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-2">
                    <i class='bx bx-cake' style="font-size: 18px"></i>
                    <span class="ml-1">{{ $actor['birthday'] }} &nbsp ({{ $actor['age']}} years old) &nbsp in {{ $actor['place_of_birth']}}</span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $actor['biography'] }}
                </p>

                <h4 class="font-semibold mt-12 text-xl mb-6">Known For</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                    @foreach ($knownForMovies as $movie)
                    <div class="p-4">
                        <a href="{{ route('movies.show' ,$movie['id']) }}">
                            <img src="{{ $movie['poster_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150"></a>
                        <a href="{{ route('movies.show' ,$movie['id']) }}" class="text-md leading-normal block text-white hover:text-gray-400 mt-1">{{ $movie['title'] }}</a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- ----------------------End actor info --------------------------- --}}

    {{-- ------------------------- Credits ------------------------- --}}
    <div class="credits border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Credits</h2>
            <ul class="list-disc leading-loose pl-5 mt-8">
                @foreach ($credits as $credit)
                    <li>
                        {{ $credit['release_year'] }} &middot;
                        <strong><a href="{{ $credit['linkToPage'] }}" class="hover:underline">{{ $credit['title'] }}</a></strong>
                        as {{ $credit['character'] }}
                    </li>
                @endforeach

            </ul>
        </div>
    </div> <!-- end credits-->
@endsection
