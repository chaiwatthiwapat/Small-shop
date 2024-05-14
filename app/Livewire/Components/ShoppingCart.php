<?php

namespace App\Livewire\Components;

use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use App\Models\DeliveryService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShoppingCart extends Component
{
    public $total, $grandTotal, $deliveryId, $name, $address, $phone, $shippingCost;
    public $items, $deliveryService;
    public $paymentMethod = 'ปลายทาง';

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
        $this->shippingCost = $delivery->cost;

        if($delivery) {
            $this->grandTotal = $this->total + $delivery->cost;
        }
    }

    public function changeQty($id, $event) {
        try {
            $order = OrderItem::find($id);
            $totalAmount = $order->product->price;

            if($order) {
                if($event == '-' && $order->quantity > 1) {
                    $qty = $order->quantity - 1;
                    $order->update([
                        'quantity' => $qty,
                        'total_amount' => $totalAmount * $qty,
                    ]);
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

    public function confirmOrder() {
        $this->validate([
            'deliveryId' => 'required|exists:delivery_services,id',
            'address' => 'required',
            'phone' => 'required|size:10',
            'name' => 'required|max:200',
        ], [
            'deliveryId' => 'เลือกบริการจัดส่ง',
            'address' => 'กรอกที่อยู่ให้ถูกต้อง',
            'phone' => 'กรอกเบอร์ผู้รับ 10 ตัว',
            'name' => 'กรอกชื่อผู้รับให้ถูกต้อง',
        ]);

        DB::beginTransaction();

        try {
            $order = new Order();
            $order->order_code = $this->orderCode();
            $order->user_id = Auth::id();
            $order->delivery_id = $this->deliveryId;
            $order->grand_total = $this->grandTotal;
            $order->payment_method = $this->paymentMethod;
            $order->shipping_cost = $this->shippingCost;
            $order->name = $this->name;
            $order->address = $this->address;
            $order->phone = $this->phone;
            $order->save();

            $orderItems = OrderItem::where('order_id', NULL)
                ->where('user_id', NULL)
                ->where('usercode', session('usercode'))
                ->get();

            $orderItems->toQuery()->update([
                'order_id' => $order->id,
                'user_id' => Auth::id(),
            ]);

            DB::commit();

            session()->flash('success', 'สังซื้อสำเร็จ');
            return $this->redirect(route('history'), navigate:true);
        }
        catch(\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function orderCode() {
        $uniqid = uniqid();
        return strtoupper("OR-$uniqid");
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
