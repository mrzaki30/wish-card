<?php

namespace App\Livewire\Birthday;

use App\Models\Wish;
use Livewire\Component;

class Show extends Component
{
    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        $wishes = Wish::where('id', $this->id)->first();
        return view('livewire.birthday.show',[
            'wishes' => $wishes,
        ])->layout('components.layouts.app');
    }
}
