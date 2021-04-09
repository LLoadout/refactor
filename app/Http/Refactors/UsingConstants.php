<?php

namespace App\Http\Refactors;

class UsingConstants extends Refactor implements RefactorInterface
{
    public $title     = "Refactoring to constants";
    public $longtitle = "Using constants is much more self-explanatory than using numbers";

    const PENDING = 1;
    const ACCEPTED = 2;
    const REJECTED = 3;
    const BLOCKED = 4;

    public function original($args): UsingConstants
    {
        /** code */

        $status = (int)$args['status'];

        switch ($status) {
            case 1:
                $notifier = $this->SendPendingNotification();
                break;
            case 2:
                $notifier = $this->SendAcceptedNotification();
                break;
            case 3:
                $notifier = $this->SendRejectedNotification();
                break;
            case 4:
                $notifier = $this->SendBlockedNotification();
                break;
        }

        /** end code */


        $this->showOutput(__FUNCTION__, $notifier->notify->__invoke());
        return $this;
    }

    public function refactor($args): UsingConstants
    {
        /** code */

        /*
        Define in body of class
        const PENDING = 1;
        const ACCEPTED = 2;
        const REJECTED = 3;
        const BLOCKED = 4;
        */

        $status = (int)$args['status'];

        switch ($status) {
            case self::PENDING:
                $notifier = $this->SendPendingNotification();
                break;
            case self::ACCEPTED:
                $notifier = $this->SendAcceptedNotification();
                break;
            case self::REJECTED:
                $notifier = $this->SendRejectedNotification();
                break;
            case self::BLOCKED:
                $notifier = $this->SendBlockedNotification();
                break;
        }

        /** end code */


        $this->showOutput(__FUNCTION__, $notifier->notify->__invoke());
        return $this;
    }

    public function getExplanation(): string
    {
        return '
            A constant is an identifier (name) for a simple value. As the name suggests, 
            that value cannot change during the execution of the script (except for magic
             constants, which aren\'t actually constants). 
             Constants are case-sensitive. By convention, constant identifiers are always uppercase.
            <br/><br/>
            source: https://www.php.net/manual/en/language.constants.php
        ';
    }

}
