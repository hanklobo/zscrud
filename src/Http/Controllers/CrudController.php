<?php

namespace Hanklobo\ZSCRUD\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class CrudController
{

    public function setup(Request $request){
        return view(
            'zscrud::pages.blank',
            [
                'title' => 'CRUD Setup',
                'block' => 'zscrud::crud.list.icons',
                'items' => [
                    [
                        'url' => route('crud.create-entity'),
                        'icon' => 'fa-plus',
                        'title' => 'Nova entidade',
                    ],
                ],
            ],
        );
    }

    public function createEntity(Request $request){
        return view('zscrud::crud.new-crud');
    }

    public function storeEntity(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'entity_name' => 'required|string|max:255',
            'table_name' => 'required|string|max:255',
            'fields' => 'required|array',
            'fields.*.name' => 'required|string|max:255',
            'fields.*.type' => 'required|string|in:checkbox,date,decimal,email,number,select,text,textarea',
            'fields.*.label' => 'nullable|string|max:255',
            'fields.*.value' => 'nullable|string',
            'fields.*.options' => 'nullable|json',
            'fields.*.cast_to' => 'required|string|in:array,boolean,collection,date,datetime,double,encrypted,encrypted:array,encrypted:collection,encrypted:object,float,hashed,integer,object,real,string,timestamp',
            'fields.*.is_fillable' => 'boolean',
            'fields.*.is_required' => 'boolean',
            'fields.*.readonly' => 'boolean',
            'requests' => 'array',
            'requests.*.name' => 'required|string|max:255',
            'requests.*.permissions' => 'nullable|string',
            'requests.*.rules' => 'array',
            'requests.*.rules.*.key' => 'required|string',
            'requests.*.rules.*.rules' => 'required|string',
            'requests.*.messages' => 'array',
            'requests.*.messages.*.key' => 'required|string',
            'requests.*.messages.*.message' => 'required|string',
            'pages' => 'array',
            'pages.*.name' => 'required|string|max:255',
            'pages.*.permissions' => 'nullable|string',
            'pages.*.request' => 'nullable|string',
            'pages.*.block' => 'required|string|in:form.edit-form,form.model-form,form.simple-form,list.icons,list.table',
            'pages.*.config' => 'nullable|json',
        ]);

        // Generate the configuration array
        $config = [
            'table' => $validated['table_name'],
            'fields' => $validated['fields'],
            'requests' => $validated['requests'] ?? [],
            'pages' => $validated['pages'] ?? [],
        ];

        // Generate a slug and model name from the entity name
        $slug = Str::slug($validated['entity_name']);
        $modelName = Str::studly($validated['entity_name']);

        // Create the Model
        $this->createModel($modelName, $validated['table_name'], $validated['fields']);

        // Create Requests
        foreach ($validated['requests'] ?? [] as $request) {
            $this->createRequest($request, $modelName);
        }

        // Create Page Controllers
        foreach ($validated['pages'] ?? [] as $page) {
            $this->createPageController($page, $modelName);
        }

        // Save the configuration file
        $filePath = config_path("crud/{$slug}.php");
        
        if (!is_dir(config_path('crud'))) {
            mkdir(config_path('crud'), 0755, true);
        }

        $fileContent = "<?php\n\nreturn " . var_export($config, true) . ";\n";

        if (file_put_contents($filePath, $fileContent) === false) {
            return back()->with('error', 'Failed to create configuration file.');
        }

        // Update the main CRUD configuration file
        // $this->updateMainCrudConfig($slug, $validated['entity_name']);
        dd($slug, $validated);

        return redirect()->route('crud.list')->with('success', 'CRUD entity created successfully.');
    }

    private function createModel($modelName, $tableName, $fields)
    {
        $modelPath = app_path("Models/Crud/{$modelName}.php");
        
        if (!is_dir(app_path("Models/Crud"))) {
            mkdir(app_path("Models/Crud"), 0755, true);
        }

        $fillable = array_column(array_filter($fields, function($field) {
            return $field['is_fillable'] ?? false;
        }), 'name');

        $casts = $this->generateCasts($fields);

        $modelContent = <<<EOT
<?php

namespace App\Models\Crud;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class {$modelName} extends Model
{
    use SoftDeletes;

    protected \$table = '{$tableName}';

    protected \$fillable = ['{{fillable}}'];

    protected \$casts = [
        {{casts}}
    ];
}
EOT;

        $modelContent = str_replace(
            ['{{fillable}}', '{{casts}}'],
            [implode("', '", $fillable), $this->formatCasts($casts)],
            $modelContent
        );

        File::put($modelPath, $modelContent);
    }

    private function generateCasts($fields)
    {
        $casts = [];
        foreach ($fields as $field) {
            if (isset($field['cast_to']) && $field['cast_to'] !== 'string') {
                $casts[$field['name']] = $field['cast_to'];
            }
        }
        return $casts;
    }

    private function formatCasts($casts)
    {
        return implode(",\n        ", array_map(function ($key, $value) {
            return "'{$key}' => '{$value}'";
        }, array_keys($casts), $casts));
    }

    private function createRequest($request, $modelName)
    {
        $requestName = Str::studly($request['name']);
        $requestPath = app_path("Http/Requests/Crud/{$requestName}.php");

        if (!is_dir(app_path("Http/Requests/Crud"))) {
            mkdir(app_path("Http/Requests/Crud"), 0755, true);
        }

        $rulesArray = array_column($request['rules'] ?? [], 'rules', 'key');
        $messagesArray = array_column($request['messages'] ?? [], 'message', 'key');

        $requestContent = <<<EOT
<?php

namespace App\Http\Requests\Crud;

use Illuminate\Foundation\Http\FormRequest;

class {$requestName} extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust this as needed
    }

    public function rules()
    {
        return [
            {{rules}}
        ];
    }

    public function messages()
    {
        return [
            {{messages}}
        ];
    }
}
EOT;

        $requestContent = str_replace(
            ['{{rules}}', '{{messages}}'],
            [
                $this->formatArray($rulesArray),
                $this->formatArray($messagesArray)
            ],
            $requestContent
        );

        File::put($requestPath, $requestContent);
    }

    private function createPageController($page, $modelName)
    {
        $controllerName = Str::studly($page['name']) . 'Controller';
        $controllerPath = app_path("Http/Controllers/Crud/{$controllerName}.php");

        if (!is_dir(app_path("Http/Controllers/Crud"))) {
            mkdir(app_path("Http/Controllers/Crud"), 0755, true);
        }

        $controllerContent = <<<EOT
<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class {$controllerName} extends Controller
{
    public function index()
    {
        return view('zscrud::crud.index', []);
    }
}
EOT;

        File::put($controllerPath, $controllerContent);
    }

    private function formatArray($array)
    {
        return implode(",\n            ", array_map(function ($key, $value) {
            return "'{$key}' => '{$value}'";
        }, array_keys($array), $array));
    }

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
                'actions' => [
                    'crud.setup' => 'Setup',
                ],
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
