<?php

namespace App\Http\Livewire;

use App\Models\category;
use Livewire\Component;

class Headersearchcomponents extends Component
{
    public function render()
    {
        $cat = category::get();
        return view('livewire.headersearchcomponents' , ['cat' => $cat]);
    }
}
