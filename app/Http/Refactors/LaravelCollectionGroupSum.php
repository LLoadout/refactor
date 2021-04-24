<?php

namespace App\Http\Refactors;

class LaravelCollectionGroupSum extends Refactor implements RefactorInterface
{
    public $title       = "Refactoring to collections, groupby, map and sum";
    public $description = "Collections are very powerful, here we show the power of groupby, map and sum in one line ";
    public $requires    = ['laravel' => '5.1'];
    public $doc         = "https://laravel.com/docs/8.x/collections";
    public $icon        = "https://laravel.com/img/favicon/favicon.ico";

    public function original($args): LaravelCollectionGroupSum
    {
        /** code */

        /*
         *  $offer = [
                'name'  => 'offer1',
                'lines' => [
                    ['group' => 1, 'price' => 10],
                    ['group' => 1, 'price' => 20],
                    ['group' => 2, 'price' => 30],
                    ['group' => 2, 'price' => 40],
                    ['group' => 3, 'price' => 50],
                    ['group' => 3, 'price' => 60]
                ]
             ];
         */

        $offer = $this->getOffer();

        $totalPerGroup = [];
        if (count($offer->lines) > 0) {
            foreach ($offer->lines as $line) {
                if (isset($totalPerGroup[$line->group])) {
                    $totalPerGroup[$line->group] += $line->price;
                } else {
                    $totalPerGroup[$line->group] = $line->price;
                }
            }
        }
        /** end code */

        $this->showOutput(__FUNCTION__, json_encode($totalPerGroup));
        return $this;
    }

    public function refactor($args): LaravelCollectionGroupSum
    {
        /** code */

        /*
         *  $offer = [
                'name'  => 'offer1',
                'lines' => [
                    ['group' => 1, 'price' => 10],
                    ['group' => 1, 'price' => 20],
                    ['group' => 2, 'price' => 30],
                    ['group' => 2, 'price' => 40],
                    ['group' => 3, 'price' => 50],
                    ['group' => 3, 'price' => 60]
                ]
             ];
         */

        $offer         = $this->getOffer();
        $totalPerGroup = collect($offer->lines)->groupBy('group')->map(fn($group) => $group->sum('price'));

        /** end code */

        $this->showOutput(__FUNCTION__, json_encode($totalPerGroup));
        return $this;
    }

    public function getExplanation(): string
    {
        return '
            In this code we need to show the total price of and offers lines, 
            grouped by the group the lines are in. This refactor makes it a one-liner 🔥
        ';
    }

    private function getOffer()
    {
        $offer = [
            'name'  => 'offer1',
            'lines' => [
                ['group' => 1, 'price' => 10],
                ['group' => 1, 'price' => 20],
                ['group' => 2, 'price' => 30],
                ['group' => 2, 'price' => 40],
                ['group' => 3, 'price' => 50],
                ['group' => 3, 'price' => 60]
            ]
        ];

        //make nested objects
        return json_decode(json_encode($offer));
    }
}
