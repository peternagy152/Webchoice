<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

use App\Models\order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserDashboardComponents extends Component
{
    public function mount(){

    }
    public function render()
    {
        $orders = DB::table('orders')
        ->where('user_id' , Auth::user()->id)
        ->get();

        return view('livewire.user.user-dashboard-components' , ['orders' => $orders])->layout('headerfooter');
    }
}
