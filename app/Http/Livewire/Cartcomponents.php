<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;

class Cartcomponents extends Component
{
    public function Empty_cart()
    {
        Cart::destroy();
        return redirect()->route('home');
    }
    public function Remove_item($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart');
    }
    public function IncreaseQty($rowId)
    {
        $item = Cart::get($rowId);
      $qty = $item->qty + 1 ;
      Cart::update($rowId,$qty);

    }
    public function DecreaseQty($rowId)
    {
        $item = Cart::get($rowId);
        $qty = $item->qty - 1 ;
        Cart::update($rowId,$qty);
    }
    public function render()
    {

        return view('livewire.cartcomponents')->layout('headerfooter');
    }
}
