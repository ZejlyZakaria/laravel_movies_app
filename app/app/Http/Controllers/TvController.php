<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ViewModels\TvViewModel;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularResponse = Http::get("http://api.themoviedb.org/3/tv/popular?api_key=4d173b8ea31d76212a176dfd93996c60")
            ->json()['results'];
        $popularTv = array_slice($popularResponse, 0, 22);

        //get popular movie api
        $topRatedResponse = Http::get("http://api.themoviedb.org/3/tv/top_rated?api_key=4d173b8ea31d76212a176dfd93996c60")
            ->json()['results'];
        $topRatedTv = array_slice($topRatedResponse, 0, 22);

        //get movies genre
        $genres = Http::get("http://api.themoviedb.org/3/genre/tv/list?api_key=4d173b8ea31d76212a176dfd93996c60")
        ->json()['genres'];

        $viewModel = new TvViewModel($popularTv, $topRatedTv, $genres);

        return view('tv.index', $viewModel);
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
    public function show($id)
    {
        $tvShow = Http::get("http://api.themoviedb.org/3/tv/{$id}?api_key=4d173b8ea31d76212a176dfd93996c60")
            ->json();

        $credit = Http::get("http://api.themoviedb.org/3/tv/{$id}/credits?api_key=4d173b8ea31d76212a176dfd93996c60")
            ->json();

        $video = Http::get("http://api.themoviedb.org/3/tv/{$id}/videos?api_key=4d173b8ea31d76212a176dfd93996c60")
            ->json();

        return view('tv.show',[
            "tvShow" => $tvShow,
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
