<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CategoryManagement extends Component
{
    public $showForm = false;
    public $update = false;

    public $form = [
        'title' => '',
        'parent_id' => '',
    ];

    public function render()
    {
        $categories = $this->getData();

        return view('livewire.category-management', compact('categories'));
    }

    public function getData()
    {
        return Category::all()->sortByDesc('created_at',3);
    }

    public function createOrUpdate($isUpdate = false)
    {
        $this->showForm = !$this->showForm;
        $this->update = $isUpdate;
    }

    public function storeOrUpdate()
    {
        $rules = [
            'title' => 'required|string',
            'parent_id' => 'exists:categories,id'
        ];

        $messages = [
            'title.required' => 'Title must be created',
            'title.string' => 'Title must be string',
            'parent_id' => 'Given parent_id category not exists in database'
        ];

        $this->setErrorBag(Validator::make($this->form, $rules, $messages)->getMessageBag());

        if(count($this->getErrorBag()->getMessages()) == 0) {
            try {
                $category = new Category();
                $category->title = $this->form['title'];
                $category->parent_id = $this->form['parent_id'];
                $category->save();

                $this->clearForm();
                $this->getData();

                session()->flash('success', 'Category successfully created');
            } catch (\Exception $exception) {
                session()->flash('error', 'An error occurred while creating a new category');
            }
        } else {
            session()->flash('error', 'An error occurred while creating a new category');
        }
    }

    public function clearForm()
    {
        $this->form['title'] = '';
        $this->form['parent_id'] = '';

        // Redirect back to categories page
        $this->showForm = !$this->showForm;
    }
}
