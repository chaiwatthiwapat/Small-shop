<?php

namespace App\Livewire\Components;

use App\Models\Contact;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $footer = Contact::select('facebook', 'youtube', 'ig', 'x')->first();

        return view('livewire.components.footer', ['footer' => $footer]);
    }
}
