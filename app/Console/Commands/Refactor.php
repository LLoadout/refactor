<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class Refactor extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'refactor:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new refactor class';


    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Refactors';
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (parent::handle() === false && !$this->option('force')) {
            return false;
        }

        $this->createRefactor();
    }


    private function createRefactor()
    {
        $this->type = $this->argument('name');
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {

        return __DIR__ . '/stubs/refactor.stub';
    }

}