<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\Category as CategoryModel;

class Category extends Component
{
    use WithPagination;

    public $id, $name;
    public $paginate = 5, $search;

    public function formClear(){
        $this->id = '';
        $this->name = '';
        $this->resetErrorBag();
    }

    public function modalCreateClose() {
        $this->resetErrorBag();
    }

    public function createCategory() {
        $this->validate([
            'name' => 'required|max:200|unique:categories,name'
        ], [
            'name' => 'กรอกชื่อหมวดหมู่',
            'name.unique' => 'มีอยู่แล้ว',
        ]);

        try {
            CategoryModel::create([
                'name' => $this->name
            ]);

            $this->dispatch('success');
            $this->dispatch('modal-create-hide');
            $this->resetPage();
            $this->formClear();
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function editCategory($id) {
        try {
            $category = CategoryModel::find($id);
            if(!$category) {
                return $this->redirect(route('admin.category.index'), navigate:true);
            }

            $this->id = $id;
            $this->name = $category->name;
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function updateCategory() {
        $this->validate([
            'name' => "required|max:200|unique:categories,name,$this->id"
        ], [
            'name' => 'กรอกชื่อหมวดหมู่',
            'name.unique' => 'มีอยู่แล้ว',
        ]);

        try {
            CategoryModel::where('id', $this->id)->update([
                'name' => $this->name
            ]);

            $this->dispatch('success');
            $this->dispatch('modal-edit-hide');
            $this->resetPage();
            $this->formClear();
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    #[On('deleteCategory')]
    public function deleteCategory($id) {
        try {
            $category = CategoryModel::find($id);
            if(!$category) {
                return $this->redirect(route('admin.category.index'), navigate:true);
            }

            $category->delete();
            $this->dispatch('success');
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function render()
    {
        if($this->search != '') {
            $categories = CategoryModel::select('id', 'name')->where('name', 'LIKE', "%$this->search%")->latest()->paginate($this->paginate);
            $this->resetPage();
        }
        else {
            $categories = CategoryModel::select('id', 'name')->latest()->paginate($this->paginate);
            $this->resetPage();
        }

        return view('livewire.admin.category', ['categories' => $categories]);
    }
}
