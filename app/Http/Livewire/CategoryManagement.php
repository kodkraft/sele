<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryManagement extends Component
{
    public $create = false;

    public function render()
    {
        $categories = Category::all();

        return view('livewire.category-management', compact('categories'));
    }

    public function create()
    {
        $this->create = !$this->create;
    }
}
