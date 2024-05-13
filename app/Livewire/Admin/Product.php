<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Product as ProductModel;

class Product extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $category_id, $name, $price, $detail, $image;
    public $id, $oldImage, $oldImages = [];
    public $subimage = [], $images = [];
    public $paginate = 5, $search;

    public function codename() {
        return md5(uniqid().time());
    }

    public function ext($file) {
        return $file->getClientOriginalExtension();
    }

    public function formClear() {
        $this->id = '';
        $this->category_id = '';
        $this->name = '';
        $this->price = '';
        $this->detail = '';
        $this->image = '';
        $this->images = [];
        $this->subimage = [];
        $this->oldImage = '';
        $this->oldImages = [];
        $this->resetErrorBag();
    }

    public function modalCreateClose() {
        $this->resetErrorBag();
    }

    public function createProduct() {
        $this->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|max:200',
            'price' => 'required|numeric',
            'detail' => 'required',
            'image' => 'required|image',
            'images' => 'required',
            'images.*' => 'required|image',
        ], [
            'category_id' => 'เลือกหมวดหมู่สินค้า',
            'name' => 'กรอกชื่อสินค้าให้ถูกต้อง',
            'price' => 'กรอกราคาสินค้าให้ถูกต้อง',
            'detail' => 'กรอกรายละเอียดสินค้าให้ถูกต้อง',
            'image' => 'เลือก 1 ภาพ',
            'images.required' => 'เลือกอย่างน้อย 1 ภาพ',
            'images.*.image' => 'ไฟล์ภาพเท่านั้น',
        ]);

        try {
            $code = $this->codename();
            $ext = $this->ext($this->image);
            $imageName = "product-$code.$ext";

            foreach ($this->images as $image) {
                $code = $this->codename();
                $ext = $this->ext($image);
                $fileName = "product-sub-$code.$ext";

                $this->subimage[] = $fileName;
            }

            $product = new ProductModel();
            $product->category_id = $this->category_id;
            $product->name = $this->name;
            $product->price = $this->price;
            $product->detail = $this->detail;
            $product->image = $imageName;
            $product->subimage = $this->subimage;
            $product->save();

            if($product->save()) {
                $this->image->storeAs('public/product', $imageName);

                foreach($this->subimage as $index => $name) {
                    $this->images[$index]->storeAs('public/product-sub', $name);
                }
            }

            $this->dispatch('success');
            $this->dispatch('modal-create-hide');
            $this->formClear();
            $this->resetPage();
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function editProduct($id) {
        try {
            $this->id = $id;

            $product = ProductModel::find($id);
            if(!$product) {
                return $this->redirect(route('admin.product.index'), navigate:true);
            }

            $this->category_id = $product->category_id;
            $this->name = $product->name;
            $this->price =  $product->price;
            $this->detail =  $product->detail;
            $this->oldImage =  $product->image;

            foreach($product->subimage as $value) {
                $this->oldImages[] = $value;
            }
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function updateProduct() {
        $this->validate([
            'category_id' => 'exists:categories,id',
            'name' => 'required|max:200',
            'price' => 'required|numeric',
            'detail' => 'required',
            'image' => 'nullable|image',
            'images' => 'nullable',
            'images.*' => 'nullable|image',
        ], [
            'category_id.exists' => 'เลือกหมวดหมู่สินค้า',
            'name' => 'กรอกชื่อสินค้าให้ถูกต้อง',
            'price' => 'กรอกราคาสินค้าให้ถูกต้อง',
            'detail' => 'กรอกรายละเอียดสินค้าให้ถูกต้อง',
            'image' => 'ไฟล์ภาพเท่านั้น',
            'images.*.image' => 'ไฟล์ภาพเท่านั้น',
        ]);

        try {
            $product = ProductModel::find($this->id);
            if(!$product) {
                return $this->redirect(route('admin.product.index'), navigate:true);
            }

            if($this->image != '') {
                $code = $this->codename();
                $ext = $this->ext($this->image);
                $imageName = "product-$code.$ext";
                $product->image = $imageName;
            }

            if($this->images != []) {
                foreach ($this->images as $image) {
                    $code = $this->codename();
                    $ext = $this->ext($image);
                    $fileName = "product-sub-$code.$ext";

                    $this->subimage[] = $fileName;
                }

                $product->subimage = $this->subimage;
            }

            $product->category_id = $this->category_id;
            $product->name = $this->name;
            $product->price = $this->price;
            $product->detail = $this->detail;

            if($product->save()) {
                if($this->image != '') {
                    $this->image->storeAs('public/product', $imageName);
                }

                if($this->images != []) {
                    foreach($this->subimage as $index => $name) {
                        $this->images[$index]->storeAs('public/product-sub', $name);
                    }
                }
            }

            $this->dispatch('success');
            $this->dispatch('modal-edit-hide');
            $this->formClear();
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }


    #[On('deleteProduct')]
    public function deleteProduct($id) {
        try {
            $product = ProductModel::find($id);
            if(!$product) {
                return $this->redirect(route('admin.product.index'), navigate:true);
            }

            $product->delete();
            $this->dispatch('success');
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function render()
    {
        if($this->search != '') {
            $products = ProductModel::select('id', 'image', 'category_id', 'name', 'price')
                ->where('name', 'LIKE', "%$this->search%")
                ->latest()
                ->paginate($this->paginate);

            $this->resetPage();
        }
        else {
            $products = ProductModel::select('id', 'image', 'category_id', 'name', 'price')
                ->latest()
                ->paginate($this->paginate);

            $this->resetPage();
        }

        $categories = Category::select('id', 'name')->get();

        return view('livewire.admin.product', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
