<div {!! $attributes->merge(['class'=>'relative my-[16px]']) !!}  data-te-input-wrapper-init x-data>

    <textarea id="{!! $attributes->get('id')?? $attributes->get('id') !!}"
              rows="{!! $attributes->get('rows')?? $attributes->get('rows') !!}"
              class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] drop-shadow-xl
                       transition-all duration-200 ease-linear focus:placeholder:opacity-100 outline-none focus:ring-0
                       data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200
                       dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"></textarea>

    <label for="{{ $attributes->get('id')?? $attributes->get('id') }} "
           class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem]
                   leading-[1.6] text-gray-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem]
                   peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem]
                   peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-gray-400
                   dark:peer-focus:text-primary">
        {!! $attributes->get('label')? $attributes->get('label'): $attributes->get('id') !!}
    </label>


</div>


