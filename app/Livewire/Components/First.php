<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\First as FirstModel;

class First extends Component
{
    public $first;

    public function mount() {
        $this->first = $this->dataFirst();
    }

    #[On('refreshFirst')]
    public function refreshFirst() {
        $this->first = $this->dataFirst();
    }

    public function dataFirst(){
        return FirstModel::select('id', 'title', 'label', 'image')->first();
    }

    public function render()
    {
        return view('livewire.components.first', ['first' => $this->first]);
    }
}
