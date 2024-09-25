<?php

namespace Hanklobo\ZSCRUD\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CrudController
{
    public function index(Request $request, string $slug){
        $cruds = Config::get("crud.entities.{$slug}",[]);
        $crud = $cruds['index'] ?? abort(404);

        return view(
            'zscrud::crud.index',
            $crud['config'] ?? []
        );
    }

    public function list(Request $request){
        $cruds = Config::get("crud.entities",[]);
        $icons = [];
        foreach ($cruds as $key => $config) {
            $icons[] = [
                'url' => route('crud.index',['slug' => $key]),
                'icon' => 'fa-database',
                'title' => ucfirst($key),
            ];
        }

        return view(
            'zscrud::crud.index',
            [
                'block' => 'crud.list.icons',
                'items' => $icons,
            ],
        );
    }

    public function create(Request $request, string $slug){
        $cruds = Config::get("crud.entities.{$slug}",[]);
        $crud = $cruds['create'] ?? abort(404);

        return view(
            'zscrud::crud.index',
            $crud['config'] ?? []
        );
    }

    public function store(Request $request, string $slug){
        dd($slug,$request->all());
//        $cruds = config("modelz.modelz",[]);
//        $crud = $cruds[$slug]['store'] ?? abort(404);
//
//        Permission::create($request->only('name'));
//        return redirect()->route('permission.index')->with('message','Permission created successfully');
    }
}
