<?php

return [
    'entities' => [
        'category' => [
            'model' => 'App/Models/Category',
            'table' => 'categories',
            'fillable' => ['name', 'slug', 'image_url'],
            'fields' => [
                'name' => [
                    'type' => 'string',
                    'rules' => 'required|max:255'
                ],
                'slug' => [
                    'type' => 'string',
                    'rules' => 'required|max:255|unique:categories,slug'
                ],
                'image_url' => [
                    'type' => 'string',
                    'rules' => 'nullable|url'
                ]
            ],
            'relationships' => [
                'news' => 'hasMany', // Assuming a Category has many News
            ],
        ],
        'news' => [
            'model' => 'App/Models/News',
            'table' => 'news',
            'fillable' => ['title', 'slug', 'text', 'category_id'],
            'fields' => [
                'title' => [
                    'type' => 'string',
                    'rules' => 'required|max:255'
                ],
                'slug' => [
                    'type' => 'string',
                    'rules' => 'required|max:255|unique:news,slug'
                ],
                'text' => [
                    'type' => 'text',
                    'rules' => 'required'
                ],
                'category_id' => [
                    'type' => 'integer',
                    'rules' => 'exists:categories,id'
                ]
            ],
            'relationships' => [
                'category' => 'belongsTo', // A News belongs to a Category
            ],
        ]
    ]
];
