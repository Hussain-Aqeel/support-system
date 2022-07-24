@props(['color'=>'', 'type'=>'button'])

@php
    switch($color):
        case('green'):
            $classes[] = 'text-white bg-green-700 hover:bg-green-800 active:bg-green-900
            focus:border-green-900 focus:ring-green-300';
        break;
        case('red'):
            $classes[] = 'text-white bg-red-500 hover:bg-red-600 active:bg-red-500
            focus:border-red-600 focus:ring-red-300';
        break;
        case('blue'):
            $classes[] = 'text-white bg-blue-400 hover:bg-blue-500 active:bg-blue-400
            focus:border-blue-500 focus:ring-blue-200';
        break;
        case('gray'):
            $classes[] = 'text-white bg-gray-400 hover:bg-gray-500 active:bg-gray-400
            focus:border-gray-500 focus:ring-gray-200';
        break;
        case('sky'):
            $classes[] = 'text-white bg-sky-500 hover:bg-sky-600 active:bg-sky-500
            focus:border-sky-500 focus:ring-sky-200';
        break;
        case('white'):
            $classes[] = 'bg-white border-gray-300
            text-gray-700 hover:bg-gray-50
            focus:outline-none';
        break;
        default:
            $classes[] = 'px-3 py-1 text-xs';
        break;
    endswitch;

    $classes[] = 'inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest  focus:outline-none  focus:ring  disabled:opacity-25 transition';

@endphp

<button {{ $attributes->merge(['class' => implode(' ', $classes)])}} type="{{ $type }}">
    {{ $slot }}
</button>