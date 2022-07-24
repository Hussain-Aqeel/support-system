<div {!! $attributes->merge([
    'class' => 'border border-gray-300 rounded-md shadow-lg space-y-6 px-5 p-8 m-5 bg-white'
    ]) !!}>

    {{ $slot }}
</div>