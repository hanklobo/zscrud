@php
    $title = $title ?? 'Blank';
    $actions = $actions ?? [];
    $block = $block ?? null;
@endphp
<x-zscrud::layout-system>
    <x-slot name="header">
        @foreach($actions as $label => $url)
            <a href="{{$url ?? '#'}}" class="float-right -mt-2 ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                {{ __($label ?? '--') }}
            </a>
        @endforeach
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-full">
                    @if(!is_null($block))
                        @include($block)
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-zscrud::layout-system>
