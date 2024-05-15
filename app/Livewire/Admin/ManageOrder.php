<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;

class ManageOrder extends Component
{
    public $order_id, $items, $order;
    public $status, $percel_number;

    public function mount($order_id) {
        $this->order_id = $order_id;

        $order = Order::select('status', 'percel_number')->find($order_id);
        if(!$order) {
            return $this->redirect(route('admin.order.index'));
        }

        $this->status = $order->status;
        $this->percel_number = $order->percel_number;
    }

    public function setData() {
        $this->order = Order::find($this->order_id);

        if(!$this->order) {
            return $this->redirect(route('admin.order.index'), navigate:true);
        }

        $this->items = OrderItem::select('product_id', 'quantity', 'unit_price', 'total_amount')
            ->where('order_id', $this->order_id)->get();
    }

    public function updateOrder() {
        if($this->status == $this->order->status) {
            $this->addError('status', 'เลือกสถานะถัดไป');
        }
        else {
            if($this->status != 'canceled') {
                $this->validate([
                    'percel_number' => 'required'
                ], [
                    'percel_number' => 'กรอกเลขพัสดุ'
                ]);
            }

            try {
                $order = Order::find($this->order_id);

                if($order) {
                    $order->status = $this->status;
                    $order->percel_number = $this->percel_number;
                    $order->save();

                    $this->dispatch('success');
                    $this->dispatch('modal-edit-hide');
                    $this->resetErrorBag();
                }
            }
            catch(\Exception $e) {
                dd($e->getMessage());
            }
        }
    }

    public function render()
    {
        $this->setData();

        return view('livewire.admin.manage-order', [
            'order' => $this->order,
            'items' => $this->items,
        ]);
    }
}
