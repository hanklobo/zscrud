<?php

namespace Hanklobo\ZSCRUD\Facades;

use Illuminate\Support\Facades\Facade;

class ZSCRUD extends Facade
{
    protected static function getFacadeAccessor() { return 'zscrud'; }
}
