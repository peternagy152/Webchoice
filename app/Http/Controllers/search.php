<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class search extends Controller
{
    public function store(Request $request)
    {
        $keyword = $request->input('search');

        $items = DB::table('products')
        ->where('name' , 'like' , $request->input('search'))
        ->get();
        return view('livewire.searchresult' , ['items' => $items , 'keyword' => $keyword]);
    }
}
