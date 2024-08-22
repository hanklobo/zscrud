@php
    $form = $form ?? [
        'fields' => [
            'id' => [
                'type' => 'text',
                'readonly' => true,
                'label' => 'ID',
            ],
        ],
    ];
    $model = $form['model'] ?? null;
    $fields = $form['fields'] ?? [];
    // Field definition:
    // 'keyname' => [
    //     'type' => 'section|email|checkbox|date|decimal|number|select|textarea|text', //required
    //     'label' => 'Label',  //required
    //     'readonly' => false, //false by default
    //     'value' => $mixed,
    //     'options' => [  //required when type:checkbox|select
    //          'key' => 'value',
    //     ],
    //     'required' => false, //false by default
    // ]
    //
@endphp
<form>
    <section>
        <div class="grid grid-cols-2 gap-4">
            @foreach($fields as $field => $def)
                @if($def['type'] == 'section')
                    @include('zscrud::crud.form.components.section',['title' => $def['label'] ?? '--'])
                @elseif($def['type'] == 'select')
                    @include('zscrud::crud.form.components.select',[
                        'name' => $field,
                        'label' => $def['label'] ?? '',
                        'options' => $def['options'] ?? [],
                        'selected' => old($field, $model?->$field),
                        'readonly' => true,
                    ])
                @elseif($def['type'] == 'checkbox')
                    <div class="mt-2">
                        <x-input-label for="{{$field}}" :value="__($def['label'] ?? '')" />
                        <span>
                        @foreach($def['options'] ?? [] as $opt)
                        <div class="flex items-center mb-4">
                            <input id="{{$field}}[]" type="checkbox" value="{{$opt->id}}" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="{{$field}}[]" class="ms-2 text-base font-medium text-gray-900 dark:text-gray-300">{{$opt->name}}</label>
                        </div>
                        @endforeach
                        </span>
                        <x-input-error class="mt-2" :messages="$errors->get($field)" />
                    </div>
                @else
                    @include('zscrud::crud.form.components.input',[
                        'name' => $field,
                        'label' => $def['label'],
                        'type' => $def['type'] ?? 'text',
                        'value' => $def['type'] == 'date' ? old($field,substr($model?->$field??'',0,10)) : old($field, $model?->$field),
                        'step' => ($def['type'] == 'decimal' ? 0.01 : ($def['type'] == 'number' ? 1 : null)),
                        'readonly' => true,
                    ])
                @endif
            @endforeach
        </div>
    </section>
</form>
