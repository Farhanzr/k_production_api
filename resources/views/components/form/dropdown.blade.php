<div>
    @if($label != "")
        <label class="block text-sm font-semibold leading-5 text-gray-700">
            {{ $label }}
            <span class="text-lg text-red-500">{{ (isset($mandatory) and $mandatory == "true") ? '*' : '' }}</span>
        </label>
    @endif

    <div class="mt-1 mb-2 rounded-md shadow-sm">
        <select
            name="{{ $value }}"
            {{ $attributes }}
            {{ (isset($disable) and $disable == "true") ? "disabled" : "" }}
            class="block w-full transition duration-150 ease-in-out form-select sm:text-sm sm:leading-5 {{ (isset($disable) and $disable == "true") ? 'bg-gray-200' : '' }} {{ ($errors->has($value)) ? 'border-red-300 bg-red-50 text-red-900' : ''}}">
            @if($default == 'yes')
                <option value="" selected>Please Select</option>
            @endif

            {{ $slot }}
        </select>
    </div>

    @if($value !="" && $errors->has($value)) <p class="text-sm text-red-600">{{ $errors->first($value) }}</p> @endif
</div>
