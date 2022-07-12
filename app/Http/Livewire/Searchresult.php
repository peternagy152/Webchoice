<?php

namespace App\Http\Livewire;

use App\Models\category;
use App\Models\product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Searchresult extends Component
{
    public $keyword;
    public function mount($keyword)
    {
        $this->keyword = $keyword;
    }

    public function render()
    {
        $cat = category::get();

       $items = DB::table('products')
       ->where('name' , 'like' , '%'. $this->keyword .'%')
       ->get();

        return view('livewire.searchresult',['items' =>$items , 'cat'=>$cat])->layout('headerfooter');
    }
}
