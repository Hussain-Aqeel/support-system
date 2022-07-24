@props(['model'=>'', 'name'=>'', 'placeholder'=>''])

<textarea autocomplete="off"
          @if(isset($model)) wire:model.lazy="{{ $model }}" @endif
          id="{{$name }}"
          name="{{ $name }}"
          @if(isset($placeholder)) placeholder="{{ $placeholder }}" @endif
  {{ $attributes->merge(['class' => "appearance-none shadow-sm
              focus:ring-sky-500 focus:border-sky-500 block w-full sm:text-sm
              border border-gray-300 rounded-md h-24"])}}>
</textarea>
