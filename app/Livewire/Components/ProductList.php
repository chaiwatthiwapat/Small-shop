<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public $search, $products;

    public function setData() {
        if($this->search != '') {
            $this->products = Product::select('id', 'image', 'name', 'detail', 'price')
                ->where('name', 'LIKE', "%$this->search%")->latest()->get();
        }
        else {
            $this->products = Product::select('id', 'image', 'name', 'detail', 'price')->latest()->get();
        }
    }

    public function render()
    {
        $this->setData();

        return view('livewire.components.product-list', ['products' => $this->products]);
    }
}
