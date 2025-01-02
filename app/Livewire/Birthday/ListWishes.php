<?php

namespace App\Livewire\Birthday;

use App\Models\Wish;
use Livewire\Component;

class ListWishes extends Component
{
    public function render()
    {
        return view('livewire.birthday.list-wishes', [
            'wishes' => Wish::latest()->paginate(16),
        ])->layout('components.layouts.app');
    }
}
