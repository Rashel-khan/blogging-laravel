@props(['submit'])

<div {{ $attributes->merge(['class' => '']) }}>
    <div class="md:mt-0">
        <form wire:submit.prevent="{{ $submit }}">
            <div
                class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow  {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                @if(isset($title) && isset($description))
                    <x-jet-section-title>
                        <x-slot name="title">{{ $title }}</x-slot>
                        <x-slot name="description">{{ $description }}</x-slot>
                    </x-jet-section-title>
                @endif

                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="px-4 py-3 bg-gray-50 dark:bg-gray-800/20 shadow sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
