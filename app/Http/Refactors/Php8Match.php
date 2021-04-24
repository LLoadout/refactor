<?php

namespace App\Http\Refactors;

class Php8Match extends Refactor implements RefactorInterface
{
    public $title       = "Refactoring to match";
    public $description = "In this refactoring we change a switch statement to a match statement";
    public $requires    = ["php"  => "8.0.0"];
    public $doc         = "https://www.php.net/manual/en/control-structures.match.php";
    public $querystring = "?status=2";

    const PENDING = 1;
    const ACCEPTED = 2;
    const REJECTED = 3;
    const BLOCKED = 4;

    public function original($args): PHP8Match
    {
        /** code */

        $status = (int)$args['status'];

        switch ($status) {
            case 1:
                $notifier = $this->sendPendingNotification();
                break;
            case 2:
                $notifier = $this->sendAcceptedNotification();
                break;
            case 3:
                $notifier = $this->sendRejectedNotification();
                break;
            case 4:
                $notifier = $this->sendBlockedNotification();
            default:
                $notifier = $this->sendDefaultNotification();
                break;
        }

        /** end code */


        $this->showOutput(__FUNCTION__, $notifier->notify->__invoke());
        return $this;
    }

    public function refactor($args): PHP8Match
    {
        /** code */

        $status = (int)$args['status'];

        $notifier = match ($status) {
            self::PENDING => $this->sendPendingNotification(),
            self::ACCEPTED => $this->sendAcceptedNotification(),
            self::REJECTED => $this->sendRejectedNotification(),
            self::BLOCKED => $this->sendBlockedNotification(),
            default => $this->sendDefaultNotification()
        };

        /** end code */


        $this->showOutput(__FUNCTION__, $notifier->notify->__invoke());
        return $this;
    }

    public function getExplanation(): string
    {
        return '
            The match expression branches evaluation based on an identity check of a value. Similarly to a switch 
            statement, a match expression has a subject expression that is compared against multiple alternatives. 
            Unlike switch, it will evaluate to a value much like ternary expressions. Unlike switch, the comparison
            is an identity check (===) rather than a weak equality check (==). Match expressions are available as 
            of PHP 8.0.0.
        ';
    }

}
