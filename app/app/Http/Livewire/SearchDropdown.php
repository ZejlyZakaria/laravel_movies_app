<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = "";

    public function render()
    {
        $searchResults = [];
        if(strlen($this->search >= 2)){
            $searchResults = Http::get("http://api.themoviedb.org/3/search/movie?api_key=4d173b8ea31d76212a176dfd93996c60&query=".$this->search)
            ->json()['results'];
        }

        return view('livewire.search-dropdown',[
            "searchResults" => collect($searchResults)->take(7)
        ]);
    }
}
