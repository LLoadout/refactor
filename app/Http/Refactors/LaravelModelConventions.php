<?php

namespace App\Http\Refactors;

class LaravelModelConventions extends Refactor implements RefactorInterface
{
    public $title       = "Model naming conventions will save you time";
    public $description = "If you use the naming conventions as stated in the documentation you will prevent a lot of boilerplate code";
    public $requires    = ['laravel' => '>= 5.0'];
    public $doc         = "https://laravel.com/docs/8.x/eloquent#table-names";
    public $icon        = "https://laravel.com/img/favicon/favicon.ico";


    public function original($args): LaravelModelConventions
    {
        /** code */


        /** stub
        App\Models;

        use Illuminate\Database\Eloquent\Model;

        class VenueReviewReply extends Model
        {
                 public $table = 'venuereviewreplies';

                 public function venuereview()
                 {
                     return $this->belongsTo('App\Models\VenueReview', 'venuereview_id');
                 }
        }
         stub */


        /** end code */


        return $this;
    }

    public function refactor($args): LaravelModelConventions
    {
        /** code */

        /** stub
        namespace App\Models;

        use Illuminate\Database\Eloquent\Model;

        class VenueReviewReply extends Model
        {
                 public function venuereview()
                 {
                     return $this->belongsTo(VenueReview::class);
                 }
        }

        stub */

       /** end code */

        return $this;
    }

    public function getExplanation(): string
    {
        return '
            If you use the naming conventions as stated in the documentation you will prevent a lot of boilerplate code.
            In this example there is a table named venuereviewreplies , not meeting the Laravel naming conventions.
            If we rename the table to venue_reviw_replies we can unlock the power of the models and prevent boilerplate code
        ';
    }

}
