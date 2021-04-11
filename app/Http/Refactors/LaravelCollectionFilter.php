<?php

namespace App\Http\Refactors;

class LaravelCollectionFilter extends Refactor implements RefactorInterface
{
    public $title       = "Refactoring to collection filter";
    public $description = "Collections are very powerful, this refactor shows the filter method";
    public $requires    = ['laravel >= 5.1'];
    public $url         = "laravel-collection-filter";
    public $doc         = "https://laravel.com/docs/8.x/collections#method-filter";
    public $icon        = "https://laravel.com/img/favicon/favicon.ico";

    public function original($args): LaravelCollectionFilter
    {
        /** code */

        $arr = array(
            1, 2, 99, 201,
        );

        $between1and100 = array_filter($arr, function ($value) {
            return ($value >= 1 && $value <= 100);
        });

        /** end code */

        $this->showOutput(__FUNCTION__, json_encode($between1and100));
        return $this;
    }

    public function refactor($args): LaravelCollectionFilter
    {
        /** code */

        $arr = array(
            1, 2, 99, 201,
        );

        $between1and100 = collect($arr)->filter(fn($value) => ($value >= 1 && $value <= 100));

        /** end code */

        $this->showOutput(__FUNCTION__, json_encode($between1and100));
        return $this;
    }

    public function getExplanation(): string
    {
        return '
            The filter method filters the collection using the given callback, keeping only those items that pass a given truth test:   
        ';
    }

}
