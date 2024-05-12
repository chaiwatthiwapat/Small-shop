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
    }

    public function createDeliveryService() {
        $this->validate([
            'name' => 'required|max:200',
            'cost' => 'required|numeric'
        ], [
            'name' => 'กรอกชื่อบริการขนส่งให้ถูกต้อง',
            'cost' => 'กรอกค่าส่งให้ถูกต้อง'
        ]);

        DeliveryServiceModel::create([
            'name' => $this->name,
            'cost' => $this->cost,
        ]);

        $this->dispatch('success');
        $this->dispatch('modal-create-hide');
        $this->formClear();
        $this->resetPage();
    }

    #[On('deleteDeliveryService')]
    public function deleteDeliveryService($id) {
        $model = DeliveryServiceModel::find($id);
        if(!$model) {
            return $this->redirect(route('admin.delivery-service.index'), navigate:true);
        }

        $model->delete();

        $this->dispatch('success');
        $this->resetPage();
    }

    public function editDeliveryService($id) {
        $model = DeliveryServiceModel::find($id);
        if(!$model) {
            return $this->redirect(route('admin.delivery-service.index'), navigate:true);
        }

        $this->id = $model->id;
        $this->name = $model->name;
        $this->cost = $model->cost;
    }

    public function updateDeliveryService() {
        $this->validate([
            'name' => 'required|max:200',
            'cost' => 'required|numeric'
        ], [
            'name' => 'กรอกชื่อบริการขนส่งให้ถูกต้อง',
            'cost' => 'กรอกค่าส่งให้ถูกต้อง'
        ]);

        DeliveryServiceModel::where('id', $this->id)->update([
            'name' => $this->name,
            'cost' => $this->cost,
        ]);

        $this->dispatch('success');
        $this->dispatch('modal-edit-hide');
        $this->formClear();
        $this->resetPage();
    }

    public function render()
    {
        if($this->search != '') {
            $deliveryServices = DeliveryServiceModel::where('name', 'LIKE', "%$this->search%")->latest()->paginate($this->paginate);
        }
        else {
            $deliveryServices = DeliveryServiceModel::latest()->paginate($this->paginate);
        }

        return view('livewire.admin.delivery-service', ['deliveryServices' => $deliveryServices]);
    }
}
