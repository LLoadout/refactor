<?php

namespace App\Http\Refactors;

class PHP8Match extends Refactor implements RefactorInterface
{
    const PENDING = 1;
    const ACCEPTED = 2;
    const REJECTED = 3;
    const BLOCKED = 4;

    public function original($args): PHP8Match
    {
        /** code to refactor **/

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

        /** end code to refactor  */


        $this->showOutput(__FUNCTION__, $notifier->notify->__invoke());
        return $this;
    }

    public function refactor($args): PHP8Match
    {
        /** refactored code **/

        $status = (int)$args['status'];

        $notifier = match ($status) {
            self::PENDING => $this->SendPendingNotification(),
            self::ACCEPTED => $this->SendAcceptedNotification(),
            self::REJECTED => $this->SendRejectedNotification(),
            self::BLOCKED => $this->SendBlockedNotification(),
        };

        /** end refactored code  */


        $this->showOutput(__FUNCTION__, $notifier->notify->__invoke());
        return $this;
    }

    public function getExplanation() : string
    {
        return '
            <h1>This shows blabla</h1>
        ';
    }

}
