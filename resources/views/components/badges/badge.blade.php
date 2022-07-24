@props(['type'])

@if($type == 'primary')
    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-blue-100 text-blue-800"> {{ $slot }} </span>
@elseif($type == 'secondary')
    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-gray-100 text-gray-800"> Badge </span>
@elseif($type == 'success')
    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-green-100 text-green-800"> {{ $slot }} </span>
@elseif($type == 'danger')
    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-red-100 text-red-800"> {{ $slot }} </span>
@elseif($type == 'warning')
    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-red-100 text-red-800"> {{ $slot }} </span>
@elseif($type == 'info')
    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-indigo-100 text-indigo-800"> {{ $slot }} </span>

@endif