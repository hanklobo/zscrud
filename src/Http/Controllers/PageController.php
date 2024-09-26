<?php

namespace Hanklobo\ZSCRUD\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController
{
    public function index(Request $request){
        return view('zscrud::pages.blank',[
            'title' => 'Page',
            'actions' => [],
        ]);
    }

    public function dashboard(Request $request){
        return view('zscrud::pages.blank',[
            'title' => 'Dashboard',
            'block' => 'zscrud::crud.list.icons',
            'items' => [
                [
                    'url' => '/crud',
                    'title' => 'Cadastros',
                    'icon' => 'fa-database',
                ],
            ],
        ]);
    }

    public function landing(Request $request){
        $landing = config('landing-page',[]);
        return view('zscrud::landing.index',compact('landing'));
    }

    public function editUser(Request $request): View
    {
        return view('zscrud::profile.edit', [
            'user' => $request->user(),
        ]);
    }
}
