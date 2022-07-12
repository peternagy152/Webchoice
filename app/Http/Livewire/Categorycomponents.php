<?php

namespace App\Http\Livewire;

use App\Models\category;
use App\Models\product;
use App\Models\product_category;
use Illuminate\Http\Request;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\DB;


class categorycomponents extends Component
{
    public $category_name ;

    public function mount($category_name)
    {
        $this->category_name = $category_name;

    }

    public function render()
    {
        if(Auth::check())
        {
            Cart::instance('cart')-store(Auth::user()->email);
        }


        $cat = category::get();
        $onlyselected = category::where('name' , $this->category_name) ->first();
        $items = product::get();
        $pct = product_category::get();
        return view('livewire.categorycomponents' , ['pct' => $pct , 'onlyselected' =>$onlyselected , 'items' => $items  , 'cat' => $cat])->layout('headerfooter');
    }

}
