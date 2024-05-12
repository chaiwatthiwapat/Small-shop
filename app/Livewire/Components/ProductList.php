<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public $search;

    public function render()
    {
        if($this->search != '') {
            $products = Product::where('name', 'LIKE', "%$this->search%")->latest()->get();
        }
        else {
            $products = Product::latest()->get();
        }

        return view('livewire.components.product-list', ['products' => $products]);
    }
}
