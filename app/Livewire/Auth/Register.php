<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation, $key;

    public function register() {
        $this->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|max:200|unique:users,email',
            'key' => 'required|max:200',
            'password' => 'required|min:6|max:16|confirmed',
        ], [
            'name' => 'กรอกชื่อให้ถูกต้อง',
            'email' => 'กรอกอีเมลให้ถูกต้อง',
            'email.unique' => 'อีเมลนี้มีผู้อื่นใช้แล้ว',
            'key' => 'กรอก Key',
            'password' => 'กรอกรหัสผ่านให้ถูกต้อง',
            'password.confirmed' => 'รหัสผ่านไม่ตรงกัน',
            'password.min' => '6 - 16 ตัว',
            'password.max' => '6 - 16 ตัว'
        ]);

        try {
            $model = new User();
            $model->name = $this->name;
            $model->email = $this->email;
            $model->key = Hash::make($this->key);
            $model->password = Hash::make($this->password);
            $model->usertype = 'member';
            $model->save();

            session()->flash('register', 'สมัครสมาชิกสำเร็จ');
            return $this->redirect(route('login'), navigate:true);
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
