@props(['active'=>'', 'icon'=>'', 'label'=>'', 'route'=>''])

@php
    $isActive = ($route && (Route::currentRouteName() === $route)) ? true : $active;
    $liClasses = ($isActive ?? false) ? 'bg-emerald-800 text-white rounded-md flex flex-col items-center relative mb-1' : 'hover:text-white hover:bg-emerald-800 hover:text-white rounded-md flex flex-col items-center relative mb-1';
    $aClasses = ($isActive ?? false) ? 'text-white w-full p-3 flex flex-col items-center text-xs font-medium' : 'text-white w-full p-3 flex flex-col items-center text-xs font-medium';
@endphp

<li {{ $attributes->merge(['class' => $liClasses]) }}>
    <a {{ $attributes->merge(['class' => $aClasses]) }} @if($route) href="{{route($route)}}"  @endif aria-current="page">
        @if($icon)

            <svg class="w-6 h-6">
                <use xlink:href="{{ asset('images/sprite.svg#'.$icon) }}"/>
            </svg>
        @endif
        <span class="mt-2">{{$label}}</span>
    </a>
    @if($slot->isNotEmpty())
        <ul class="absolute w-44 bg-emerald-800 rounded-tr-md rounded-br-md left-full p-3 hidden top-0">
            {!! $slot !!}
        </ul>
    @endif
</li>