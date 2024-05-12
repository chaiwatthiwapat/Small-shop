<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;

class ProductSample extends Component
{
    public $take = 4;

    public function render()
    {
        $products = Product::latest()->take($this->take)->get();

        return view('livewire.components.product-sample', ['products' => $products]);
    }
}
