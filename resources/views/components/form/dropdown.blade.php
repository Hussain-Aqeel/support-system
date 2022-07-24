@props(['label'=>'','labelBold'=>'','name'=>'','placeholder'=>'','type' => 'text', 'disabled' => false, 'dropdown' => false, 'value' => ''])
<div class="col-span-6 sm:col-span-3 rtl:sm:col-span-reverse py-1 relative"
     x-data="{dd_{{$name}}:0}">    @if($labelBold)
        <strong>{{ $labelBold }}</strong>
    @endif
    <input id="{{$name}}" type="{{$type}}"
           class="border-l-2 border-0 border-aymakan-200 focus:border-l-gray-500 ring-0 focus:outline-0 focus:ring-0 bg-aymakan-100 mt-3 block w-full rounded-md @if($disabled)disabled:opacity-80 bg-gray-300 pointer-events-none @endif"
           placeholder="{{ $placeholder ? $placeholder : $label }}" @if($dropdown)
           x-on:input="dd_{{$name}} = ($event.target.value.length > 2);" @else
           @endif autocomplete="{{$name}}"/> @if($dropdown && $slot->isNotEmpty())
        <div x-show="dd_{{$name}} !== 0"
             class="origin-top-right absolute ltr:right-0 rtl:left-0 mt-2 w-full rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
             role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" style="display: none">
            <ul class="py-1" role="none">    {{ $slot }}    </ul>
        </div>
    @endif
</div>