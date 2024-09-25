# ZebService Crud Package

ZebService Package that implements CRUD functionality.

steps:
* composer require hanklobo/zscrud
* No arquivo *App\View\Components\AppLayout*, substituir o retorno "layouts.app" por "zscrud::components.layout-system"
* Comentar o bloco [Route::get('/', function () {})] no routes/web.php
* 
