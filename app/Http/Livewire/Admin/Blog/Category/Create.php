<?php

namespace App\Http\Livewire\Admin\Blog\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;


class Create extends Component
{
    use withFileUploads;

    public $form;
    protected $validationAttributes = [
        'form.name' => 'Name',
        'form.slug' => 'Slug',
        'form.description' => 'Description',
        'form.banner' => 'Banner',
    ];

    public function updated()
    {
        $name = $this->validateOnly('form.name', [
            'form.name' => 'string|max:255|unique:categories,name',
        ]);
        $this->form['slug'] = \Str::slug($name['form']['name'], '-', null);
    }

    public function render()
    {
        return view('livewire.admin.blog.category.create')
            ->layout('layouts.dash', ['title' => 'Create Article Category']);
    }

    public function create()
    {
        $this->validate([
            'form.name' => 'required|string|max:255|unique:categories,name',
            'form.slug' => 'required|string|max:255|unique:categories,slug',
            'form.description' => 'string|max:500',
            'form.banner' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
            'form.status' => 'required|boolean',
        ]);

        try {
            if (isset($this->form['banner'])) {
                $imgName = md5($this->form['banner'] . microtime()) . '.' . $this->form['banner']->extension();
                $this->form['banner'] = $this->form['banner']->storeAs('img/categories', $imgName, 'public');
            }

            Category::create($this->form);
            session()->flash('success', 'Category created successfully');
        } catch (\Exception $e) {
            session()->flash('errors', 'Something went wrong');
        }
        return redirect()->route('admin.blog.category.index');
    }
}
