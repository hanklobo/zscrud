<?php

return [
    'entities' => [
        'category' => [
            'model' => 'Category',
            'table' => 'categories',
            'fillable' => ['name', 'slug', 'image_url'],
            'casts' => [],
            'fields' => [
                'name' => [
                    'type' => 'string',
                    'rules' => 'required|max:80',
                    'messages' => [
                        'name.required' => 'The name field is required.',
                        'name.max' => 'The name may not be greater than :max characters.',
                    ],
                ],
                'slug' => [
                    'type' => 'string',
                    'rules' => 'sometimes|max:120|unique:categories,slug',
                    'messages' => [
                        'slug.max' => 'The slug may not be greater than :max characters.',
                        'slug.unique' => 'The slug must be unique.',
                    ],
                ],
                'image_url' => [
                    'type' => 'string',
                    'rules' => 'nullable|url',
                    'messages' => [
                        'image_url.url' => 'The image url must be a valid URL.',
                    ],
                ]
            ],
            'relationships' => [
                'news' => 'hasMany', // Assuming a Category has many News
            ],
            'requests' => [
                'store' => [],
                'update' => [],
                'delete' => [],
            ],
        ],
        'news' => [
            'model' => 'News',
            'table' => 'news',
            'fillable' => ['title', 'slug', 'text', 'category_id'],
            'casts' => [],
            'fields' => [
                'title' => [
                    'type' => 'string',
                    'rules' => 'required|max:160',
                    'messages' => [
                        'title.required' => 'The title field is required.',
                        'title.max' => 'The name may not be greater than :max characters.',
                    ],
                ],
                'slug' => [
                    'type' => 'string',
                    'rules' => 'sometimes|max:255|unique:news,slug',
                    'messages' => [
                        'slug.max' => 'The name may not be greater than :max characters.',
                        'slug.unique' => 'The slug must be unique.',
                    ],
                ],
                'text' => [
                    'type' => 'text',
                    'rules' => 'required',
                    'messages' => [
                        'text.required' => 'The text field is required.',
                        'text.max' => 'The name may not be greater than :max characters.',
                    ],
                ],
                'category_id' => [
                    'type' => 'integer',
                    'rules' => 'required|exists:categories,id',
                    'messages' => [
                        'category_id.required' => 'The category id is required.',
                        'category_id.exists' => 'The category id is invalid.',
                    ],
                ],
            ],
            'relationships' => [
                'category' => 'belongsTo', // A News belongs to a Category
            ],
            'requests' => [
                'store' => [
                    'authorization' => 'news.create',
                ],
                'update' => [
                    'authorization' => 'news.update',
                ],
                'delete' => [
                    'authorization' => 'news.delete',
                ],
            ],
        ],
    ],
];
