<?php

namespace App\Http\Livewire;

use App\Models\product;
use App\Models\product_image;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Detailscomponents extends Component
{
    public $product_details;
    public function mount($product_details)
    {
        $this->product_id =  $product_details;

    }
    public function render()
    {
        $item = product::where('id' , $this->product_id)->first();
        $images = DB::table('product_images')
        ->where('product_id' , $this->product_id)
        ->get();

        return view('livewire.detailscomponents' , ['item'=> $item , 'images' => $images])->layout('headerfooter');
    }
}
