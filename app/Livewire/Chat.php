<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class Chat extends Component
{
    public function render()
    {
        return view('livewire.chat.chat', [
            'ticket' => Contact::all()->last()
        ]);
    }
}
