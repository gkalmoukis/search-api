<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeFilterCommand extends GeneratorCommand
{
    protected $name = 'make:filter';

    protected $description = 'Create a new filter class';

    protected $type = 'Filter';

    protected function getStub()
    {
        return resource_path('stubs/filter.php.stub');
    }
    
    protected function getDefaultNamespace($rootNamespace)
    {
        if (is_null($this->option('model'))) {
            $this->error('You must provide a model class');

            return false;
        }

        return $rootNamespace.'\Filters\\'.$this->option('model');
    }

    protected function getOptions()
    {
        return [
            ['model', null, InputOption::VALUE_REQUIRED, 'Add Model class name for filter'],
        ];
    }

    public function handle()
    {   
        parent::handle();
        
        $this->createFile();
        
        return 1;
    }

    protected function createFile()
    {
        $class = $this->qualifyClass($this->getNameInput());
        $path = $this->getPath($class);
        $content = file_get_contents($path);
        file_put_contents($path, $content);
    }
}