<div class="p-4 m-2 rounded-md bg-green-50" x-data="{ success: false }" x-show="success"
     x-transition:enter.duration.500ms x-transition:leave.duration.400ms
     x-on:success.window="success = true ; setTimeout(() => success = false, 10000)">
    <div class="flex">
        <div class="flex-shrink-0">
            <x-svg.success />
        </div>
        <div class="ml-3">
            <h3 x-data="{text: ''}" class="font-bold text-green-800 text-md"
                x-on:success.window="text = $event.detail.msg" x-text="text"></h3>
        </div>
    </div>
</div>
