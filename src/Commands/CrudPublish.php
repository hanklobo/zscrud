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
        $casts = $config['casts'];
        $content = $this->getStubContents('Model', $modelName, $fillable, $casts);
        $this->saveFile(app_path("Http/Models/{$modelName}.php"), $content);
    }

    private function createMigration($config)
    {
        $tableName = $config['table'];
        $migrationName = "create_{$tableName}_table";
        $content = $this->getStubContents('Migration', $migrationName, $tableName, $config['fields']);
        $this->saveFile(base_path("database/migrations/" . date('Y_m_d_His') . "_create_{$tableName}_table.php"), $content);
    }

    private function createFormRequest($config)
    {
        foreach ($config['requests'] as $id => $request) {
            $requestName = Str::studly($id) . Str::studly($config['table']) . 'Request';
            $permission = $config['table'] . '.' . $id;
            $content = $this->getStubContents('FormRequest', $requestName, $permission, $config['fields']);
            $this->saveFile(app_path("Http/Requests/{$requestName}.php"), $content);
        }
    }

    private function createResource($config)
    {
        $resourceName = Str::studly($config['table']) . 'Resource';
        $content = $this->getStubContents('Resource', $resourceName);
        $this->saveFile(app_path("Http/Resources/{$resourceName}.php"), $content);
    }

    private function createNotification($config)
    {
        foreach ($config['notifications'] as $id => $notification) {
            $notificationName = Str::studly($config['table']) . 'Notification';
            $content = $this->getStubContents('Notification', $notificationName);
            $this->saveFile(app_path("Notifications/{$notificationName}.php"), $content);
        }
    }
    private function getStubContents($type, ...$args)
    {
        $stub = file_get_contents(base_path("vendor/hanklobo/zscrud/src/stubs/{$type}.stub"));

        // Modified to replace multiple placeholders
        foreach ($args as $argument) {
            $stub = str_replace("{{ $$argument }}", $argument, $stub);
        }

        return $stub;
    }
    private function saveFile($path, $content)
    {
        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0777, true); // create directory if it doesn't exist
        }

        file_put_contents($path, $content); // create a file on the generated directory with content
    }
}
