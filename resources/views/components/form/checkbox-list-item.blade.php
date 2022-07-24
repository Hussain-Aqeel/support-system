<div class="relative flex items-start py-4">
    <div class="min-w-0 flex-1 text-sm">
        <label class="font-medium text-gray-700 select-none">{{$title}}</label>
    </div>
    <div class="ml-3 flex items-center h-5">
        <input wire:model="userRoles" value="{{$val}}" type="checkbox"
        {!! $attributes->merge([
            'class' => 'focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300'
            ]) !!}>
    </div>
</div>