<?php

namespace App\Http\Livewire\Admin\Blog\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search, $perPage = 10, $refresh = false;

    public function mount()
    {

    }

    public function render()
    {
        $categories = Category::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('slug', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage ?: 10);
        return view('livewire.admin.blog.category.index', compact('categories'))
            ->layout('layouts.dash', ['title' => 'Article Category']);
    }

    public function setFeatured($id)
    {
        $cat = Category::findOrFail($id);
        if ($cat->status == 1) {
            $cat->featured = $cat->featured == 1 ? 0 : 1;
            $cat->save();
            session()->flash('success', 'Category featured status updated successfully.');
            $this->refresh = !$this->refresh;
        } else {
            session()->flash('errors', 'Category is not published yet.');
            $this->refresh = !$this->refresh;
        }


    }
}
