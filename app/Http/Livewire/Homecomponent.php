<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Homecomponent extends Component
{
    public function render()
    {
        $items = DB::table('products')
        ->where('featured' , '1')
        ->get();
        return view('livewire.homecomponent' , ['items' =>$items])->layout('headerfooter');
    }
}
