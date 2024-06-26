<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password;

    public function login() {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ], [
            'email' => 'กรอกอีเมลให้ถูกต้อง',
            'email.exists' => 'ไม่พบอีเมล',
            'password' => 'กรอกรหัสผ่าน',
        ]);

        try {
            $account = [
                'email' => $this->email,
                'password' => $this->password,
            ];

            if(auth()->attempt($account)) {
                if(Auth::user()->usertype == 'admin') {
                    return $this->redirect(route('admin.order.index'), navigate:true);
                }
                else if(Auth::user()->usertype == 'member') {
                    return $this->redirect(route('index'), navigate:true);
                }
                else {
                    Auth::logout();
                    return redirect()->route('login');
                }
            }
            else {
                $this->addError('password', 'รหัสผ่านไม่ถูกต้อง');
            }
        }
        catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}


