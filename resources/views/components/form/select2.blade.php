@props(['value' => '', 'options' => ''])
@php $id = mt_rand() @endphp
<div {{ $attributes->merge(['class'=> 'border border-gray-300 rounded-md shadow-sm placeholder-gray-400 px-2 relative']) }}>
    <ul class="flex w-full items-center">
        <li id="selection_{{$id}}"></li>
        <li>
            <input id="search_{{$id}}" type="text" class="rounded-md border-0 outline-none ring-o focus:outline-none focus:ring-0 placeholder-gray-400 sm:text-sm" autocomplete="off" onkeyup="askSelect.filterList()"/>
        </li>
    </ul>
    @if($options)
        <ul id="list_{{$id}}" class="absolute left-0 top-full bg-white w-full pt-1 rounded-b shadow-md mt-1 overflow-hidden">

        </ul>
    @endif
</div>
<script>
    const askSelect = {
        options() {
            return {!! $options !!};
        },
        handleClickOutside(e) {
            if (this.$el.contains(e.target)) {
                return;
            }
        },
        setList() {
            let listContainer = document.getElementById("list_{{$id}}");
            Object.entries(askSelect.options()).forEach(([key, value]) => {
                listContainer.innerHTML += `<li><a href="#" class="select-option block px-4 py-1 text-sm border-b border-gray-100" data-key="${value.key}">${value.label}</a></li>`;
            })
        },
        filterList() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("search_{{$id}}");
            filter = input.value.toUpperCase();
            ul = document.getElementById("list_{{$id}}");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        },
        removeOption(value) {
            alert(value)
        },
        setOption(event) {
            let key = event.target.getAttribute("data-key")
            console.log(key)
            let selection = document.getElementById("selection_{{$id}}");
            let option = askSelect.options().filter((item) => {
                return item.key === key
            })[0];
            if(typeof option !== "undefined") {
                selection.innerHTML += `<span class="remove-option inline-block text-xs border rounded px-1 py-0.5 inline-block mr-1 flex items-center cursor-pointer" data-key="${option.key}">${option.label}<svg class="fill-current w-2 h-4 ml-1 cursor-pointer" aria-hidden="true" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"/></span>`
            }
        },

        init() {
            askSelect.setList()

            // Select Option
            let selectOption = document.querySelectorAll(".select-option")
            selectOption.forEach(el => el.addEventListener('click', askSelect.setOption));

            // Remove Option
            let removeOption = document.querySelectorAll(".remove-option")
            removeOption.forEach(el => el.addEventListener('click', askSelect.removeOption));

        }
    }
    askSelect.init()
</script>
