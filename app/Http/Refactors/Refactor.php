<?php

namespace App\Http\Refactors;

use stdClass;

class Refactor
{
    public function explain()
    {
        echo $this->getExplanation();
        show_source(app_path() . "/Http/Refactors/" . class_basename($this) . ".php");
        return $this;
    }


    protected function __call($type, $args)
    {
        $stubClass         = new StdClass;
        $stubClass->notify = fn() => "Invoked method {$type}<br />";
        return $stubClass;
    }

    protected function showOutput(string $method, string $output)
    {
        echo "<h3>This is the output of {$method}</h3>";
        echo $output;
    }

}
