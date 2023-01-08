<div class="flex justify-center items-center">
    <div class="w-[11rem] h-[20rem] mt-6  p-2 bg-gray-700 rounded-lg ">
        <a href="{{route('movies.show', $movie['id'])}}">
            <div class="movie-card-img">
                <img src={{ $movie['poster_path'] }} alt="" />
            </div>
        </a>
        <div class="mt-2">
            <a href="{{route('movies.show', $movie['id'])}}" class="text-md mt-2 hover:text-gray:300 one-line font-semibold" ">{{ $movie['title'] }}</a>
                <div class="flex items-center text-gray-400 text-sm mt-1">
                    <span><i class='bx bxs-star text-orange-500'></i></span>
                    <div class="one-line">
                        <span class="ml-1">{{ $movie['vote_average'] }}</span>
                        <span class="mx-2">|</span>
                        <span>{{ $movie['release_date']}}</span>
                    </div>
                </div>
                <div class="text-gray-400 text-xs one-line font-weight-600 mt-1" style="font-weight: 600">
                    {{ $movie['genres'] }}
                </div>
        </div>
    </div>
</div>
