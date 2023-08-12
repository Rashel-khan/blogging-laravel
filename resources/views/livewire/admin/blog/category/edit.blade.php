<div>
    <x-slot name="button">
        <a href="{{ route('admin.blog.category.index') }}">
            <x-button-lg-right type="button">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"></path>
                </svg>
                {!! "Back" !!}
            </x-button-lg-right>
        </a>
    </x-slot>

    <x-admin.success-msg/>
    <x-jet-validation-errors/>

    <form class="bg-gray-100 dark:bg-gray-800 rounded p-4">
        <div class="grid grid-cols-1 gap-6 my-2 sm:grid-cols-2">
            <div>
                <x-jet-label class="text-gray-400 dark:text-gray-500 mb-1" for="name">
                    Name
                </x-jet-label>
                <x-input id="name" wire:model.debounce.500ms="form.name"></x-input>
                <x-jet-input-error for="form.name" class="mt-2"/>
            </div>
            <div>
                <x-jet-label class="text-gray-400 dark:text-gray-500 mb-1" for="slug">
                    Slug
                </x-jet-label>
                <x-input id="slug" wire:model.defer="form.slug"
                         placeholder="Category Slug ( optional )"/>
                <x-jet-input-error for="form.slug" class="mt-2"/>
            </div>
        </div>

        <div class="my-4">
            <x-jet-label class="text-gray-400 dark:text-gray-500 mb-1" for="description">
                Description <sub class="opacity-50">500 Character max</sub>
            </x-jet-label>
            <x-textbox id="description" rows="3" wire:model.defer="form.description"
                       placeholder="Short Description ( optional )"/>
            <x-jet-input-error for="form.description" class="mt-2"/>
        </div>

        <div class="flex items-center justify-center">
            <div class="mb-4 p-2 text-sm w-full text-gray-700 dark:text-gray-300">
                <div class="mb-2">Category Banner <sub class="opacity-50">Optional 1mb max</sub></div>
                <div class="" x-data="previewImage()">

                    <label for="logo">
                        <div class="h-60 rounded border border-gray-200 flex items-center
                        justify-center overflow-hidden">

                            <img x-show="imageUrl" :src="imageUrl" class="h-60" alt="Category Cover">
                            <div x-show="!imageUrl" class="text-gray-700 dark:text-gray-300 flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 " fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                                <span>Image Preview</span>
                            </div>

                        </div>
                    </label>

                    <div>
                        <label for="banner" class="block mb-2 mt-4">Upload image..</label>
                        <x-jet-input class="cursor-pointer" type="file"
                                     wire:model.defer="form.banner"
                                     id="banner" @change="fileChosen"
                                     accept="image/png, image/gif, image/jpeg"></x-jet-input>
                        <x-jet-input-error for="newImage"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-center items-center space-y-2 md:space-x-2 mt-4 mx-[20%]">
            <x-select wire:model.defer="form.status" class="w-2/3" id="status">
                <option selected>Select Status</option>
                <option value="0">Draft</option>
                <option value="1">Publish</option>

            </x-select>
            <x-button-lg-right type="submit" wire:click.prevent="update">
                {{ __('Save') }}
            </x-button-lg-right>
        </div>
    </form>


</div>

@push('footer-js')
    <script defer>
        function previewImage() {
            return {
                imageUrl: "{{ asset($oldImage) }}",

                fileChosen(event) {
                    this.fileToDataUrl(event, (src) => (this.imageUrl = src));
                },

                fileToDataUrl(event, callback) {
                    if (!event.target.files.length) return;

                    let file = event.target.files[0],
                        reader = new FileReader();

                    reader.readAsDataURL(file);
                    reader.onload = (e) => callback(e.target.result);
                },
            };
        }
    </script>
@endpush
