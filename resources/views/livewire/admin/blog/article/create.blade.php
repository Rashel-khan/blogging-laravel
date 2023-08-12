<x-slot name="button">
    <a href="{{ route('admin.user.index') }}">
        <x-button-lg-right>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"/>
            </svg>
            Go Back
        </x-button-lg-right>
    </a>
</x-slot>
<div>
    <x-admin.err-flush/>
    <div wire:loading.class="backdrop-blur-lg opacity-50">
        <form class="flex flex-col sm:flex-row md:space-x-3" wire:submit.prevent="save">
            <div class="md:w-3/4 flex flex-col justify-center bg-white dark:bg-gray-800 p-2 text-gray-700
        dark:text-gray-300 space-y-2 rounded">
                <label for="title"> Article Title
                    <x-jet-input type="text" wire:model.lazy="title" placeholder="Enter Article Title" class="w-full">
                    </x-jet-input>
                </label>
                <label for="slug"> Article Slug
                    <p>{{ config('app.url').'/blog/'. $slug }}</p>
                    <x-jet-input type="text" wire:model.lazy="slug" placeholder="Enter Article Slug" class="w-full">
                    </x-jet-input>
                </label>

                <div wire:ignore>
                    <label for="content" > Article Content
                        <textarea wire:model.lazy="content"
                                  wire:loading.class="disabled opacity-50"
                                  class="min-h-fit h-48 "
                                  name="content"
                                  id="content"></textarea>
                    </label>
                </div>
                <div>
                    <label for="summary" class="text-gray-400 dark:text-gray-600">
                        <x-textarea name="summary" id="summary" wire:model="summary">
                        </x-textarea>
                        <span class="text-sm">Not Exceed 160 character </span>
                    </label>
                </div>
            </div>
            <aside class="md:w-1/4">
                <div class="bg-white dark:bg-gray-800 rounded p-2">
                    <x-button-lg-right type="submit">
                        Save</x-button-lg-right>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded p-2 mt-2">
                    <label for="category" class="text-gray-400 dark:text-gray-600">Select Category
                        <x-select name="category" id="category" class="w-full" multiple>
                            @foreach( $categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </x-select>

                    </label>
                </div>
{{--                <div>--}}
{{--                    <label for="sizes" class="block font-medium text-sm text-gray-700">Sizes</label>--}}
{{--                    <x-admin.tags class="bg-grey-lighter" wire:model="tags"/>--}}

{{--                </div>--}}

            </aside>


        </form>
    </div>
</div>

@push('head-js')
    <script src="https://cdn.tiny.cloud/1/gfetdiktftw1akkmkb445qwctsth0aa0j71pjd63iy2yyfvz/tinymce/6/tinymce.min.js"
            referrerpolicy="origin" data-turbolinks-track="reload"></script>
@endpush

@push('footer-js')
    <script>
        tinymce.init({
            selector: '#content',
            forced_root_block: false,
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
                editor.on('change', function (e) {
                    @this.set('content', editor.getContent());
                });
            }
        });
    </script>
@endpush
