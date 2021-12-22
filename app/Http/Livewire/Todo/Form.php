<?php

namespace App\Http\Livewire\Todo;

use Livewire\Component;
use App\Models\TodoItem;
use Illuminate\Support\Facades\Auth;

class Form extends Component
{
    public $description;

    protected $rules = [
        'description' => 'required|min:6'
    ];

    public function render()
    {
        return view('livewire.todo.form');
    }

    public function createItem()
    {
        $this->validate();

        $item = new TodoItem;
        $item->description = $this->description;
        $item->user_id = Auth::id();
        $item->save();

        $this->emit('saved');
    }
}
