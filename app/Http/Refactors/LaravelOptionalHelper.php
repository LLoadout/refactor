<?php

namespace App\Http\Refactors;

class LaravelOptionalHelper extends Refactor implements RefactorInterface
{
    public $title       = "Refactoring to the optional helper";
    public $description = "The optional helper gives you a clean syntax, instead of using checks";
    public $requires    = ['laravel' => '6.x'];
    public $doc         = "https://laravel.com/docs/6.x/helpers#method-optional";
    public $icon        = "https://laravel.com/img/favicon/favicon.ico";

    public function original($args): LaravelOptionalHelper
    {
        /** code */

        $user       = (object)['name' => 'Luke', 'father' => (object)['name' => 'Anakin']];
        $fatherName = null;
        if (!is_null($user->father)) {
            $fatherName = $user->father->name;
        }

        /** end code */

        $this->showOutput(__FUNCTION__, "Hi {$user->name}, {$fatherName} here , I'm your father");
        return $this;
    }

    public function refactor($args): LaravelOptionalHelper
    {
        /** code */

        // Example 1 : The optional helper will check if the user's father object's name is set.
        $user        = (object)['name' => 'Luke', 'father' => (object)['name' => 'Anakin']];
        $fatherName1 = optional(optional($user)->father)->name;

        // Example 2 : Even if no father is set to Luke this code will work and return null
        $user        = (object)['name' => 'Luke'];
        $fatherName2 = optional(optional($user)->father)->name;

        /** end code */

        $this->showOutput(__FUNCTION__ . " - example 1 ", "Hi {$user->name}, {$fatherName1} here , I'm your father");
        $this->showOutput(__FUNCTION__ . " - example 2 ", "Hi {$user->name}, {$fatherName2} here , I'm your father");
        return $this;
    }

    public function getExplanation(): string
    {
        return '
            The optional function accepts any argument and allows you to access properties
            or call methods on that object. If the given object is null, properties and 
            methods will return null instead of causing an error:
        ';
    }

}
