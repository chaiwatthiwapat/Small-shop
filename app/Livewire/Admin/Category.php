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
    }

    public function createCategory() {
        $this->validate([
            'name' => 'required|max:200'
        ], [
            'name' => 'กรอกชื่อหมวดหมู่'
        ]);

        CategoryModel::create([
            'name' => $this->name
        ]);

        $this->dispatch('success');
        $this->dispatch('modal-create-hide');
        $this->resetPage();
        $this->formClear();
    }

    public function editCategory($id) {
        $category = CategoryModel::find($id);
        if(!$category) {
            return $this->redirect(route('admin.category.index'), navigate:true);
        }

        $this->id = $id;
        $this->name = $category->name;
    }

    public function updateCategory() {
        $this->validate([
            'name' => 'required|max:200'
        ], [
            'name' => 'กรอกชื่อหมวดหมู่'
        ]);

        CategoryModel::where('id', $this->id)->update([
            'name' => $this->name
        ]);

        $this->dispatch('success');
        $this->dispatch('modal-edit-hide');
        $this->resetPage();
        $this->formClear();
    }

    #[On('deleteCategory')]
    public function deleteCategory($id) {
        $category = CategoryModel::find($id);
        if(!$category) {
            return $this->redirect(route('admin.category.index'), navigate:true);
        }

        $category->delete();
        $this->dispatch('success');
    }

    public function render()
    {
        if($this->search != '') {
            $categories = CategoryModel::where('name', 'LIKE', "%$this->search%")->latest()->paginate($this->paginate);
            $this->resetPage();
        }
        else {
            $categories = CategoryModel::latest()->paginate($this->paginate);
            $this->resetPage();
        }

        return view('livewire.admin.category', ['categories' => $categories]);
    }
}
