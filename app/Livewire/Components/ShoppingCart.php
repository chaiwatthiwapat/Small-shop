<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\OrderItem;
use App\Models\DeliveryService;

class ShoppingCart extends Component
{
    public $total, $grandTotal, $deliveryId;
    public $items, $deliveryService;

    public function mount() {
        $this->getData();
    }

    public function getData() {
        $this->items = OrderItem::where('usercode', session('usercode'))->where('order_id', NULL)->get();
        $this->total = $this->items->pluck('total_amount')->sum();
        $this->grandTotal = $this->total;
        $this->deliveryService = DeliveryService::all();
    }

    public function DeliveryServiceChange() {
        $delivery = DeliveryService::find($this->deliveryId);

        if($delivery) {
            $this->grandTotal = $this->total + $delivery->cost;
        }
    }

    public function changeQty($id, $event) {
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

        $this->getData();
    }

    public function deleteFromCart($id) {
        $model = OrderItem::find($id);

        if($model) {
            $model->delete();
        }

        $this->getData();
        $this->dispatch('updateCountCart');
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
