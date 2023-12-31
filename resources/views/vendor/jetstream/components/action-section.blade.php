<div {{ $attributes->merge(['class' => '']) }}>

    <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
        <x-jet-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-jet-section-title>

        {{ $content }}
    </div>

</div>
