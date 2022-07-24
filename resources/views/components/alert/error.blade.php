<div class="rounded-md bg-red-50 p-4 m-2" x-data="{ error: false }" x-show="error" x-transition:enter.duration.500ms x-transition:leave.duration.400ms x-on:error.window="error = true ; setTimeout(() => error = false, 3000)">
    <div class="flex">
        <div class="flex-shrink-0">
            <x-svg.error />
        </div>
        <div class="ml-3">
            <h3 x-data="{text: ''}" class="text-md font-bold text-red-800" x-on:error.window="text = $event.detail.msg" x-text="text"></h3>
        </div>
    </div>
</div>