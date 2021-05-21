<?php

namespace App\Http\Refactors;

class PhpAlternativeSwitchStatement extends Refactor implements RefactorInterface
{
    public $title       = "Refactoring a switch statement ";
    public $description = "In this refactor we refactor a switch statement to an array approach";
    public $requires    = ['php' => 'any version'];
    public $doc         = "https://www.php.net";

    public function original($args): PhpAlternativeSwitchStatement
    {
        /** code */
        $language = 'php';
        switch ($language) {
            case 'php':
                $creator = 'Rasmus Lerdorf';
                break;
            case 'javascript':
                $creator = 'Brendan Eich';
                break;
            case 'vue':
                $creator = 'Evan You';
                break;
            case 'livewire':
                $creator = 'Caleb Porzio';
                break;
            case 'laravel':
                $creator = 'Taylor Otwell';
                break;
        }

        /** end code */
        $this->showOutput(__FUNCTION__, $creator);

        return $this;
    }

    public function refactor($args): PhpAlternativeSwitchStatement
    {
        /** code */
        $language = 'php';
        $creators = [
            'php'        => 'Rasmus Lerdorf',
            'javascript' => 'Brendan Eich',
            'vue'        => 'Evan You',
            'livewire'   => 'Caleb Porzio',
            'laravel'    => 'Taylor Otwell'
        ];
        $creator  = $creators[$language];

        /** end code */

        $this->showOutput(__FUNCTION__, $creator);
        return $this;
    }

    public function getExplanation(): string
    {
        return '
            Most of the time we make our descisions in php with an if statement or a switch statement,
            sometimes this can be enhanced in an expressive way by using arrays.
        ';
    }

}
