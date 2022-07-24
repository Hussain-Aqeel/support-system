<div class="rounded-md bg-green-50 p-4 m-2" x-data="{ success: false }" x-show="success" x-transition:enter.duration.500ms x-transition:leave.duration.400ms x-on:success.window="success = true ; setTimeout(() => success = false, 3000)">
    <div class="flex">
        <div class="flex-shrink-0">
            <x-svg.success />
        </div>
        <div class="ml-3">
            <h3 x-data="{text: ''}" class="text-md font-bold text-green-800" x-on:success.window="text = $event.detail.msg" x-text="text"></h3>
        </div>
    </div>
</div>