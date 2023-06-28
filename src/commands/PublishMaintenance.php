<?php

namespace Rolandoinnamorati\Maintenance\commands;

use Illuminate\Support\Facades\File;
use Illuminate\Console\Command;

class PublishMaintenance extends Command
{
    protected $name = 'laravel-maintenance:publish';

    protected $description = 'Publish Service Worker|Offline HTML|manifest file for Maintenance.';

    public $composer;

    public function __construct()
    {
        parent::__construct();

        $this->composer = app()['composer'];
    }

    public function handle()
    {
        $publicDir = public_path();

        $manifestTemplate = file_get_contents(__DIR__.'/../stubs/manifest.stub');
        $this->createFile($publicDir. DIRECTORY_SEPARATOR, 'manifest.json', $manifestTemplate);
        $this->info('manifest.json file is published');

        $swTemplate = file_get_contents(__DIR__.'/../stubs/sw.stub');
        $this->createFile($publicDir. DIRECTORY_SEPARATOR, 'sw.js', $swTemplate);
        $this->info('sw.js (Service Worker) file is published');

        $this->info('Generating autoload files');
        $this->composer->dumpOptimized();
    }

    public static function createFile($path, $fileName, $contents)
    {
        if(!file_exists($path)){
            mkdir($path, 0755, true);
        }

        $path = $path.$fileName;

        file_put_contents($path, $contents);
    }


}