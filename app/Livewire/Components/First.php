<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\First as FirstModel;

class First extends Component
{
    public $first;
    protected $listeners = ['refresh'];

    public function updateCart() {
        $this->dispatch('update-count-cart');
    }

    #[On('refreshFirst')]
    public function refreshFirst() {
        $this->first = FirstModel::first();
    }

    public function render()
    {
        $this->first = FirstModel::first();

        return view('livewire.components.first', ['first' => $this->first]);
    }
}
