<?php

namespace Hanklobo\ZSCRUD\Http\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SystemLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.layout-system');
    }
}
