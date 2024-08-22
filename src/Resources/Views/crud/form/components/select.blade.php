@php
    $name = $name ?? 'field';
@endphp
<div class="mt-2">
    <label for="{{$name}}">{{__($label ?? '')}}</label>
    <select name="{{$name}}" id="{{$name}}" class="{{$class ?? 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full'}}" {{ ($readonly ?? false) ? 'disabled' : '' }}>
        @foreach($options ?? [] as $key => $val)
            <option value="{{$key}}" {{($selected == $key ? 'selected' : '')}}>{{$val}}</option>
        @endforeach
    </select>
    <x-input-error class="mt-2" :messages="$errors->get($name)" />
</div>
