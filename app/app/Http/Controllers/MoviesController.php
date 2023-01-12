<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // with viewModel
    public function index()
    {
        //get popular movie api
        $popularResponse = Http::get("http://api.themoviedb.org/3/movie/popular?api_key=4d173b8ea31d76212a176dfd93996c60")
            ->json()['results'];
        $popularMovies = array_slice($popularResponse, 0, 14);

        //get popular movie api
        $nowPlayingResponse = Http::get("http://api.themoviedb.org/3/movie/now_playing?api_key=4d173b8ea31d76212a176dfd93996c60")
            ->json()['results'];
        $nowPlayingMovies = array_slice($nowPlayingResponse, 6, 14);

        //get movies genre
        $genres = Http::get("http://api.themoviedb.org/3/genre/movie/list?api_key=4d173b8ea31d76212a176dfd93996c60")
        ->json()['genres'];

        $viewModel = new MoviesViewModel($popularMovies, $nowPlayingMovies, $genres);

        return view('movies.index', $viewModel);


        // dump($nowPlayingMovies);

        // ---------------------- before view models--------------------
        // return view('index', [
        //     'popularMovies' => $popularMovies,
        //     'nowPlayingMovies' =>$nowPlayingMovies,
        //     'genres' => $genres
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // without viewModel
    public function show($id)
    {
        $movie = Http::get("http://api.themoviedb.org/3/movie/{$id}?api_key=4d173b8ea31d76212a176dfd93996c60")
            ->json();

        $credit = Http::get("http://api.themoviedb.org/3/movie/{$id}/credits?api_key=4d173b8ea31d76212a176dfd93996c60")
            ->json();

        $video = Http::get("http://api.themoviedb.org/3/movie/{$id}/videos?api_key=4d173b8ea31d76212a176dfd93996c60")
            ->json();

        return view('movies.show',[
            "movie" => $movie,
            "credit" => $credit,
            "video" => $video,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
