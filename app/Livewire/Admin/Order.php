<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order as OrderModel;
use Livewire\WithPagination;

class Order extends Component
{
    use WithPagination;

    public $search, $status;
    public $new, $shipping, $success, $canceled;
    public $paginate = 5;


    public function statusCount() {
        $orders = OrderModel::all();

        $this->new = $orders->where('status', 'new')->count();
        $this->shipping = $orders->where('status', 'shipping')->count();
        $this->success = $orders->where('status', 'success')->count();
        $this->canceled = $orders->where('status', 'canceled')->count();
    }

    public function render()
    {
        if($this->status != '') {
            if($this->search != '') {
                $orders = OrderModel::select('id', 'order_code', 'status', 'grand_total')
                    ->where('order_code', 'LIKE', "%$this->search%")
                    ->where('status', $this->status)
                    ->latest()->paginate($this->paginate);
            }
            else {
                $orders = OrderModel::select('id', 'order_code', 'status', 'grand_total')
                    ->where('status', $this->status)->latest()->paginate($this->paginate);
            }
        }
        else {
            if($this->search != '') {
                $orders = OrderModel::select('id', 'order_code', 'status', 'grand_total')
                    ->where('order_code', 'LIKE', "%$this->search%")->latest()->paginate($this->paginate);
            }
            else {
                $orders = OrderModel::select('id', 'order_code', 'status', 'grand_total')->latest()->paginate($this->paginate);
            }
        }

        $this->statusCount();
        $this->resetPage();

        return view('livewire.admin.order', [
            'orders' => $orders,
            'new' => $this->new,
            'shipping' => $this->shipping,
            'success' => $this->success,
            'canceled' => $this->canceled,
        ]);
    }
}
