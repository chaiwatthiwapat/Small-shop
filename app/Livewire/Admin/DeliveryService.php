<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\DeliveryService as DeliveryServiceModel;

class DeliveryService extends Component
{
    use WithPagination;

    public $id, $name, $cost;
    public $paginate = 5, $search;

    public function formClear() {
        $this->id = '';
        $this->name = '';
        $this->cost = '';
        $this->resetErrorBag();
    }

    public function modalCreateClose() {
        $this->resetErrorBag();
    }

    public function createDeliveryService() {
        $this->validate([
            'name' => 'required|max:200|unique:delivery_services,name',
            'cost' => 'required|numeric'
        ], [
            'name' => 'กรอกชื่อบริการขนส่งให้ถูกต้อง',
            'name.unique' => 'มีอยู่แล้ว',
            'cost' => 'กรอกค่าส่งให้ถูกต้อง'
        ]);

        try {
            DeliveryServiceModel::create([
                'name' => $this->name,
                'cost' => $this->cost,
            ]);

            $this->dispatch('success');
            $this->dispatch('modal-create-hide');
            $this->formClear();
            $this->resetPage();
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    #[On('deleteDeliveryService')]
    public function deleteDeliveryService($id) {
        try {
            $model = DeliveryServiceModel::find($id);
            if(!$model) {
                return $this->redirect(route('admin.delivery-service.index'), navigate:true);
            }

            $model->delete();

            $this->dispatch('success');
            $this->resetPage();
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function editDeliveryService($id) {
        try {
            $model = DeliveryServiceModel::find($id);
            if($model) {
                $this->id = $model->id;
                $this->name = $model->name;
                $this->cost = $model->cost;
            }
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function updateDeliveryService() {
        $this->validate([
            'name' => "required|max:200|unique:delivery_services,name,$this->id",
            'cost' => 'required|numeric'
        ], [
            'name' => 'กรอกชื่อบริการขนส่งให้ถูกต้อง',
            'name.unique' => 'มีอยู่แล้ว',
            'cost' => 'กรอกค่าส่งให้ถูกต้อง'
        ]);

        try {
            DeliveryServiceModel::where('id', $this->id)->update([
                'name' => $this->name,
                'cost' => $this->cost,
            ]);

            $this->dispatch('success');
            $this->dispatch('modal-edit-hide');
            $this->formClear();
            $this->resetPage();
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function render()
    {
        if($this->search != '') {
            $deliveryServices = DeliveryServiceModel::select('id', 'name', 'cost')->where('name', 'LIKE', "%$this->search%")->latest()->paginate($this->paginate);
        }
        else {
            $deliveryServices = DeliveryServiceModel::select('id', 'name', 'cost')->latest()->paginate($this->paginate);
        }

        return view('livewire.admin.delivery-service', ['deliveryServices' => $deliveryServices]);
    }
}
