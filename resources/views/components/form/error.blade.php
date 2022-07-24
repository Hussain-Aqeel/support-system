@props(['for'])

@error($for)
<p class="text-md font-bold text-red-600">{{ $message }}</p>
@enderror