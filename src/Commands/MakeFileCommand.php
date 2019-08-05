<?php

namespace Zhenry\Lmf\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeFileCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new class file in app path';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'File';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('trait')) {
            return __DIR__.'/../Stubs/Trait.stub';
        }
        if ($this->option('interface')) {
            return __DIR__.'/../Stubs/Interface.stub';
        }

        return __DIR__.'/../Stubs/Class.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace;
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['trait', 't', InputOption::VALUE_NONE, 'Indicates if the generated file should be a trait'],
            ['interface', 'i', InputOption::VALUE_NONE, 'Indicates if the generated file should be an interface'],
        ];
    }

    /**
     * Parse the class name and format according to the root namespace.
     *
     * @param  string  $name
     * @return string
     */
    protected function qualifyClass($name)
    {
        return str_replace(
            '.',
            '\\',
            parent::qualifyClass($name)
        );
    }    
}
