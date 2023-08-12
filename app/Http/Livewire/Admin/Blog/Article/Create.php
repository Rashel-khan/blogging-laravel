<?php

namespace App\Http\Livewire\Admin\Blog\Article;

use App\Models\Articles;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Storage;
use Transliterator;

class Create extends Component
{
    public $title, $content, $category_id, $categories, $slug;


    public function mount()
    {
        $this->categories = Category::getActiveCategories();
    }
    public function render()
    {
        return view('livewire.admin.blog.article.create')
            ->layout('layouts.dash', ['title' => 'Create Article']);
    }

    public function updatedTitle()
    {
        $slug = $this->makeSlug($this->title);
        if ($this->checkSlug($slug)) {
            $this->slug = $slug;
        }
        else
        Session()->flash('errors', 'Slug is already exist');
    }

    public function updatedSlug()
    {
        $slug = $this->makeSlug($this->slug);
        if ($this->checkSlug($slug)) {
            $this->slug = $slug;
        }
        else
        Session()->flash('errors', 'Slug is already exist');
    }

    private function makeSlug($s)
    {
        if (extension_loaded('intl')) {
            $transliterator = Transliterator::createFromRules(
                ':: Any-Latin; :: Latin-ASCII; :: NFD; :: [:Nonspacing Mark:] Remove; :: Lower();',
                Transliterator::FORWARD
            );

            return Str::slug($transliterator->transliterate($s), '-');
        } else {
            // Fallback to basic ASCII transliteration if Intl extension is not available
            return Str::slug($this->slug, '-');
        }
    }

    private function checkSlug($slug)
    {
        $count = Articles::where('slug','like', $slug)->get();
        return (bool)$count;
    }

    public function save()
    {
        dd($this->tags);

//        Storage::put('public/article/1.txt' , $this->content);
    }
}
