<?php

namespace App\Http\Livewire\Admin\Blog\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use withFileUploads;

    public $category, $form, $oldImage, $newImage;
    protected $validationAttributes = [
        'form.name' => 'Name',
        'form.slug' => 'Slug',
        'form.description' => 'Description',
        'form.banner' => 'Banner',
    ];

    public function mount($id)
    {
        $this->category = Category::findOrFail($id);
        $this->form = $this->category->toArray();
        $this->oldImage = $this->form['banner'];


    }

    public function render()
    {
        return view('livewire.admin.blog.category.edit')
            ->layout('layouts.dash', ['title' => 'Edit Article Category']);
    }

    public function updated()
    {
        $name = $this->validateOnly('form.name', [
            'form.name' => 'string|max:255|unique:categories,name,' . $this->category['id'],
        ]);
        $this->form['slug'] = \Str::slug($name['form']['name'], '-', null);
    }

    public function update()
    {
        if (isset($this->form['banner']) && $this->form['banner'] != $this->oldImage) {
            $this->validate([
                'form.banner' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            ]);
            $imgName = md5($this->form['banner'] . microtime()) . '.' . $this->form['banner']->extension();
            $this->form['banner'] = $this->form['banner']->storeAs('img/categories', $imgName, 'public');
            \Storage::delete('public/' . $this->oldImage);

        }
        $this->validate([
            'form.name' => 'required|string|max:255|unique:categories,name, ' . $this->category['id'],
            'form.slug' => 'required|string|max:255|unique:categories,slug, ' . $this->category['id'],
            'form.description' => 'nullable|string|max:500',
            'form.status' => 'required|boolean',
        ]);
        try {

            $this->category->update($this->form);
            session()->flash('success', 'Category updated successfully');

        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong');
        }

        return redirect(route('admin.blog.category.index'));
    }
}
