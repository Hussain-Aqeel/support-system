@props(['value' => '', 'options' => '', 'multiple' => false, 'placeholder'=>'Select'])
@php
    $id = mt_rand();
    if ($multiple) {
        $attrs['class'] = 'flex border border-gray-300 rounded-md shadow-sm placeholder-gray-400 relative w-1/2 pb-1';
    } else {
        $attrs['class'] = 'flex border border-gray-300 rounded-md shadow-sm placeholder-gray-400 relative w-1/2';
    }
@endphp
<div {{ $attributes->merge($attrs) }}>
    <select id="select_{{$id}}" data-placeholder="{{$placeholder}}" class="rounded-md appearance-none border-0 w-full px-2 py-0.5 text-sm invisible" @if($multiple) style="height: 32px" multiple="multiple" @else style="height: 36px" @endif>
        @if($options)
            @foreach(json_decode($options, true) as $option)
                <option value="@isset($option['key']) {{$option['key']}} @else {{$option['key']}} @endisset">
                    @isset($option['label'])
                        {!! $option['label'] !!}
                    @endisset
                </option>
            @endforeach
        @endif
    </select>
</div>
<script>
    $(document).ready(function () {
        $('#select_{{$id}}').select2();
    });
</script>
<style>
	.select2-container {
		display: block;
	}
	.select2-container--default .select2-selection--single,
	.select2-container--default .select2-selection--multiple {
		min-height: 36px;
		border: none;
		background-color: transparent;
		border-radius: 0;
		padding: 0;
	}
	.select2-container--default .select2-selection--multiple {
		min-height: 32px;
	}
	.select2-results__option {
		font-size: 0.875rem;
	}
	.select2-container--default .select2-selection--single .select2-selection__arrow {
		height: 36px;
		top: 0;
		right: 6px;
	}
	.select2-container--default .select2-selection--single .select2-selection__rendered {
		line-height: 36px;
		font-size: 0.875rem;
	}
	.select2-container .select2-selection--single .select2-selection__rendered {
		padding-left: 0.75rem;
	}
	.select2-container--default .select2-search--inline .select2-search__field {
		font-size: 0.875rem;
		margin: 0;
		padding: 2px 0.75rem;
		color: #9ca3af;
		opacity: 0.7;
	}
	.select2-container--default.select2-container--focus .select2-selection--multiple {
		border: none;
	}
	.select2-container--default .select2-selection--multiple .select2-selection__choice {
		background-color: #fbfbfb;
	}
	.select2-container--default .select2-selection--multiple .select2-selection__choice__display {
		font-size: 0.675rem;
		padding-left: 2px;
		padding-right: 5px;
	}
</style>
