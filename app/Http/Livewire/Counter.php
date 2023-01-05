<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;

        flash()->addSuccess('Yes, I quick started livewire');
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
