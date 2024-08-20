<?php

namespace Hanklobo\ZSCRUD\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class CrudPublish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:publish {entity}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create model, migration, form request, resource, and notification for an entity';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $entity = $this->argument('entity');
        $config = Config::get('crud.entities.' . $entity);

        if (!$config) {
            $this->error("Entity configuration for '{$entity}' not found.");
            return 1;
        }

        $this->createModel($config);
        $this->createMigration($config);
        $this->createFormRequest($config);
        $this->createResource($config);
        $this->createNotification($config);

        $this->info("Entity '{$entity}' files created successfully.");
        return 0;
    }

    private function createModel($config)
    {
        $modelName = $config['model'];
        $fillable = $config['fillable'];
        $content = $this->getStubContents('Model', $modelName, $fillable);
        $this->saveFile($modelName, $content);
    }

    private function createMigration($config)
    {
        $tableName = $config['table'];
        $migrationName = "create_{$tableName}_table";
        $content = $this->getStubContents('Migration', $migrationName, $tableName, $config['fields']);
        $this->saveFile("database/migrations/" . date('Y_m_d_His') . "_create_{$tableName}_table.php", $content);
    }

    private function createFormRequest($config)
    {
        $requestName = Str::studly($config['table']) . 'Request';
        $content = $this->getStubContents('FormRequest', $requestName, $config['fields']);
        $this->saveFile("Http/Requests/{$requestName}.php", $content);
    }

    private function createResource($config)
    {
        $resourceName = Str::studly($config['table']) . 'Resource';
        $content = $this->getStubContents('Resource', $resourceName);
        $this->saveFile("Http/Resources/{$resourceName}.php", $content);
    }

    private function createNotification($config)
    {
        $notificationName = Str::studly($config['table']) . 'Notification';
        $content = $this->getStubContents('Notification', $notificationName);
        $this->saveFile("Notifications/{$notificationName}.php", $content);
    }

    private function getStubContents($type, $name, ...$args)
    {
        $stub = file_get_contents(base_path('vendor/hanklobo/zscrud/src/stubs/' . $type . '.stub'));
        return str_replace(['{{ $' . $type . 'Name }}'], [$name], $stub);
    }

    private function saveFile($path, $content)
    {
        $fullPath = app_path($path);
        if (!file_exists(dirname($fullPath))) {
            mkdir(dirname($fullPath), 0777, true);
        }
        file_put_contents($fullPath, $content);
    }
}
