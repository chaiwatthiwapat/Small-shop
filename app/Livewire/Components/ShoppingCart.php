<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\OrderItem;
use App\Models\DeliveryService;

class ShoppingCart extends Component
{
    public $total, $grandTotal, $deliveryId, $address;
    public $items, $deliveryService;

    public function mount() {
        $this->setData();
    }

    public function setData() {
        $this->items = OrderItem::select('id', 'usercode', 'product_id', 'quantity', 'total_amount')
            ->where('usercode', session('usercode'))->where('order_id', NULL)->get();

        $this->total = $this->items->pluck('total_amount')->sum();
        $this->grandTotal = $this->total;
        $this->deliveryService = DeliveryService::select('id', 'name', 'cost')->get();
    }

    public function DeliveryServiceChange() {
        $delivery = DeliveryService::select('cost')->find($this->deliveryId);

        if($delivery) {
            $this->grandTotal = $this->total + $delivery->cost;
        }
    }

    public function changeQty($id, $event) {
        try {
            $order = OrderItem::find($id);
            $totalAmount = $order->product->price;

            if($order) {
                if($event == '-') {
                    if($order->quantity > 1) {
                        $qty = $order->quantity - 1;
                        $order->update([
                            'quantity' => $qty,
                            'total_amount' => $totalAmount * $qty,
                        ]);
                    }
                }
                else {
                    $qty = $order->quantity + 1;
                    $order->update([
                        'quantity' => $qty,
                        'total_amount' => $totalAmount * $qty,
                    ]);
                }
            }

            $this->setData();
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function deleteFromCart($id) {
        try {
            $model = OrderItem::find($id);

            if($model) {
                $model->delete();

                $this->setData();
                $this->dispatch('updateCountCart');
            }
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function render()
    {
        if($this->deliveryId != '') {
            $this->DeliveryServiceChange();
        }

        return view('livewire.components.shopping-cart', [
            'items' => $this->items,
            'deliveryService' => $this->deliveryService
        ]);
    }
}
