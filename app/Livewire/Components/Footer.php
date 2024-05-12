<?php

namespace App\Livewire\Components;

use App\Models\Contact;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $footer = Contact::first();
        return view('livewire.components.footer', ['footer' => $footer]);
    }
}
