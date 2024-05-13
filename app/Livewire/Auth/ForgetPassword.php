<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class ForgetPassword extends Component
{
    public $id, $status;
    public $email, $key, $password, $password_confirmation;

    public function checkData() {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'key' => 'required'
        ], [
            'email' => 'กรอกอีเมล',
            'email.exists' => 'ไม่พบอีเมล',
            'key' => 'กรอก Key',
        ]);

        try {
            $user = User::where('email', $this->email)->first();

            if($user && Hash::check($this->key, $user->key)) {
                $this->id = $user->id;
                $this->status = 'ok';
            }
            else {
                $this->status = 'no';

                $this->addError('key', 'Key ไม่ถูกต้อง');
            }
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function changePassword(){
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'key' => 'required',
            'password' => 'required|min:6|max:16|confirmed',
        ], [
            'email' => 'กรอกอีเมล',
            'email.exists' => 'ไม่พบอีเมล',
            'key' => 'กรอก Key',
            'password' => 'กรอกรหัสผ่านให้ถูกต้อง',
            'password.confirmed' => 'รหัสผ่านไม่ตรงกัน',
            'password.min' => '6 - 16 ตัว',
            'password.max' => '6 - 16 ตัว'
        ]);

        try {
            $model = User::find($this->id);
            $model->password = Hash::make($this->password);
            $model->save();

            session()->flash('changePassword', 'เปลี่ยนรหัสผ่านสำเร็จ');
            return $this->redirect(route('login'), navigate:true);
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.auth.forget-password');
    }
}
