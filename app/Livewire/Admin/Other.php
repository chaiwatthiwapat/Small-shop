<?php

namespace App\Livewire\Admin;

use App\Models\First;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Route;


class Other extends Component
{
    use WithFileUploads;

    public $title, $label, $image, $oldImage;

    public function codename() {
        return md5(uniqid().time());
    }

    public function ext($file) {
        return $file->getClientOriginalExtension();
    }

    public function editFirst() {
        try {
            $model = First::first();

            $this->title = $model->title;
            $this->label = $model->label;
            $this->oldImage = $model->image;
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function updateFirst() {
        $this->validate([
            'title' => 'required|max:200',
            'label' => 'required',
            'image' => 'nullable|image',
        ], [
            'title' => 'กรอกหัวข้อให้ถูกต้อง',
            'label' => 'กรอกคำอธิบายให้ถูกต้อง',
            'image' => 'ไฟล์ภาพเท่านั้น',
        ]);

        try {
            $model = First::first();

            if($this->image != '') {
                $code = $this->codename();
                $ext = $this->ext($this->image);
                $imageName = "first-$code.$ext";
                $model->image = $imageName;
            }

            $model->title = $this->title;
            $model->label = $this->label;

            if($model->save()) {
                if($this->image != '') {
                    $this->image->storeAs('public/first', $imageName);
                }
            }

            $this->dispatch('refreshFirst');
            $this->dispatch('success');
            $this->dispatch('modal-edit-hide');
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function closeModalFirst() {
        $this->title = '';
        $this->label = '';
        $this->image = '';
        $this->oldImage = '';
    }

    public function render()
    {
        $first = First::select('title', 'label', 'image')->first();
        return view('livewire.admin.other', ['first' => $first]);
    }
}
