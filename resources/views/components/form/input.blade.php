<div>
    @if($label != "")
        <label class="block text-sm font-semibold leading-5 text-gray-700 {{ ($errors->has($value)) ? 'text-red-700' : ''}}">
            {{ $label }}
            <span class="text-lg text-red-500">{{ (isset($mandatory) and $mandatory == "true") ? '*' : '' }}</span>
        </label>
    @endif

    <div class="flex mt-1 mb-2 rounded-md shadow-sm">
        <input
            {{ (isset($disable) and $disable == "true") ? 'disabled' : '' }}
            type="{{ (isset($type)) ? $type : 'text' }}" {{ $attributes }} value="{{$value}}"
            class="form-input text-sm block w-full transition duration-150 ease-in-out sm:leading-5
            {{ (isset($disable) and $disable == 'true') ? 'bg-gray-200' : '' }}
            {{ ($errors->has($value)) ? 'border-red-300 bg-red-50 text-red-900' : ''}}"
        >
    </div>
    @if($errors->has($value)) <p class="text-sm text-red-600">{{ $errors->first($value) }}</p> @endif
</div>
