<div {!! $attributes->merge([
    'class' => 'd-block border-1 rounded hover:text-white hover:shadow-lg p-3 shadow-sm text-center font-bold md:text-sm sm:text-sm'
    ]) !!} >
{{ $slot }}
</div>