<?php

namespace App\Livewire\Components;

use App\Models\OrderItem;
use Livewire\Component;
use Livewire\Attributes\On;

class Navbar extends Component
{
    public $countCart;

    public function mount() {
        $this->countCart = OrderItem::where('order_id', NULL)
            ->where('usercode', session('usercode'))->count();
    }

    #[On('updateCountCart')]
    public function updateCountCart() {
        $this->countCart = OrderItem::where('order_id', NULL)
            ->where('usercode', session('usercode'))->count();
    }

    public function render()
    {
        return view('livewire.components.navbar');
    }
}
