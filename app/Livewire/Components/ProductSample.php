<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;

class ProductSample extends Component
{
    public $products, $take = 4;

    public function setData() {
        $this->products = Product::select('id', 'image', 'name', 'detail', 'price')->latest()->take($this->take)->get();
    }

    public function render()
    {
        $this->setData();

        return view('livewire.components.product-sample', ['products' => $this->products]);
    }
}
