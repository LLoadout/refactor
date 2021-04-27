<?php

namespace App\Http\Refactors;

class PhpArrayKeyMakeUppercase extends Refactor implements RefactorInterface
{
    public $title       = "Change the case of array keys";
    public $description = "Sometimes you want to change the case of array keys, this can been done efficiently";
    public $requires    = ['php' => '4.0.0'];
    public $doc         = "https://www.php.net";

    public function original($args): phpArrayKeyMakeUppercase
    {
        /** code */

        $myArray = array("name" => "John Doe", "Age" => 40, "emAil" => "john@email.com");

        $newArray = [];
        foreach($myArray as $key => $value){
            $key = strtoupper($key);
            $newArray[strtoupper($key)] = $value;
        }
        $myArray = $newArray;
        $outputOriginal = json_encode($myArray);

        /** end code */

        $this->showOutput(__FUNCTION__, $outputOriginal);
        return $this;
    }

    public function refactor($args): phpArrayKeyMakeUppercase
    {
        /** code */

        $myArray = array("name" => "John Doe", "Age" => 40, "emAil" => "john@email.com");

        $myArray = array_change_key_case($myArray, CASE_UPPER);
        $outputRefactored = json_encode($myArray);

        /** end code */

        $this->showOutput(__FUNCTION__ , $outputRefactored);
        return $this;
    }

    public function getExplanation(): string
    {
        return '
            Assume you want to be all your are keys in a certain case, either uppercase or lowercase.
            You can loop your keys and change the keys but this can be done more efficient.
        ';
    }

}
