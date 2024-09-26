@php
    $name = $name ?? 'field';
@endphp
<div class="mt-2">
    <label for="{{$name}}">{{__($label ?? 'label')}}</label>
    @if($type ?? '' == 'textarea')
        <textarea rows="5" id="{{$name}}" name="{{$name}}" class="{{ $class ?? 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full' }}" {{ ($readonly ?? false) ? 'readonly' : '' }}>{{$value ?? ''}}</textarea>
    @else
        <input id="{{$name}}" name="{{$name}}" type="{{$type ?? 'text'}}" {{ ($step ?? null) ? ('step="' . $step . '"') : '' }} class="{{ $class ?? 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full' }}" value="{{$value ?? ''}}" {{ ($required ?? false) ? 'required' : '' }} {{ ($readonly ?? false) ? 'readonly' : '' }} autocomplete="{{$name}}" />
    @endif
    <x-input-error class="mt-2" :messages="$errors->get($name)" />
</div>
