<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductDetail extends Component
{
    public $product, $buttonAddCart = 'เพิ่มลงตะกร้า';

    public function mount($id) {
        $this->product = Product::find($id);

        if(!$this->product) {
            if(Auth::check() && Auth::user()->usertype == 'admin') {
                return $this->redirect(route('admin.product.index'), navigate:true);
            }
            else {
                return $this->redirect(route('product.index'), navigate:true);
            }
        }
    }

    public function addCart($productId) {
        if(Auth::check()) {

        }
        else {
            $product = Product::find($productId);
            if(!$product) {
                return $this->redirect(route('product.index'), navigate:true);
            }

            $checkOrderItem = OrderItem::where('order_id', NULL)
                ->where('usercode', session('usercode'))
                ->where('product_id', $productId)
                ->first();

            if(!$checkOrderItem) {
                OrderItem::create([
                    'usercode' => session('usercode'),
                    'product_id' => $productId,
                    'total_amount' => $product->price,
                ]);
            }

            $this->buttonAddCart = 'เพิ่มลงตะกร้าแล้ว';
            $this->dispatch('updateCountCart');
        }
    }

    public function render()
    {
        return view('livewire.components.product-detail', [$this->product]);
    }
}
