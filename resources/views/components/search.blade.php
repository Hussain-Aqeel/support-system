@props(['name' => '', 'model' => '', 'placeholder' => ''])

<div class="mx-2 mb-3 xl:w-96">
  <label for="search" class="inline-block mb-2 text-gray-700 form-label">{{ $name }}</label>
  <input
    @if(isset($model)) wire:model.debounce.500ms="{{ $model }}" @endif
    {{ $attributes  }}
    type="search"
    id="search"
    autocomplete="off"
    placeholder="{{ $placeholder }}"
    {!! $attributes->merge(['class' => 'form-control block w-full px-3 py-1.5 text-base font-normal
            text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded
            transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-sky-400
            focus:outline-none']) !!}
  />
</div>