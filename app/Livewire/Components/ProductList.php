<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $search, $paginate = 20;
    public $categories, $category_id;

    public function categories() {
        return Category::all();
    }

    public function render()
    {
        if($this->search != '') {
            if($this->category_id == '') {
                $products = Product::select('id', 'image', 'name', 'detail', 'price')
                    ->where('name', 'LIKE', "%$this->search%")->latest()->paginate($this->paginate);
            }
            else {
                $products = Product::select('id', 'image', 'name', 'detail', 'price')
                    ->where('category_id', $this->category_id)
                    ->where('name', 'LIKE', "%$this->search%")->latest()->paginate($this->paginate);
            }
        }
        else {
            if($this->category_id != '') {
                $products = Product::select('id', 'image', 'name', 'detail', 'price')
                    ->where('category_id', $this->category_id)
                    ->latest()->paginate($this->paginate);
            }
            else {
                $products = Product::select('id', 'image', 'name', 'detail', 'price')->latest()->paginate($this->paginate);
            }
        }

        $this->categories = $this->categories();

        return view('livewire.components.product-list', [
            'products' => $products,
            'categories' => $this->categories,
        ]);
    }
}
