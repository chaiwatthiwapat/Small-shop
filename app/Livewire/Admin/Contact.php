<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact as ContactModel;

class Contact extends Component
{
    public $facebook, $youtube, $ig, $x;

    public function editContact(){
        $contact = ContactModel::first();

        $this->facebook = $contact->facebook;
        $this->youtube = $contact->youtube;
        $this->ig = $contact->ig;
        $this->x = $contact->x;
    }

    public function updateContact() {
        $this->validate([
            'facebook' => 'url'
        ]);

        ContactModel::first()->update([
            'facebook' => $this->facebook,
            'youtube' => $this->youtube,
            'ig' => $this->ig,
            'x' => $this->x,
        ]);

        $this->dispatch('success');
        $this->dispatch('modal-edit-hide');
    }

    public function render()
    {
        $contact = ContactModel::first();
        return view('livewire.admin.contact', ['contact' => $contact]);
    }
}
