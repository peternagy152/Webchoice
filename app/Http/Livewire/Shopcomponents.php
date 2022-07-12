<?php

namespace App\Http\Livewire;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Shopcomponents extends Component
{
    public $sorting ;
    public $pagesize ;

    public function mount()
    {
        $this->sorting = 'default';
        $this-> pagesize = 12 ;

    }
    public function store($product_id )
    {


       $item = DB::table('products')
       ->where('id' , $product_id)
       ->first();
        Cart::add($product_id, $item -> name , 1,$item->price)->associate('App\Models\product');
        session()->flash('success_message' , 'item Added in Cart');
        return redirect()->route('cart');

    }

    public function render()
    {

        $cat = category::get();
        if($this->sorting == 'date')
        {
            $items = product::orderBy('created_at' , 'Desc') -> paginate($this->pagesize);
        }
        elseif ($this->sorting == 'price')
        {
            $items = product::orderBy('price' , 'ASC')-> paginate($this->pagesize);
        }
        elseif ($this->sorting == 'pricehigh')
        {
            $items = product::orderBy('price' , 'Desc')-> paginate($this->pagesize);
        }
        else {
            $items = product::paginate($this->pagesize);

        }

        return view('livewire.shopcomponents' , ['items' => $items , 'cat' => $cat])->layout('headerfooter');
    }


}
