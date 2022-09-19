@props(['name' => ''])

@switch($name)
  @case('critical')
    <span class="bg-red-800 py-1.5 px-3 text-white font-bold">
      {{ $name }}
    </span>
    @break
  @case('high')
    <span class="bg-red-500 py-1.5 px-3 text-white font-bold">
      {{ $name }}
    </span>
    @break
  @case('normal')
    <span class="bg-amber-300 py-1.5 px-3 font-bold">
      {{ $name }}
    </span>
    @break
  @case('low')
    <span class="bg-emerald-400 py-1.5 px-3 font-bold">
      {{ $name }}
    </span>
    @break
@endswitch