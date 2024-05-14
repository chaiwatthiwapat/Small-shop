<?php

namespace App\Livewire\History;

use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class OrderDetail extends Component
{
    public $order_id, $items, $order;

    public function mount($order_id) {
        $this->order_id = $order_id;
    }

    public function setData() {
        $this->order = Order::find($this->order_id);

        if(!$this->order) {
            return $this->redirect(route('history'), navigate:true);
        }

        $this->items = OrderItem::select('product_id', 'quantity', 'unit_price', 'total_amount')
            ->where('user_id', Auth::id())->where('order_id', $this->order_id)->get();
    }

    
    #[On('cancelOrder')]
    public function cancelOrder($id) {
        $model = Order::find($id);
        if($model) {
            $model->update([
                'status' => 'canceled'
            ]);

            $this->dispatch('success');
        }
    }

    public function render()
    {
        $this->setData();

        return view('livewire.history.order-detail', [
            'order' => $this->order,
            'items' => $this->items,
        ]);
    }
}
