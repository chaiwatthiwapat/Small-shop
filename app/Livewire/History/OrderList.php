<?php

namespace App\Livewire\History;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderList extends Component
{
    public $orders;

    public function mount() {
        $this->orders = Order::select('id', 'order_code', 'grand_total', 'status')
            ->where('user_id', Auth::id())
            ->latest()->get();
    }

    public function render()
    {
        return view('livewire.history.order-list', ['orders' => $this->orders]);
    }
}
