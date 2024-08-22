@php
    $table = $table ?? [
        'columns' => [
            'id' => 'ID',
            'created_at' => 'Created at',
        ],
        'items' => [],
    ];
    $hasActions = isset($table['actions']);
@endphp
<table class="w-full">
    <thead class="bg-gray-50">
    <tr>
        @foreach($table['columns'] as $key => $label)
            <th scope="col" class="px-6 py-3 text-left text-base font-medium text-gray-700 uppercase tracking-wider">
                {{__($label)}}
            </th>
        @endforeach
        @if($hasActions)
            <th scope="col" class="px-6 py-3 text-left text-base font-medium text-gray-700 uppercase tracking-wider">
                {{__('Actions')}}
            </th>
        @endif
    </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach($table['items'] ?? [] as $item)
        <tr class="hover:bg-gray-100">
            @foreach($table['columns'] as $key => $label)
                <td class="px-6 py-4 text-sm text-gray-900">
                    {{$item[$key] ?? '--'}}
                </td>
            @endforeach
            @if($hasActions)
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    @foreach($table['actions'] ?? [] as $action => $label)
                        <a href="{{route($action,[$item['id'] ?? 0])}}">
                            <button class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{__($label)}}</button>
                        </a>
                    @endforeach
                </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
