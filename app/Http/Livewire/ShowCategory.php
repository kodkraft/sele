<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class ShowCategory extends Component
{
    public Category $category;

    public function render()
    {
        return view('livewire.show-category');
    }
}
