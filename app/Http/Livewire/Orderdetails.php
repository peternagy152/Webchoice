<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Orderdetails extends Component
{
    public $order_details;
    public function mount($order_details)
    {
        $this->order_details = $order_details;

    }
    public function render()
    {
        $all_order_details = DB::table('orderitems')
        ->where('order_id' , $this->order_details)
        ->get();

        return view('livewire.orderdetails' , ['all_order_details' => $all_order_details])->layout('headerfooter');
    }
}
