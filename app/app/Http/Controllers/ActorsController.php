<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ViewModels\ActorsViewModel;
use App\ViewModels\ActorViewModel;


class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        $popularActors = Http::get("http://api.themoviedb.org/3/person/popular?api_key=4d173b8ea31d76212a176dfd93996c60&page=".$page)
        ->json()['results'];

        $viewModel = new ActorsViewModel($popularActors, $page);
        return view('actors.index', $viewModel);
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
        $actor = Http::get("http://api.themoviedb.org/3/person/".$id."?api_key=4d173b8ea31d76212a176dfd93996c60")
            ->json();

        $social = Http::get("http://api.themoviedb.org/3/person/".$id."/external_ids?api_key=4d173b8ea31d76212a176dfd93996c60")
            ->json();

        $knownFor = Http::get("http://api.themoviedb.org/3/person/".$id."/external_ids?api_key=4d173b8ea31d76212a176dfd93996c60")
            ->json();

        $credits = Http::get("http://api.themoviedb.org/3/person/".$id."/combined_credits?api_key=4d173b8ea31d76212a176dfd93996c60")
            ->json();

        $viewModel = new ActorViewModel($actor, $social, $credits);

        return view('actors.show',$viewModel);
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
