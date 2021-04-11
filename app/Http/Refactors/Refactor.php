<?php

namespace App\Http\Refactors;

use stdClass;

class Refactor
{
    public $title;
    public $description;
    public $requires = [];
    public $url;
    public $doc;
    public $icon = "https://www.php.net/images/logos/php-icon-white.gif";

    public function explain()
    {
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
        echo '/** output */';
        echo '<div class="p-5 mt-4 bg-gray-100 full-width rounded-lg shadow">';
        echo '<h3 class="text-lg font-medium">This is the output of <span class="text-blue-400">'.$method.'</span></h3>';
        echo $output;
        echo '</div>';
        echo '/** end output */';
    }

}
