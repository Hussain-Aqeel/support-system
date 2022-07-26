@props(['name' => '', 'group' => '', 'model' => ''])

<div class="form-check">
  <input
    @if(isset($model)) wire:model.lazy="{{ $model }}" @endif
    {{ $attributes }}
    class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300
   bg-white checked:bg-sky-400 checked:border-sky-400
   duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2
   cursor-pointer accent-sky-500 focus:ring-sky-500 focus:accent-sky-500 text-sky-500"
         type="radio" name="{{ $group }}"
         id="{{ $name }}">
  <label class="form-check-label inline-block text-gray-800" for="{{ $name }}">
    {{ $name }}
  </label>
</div>