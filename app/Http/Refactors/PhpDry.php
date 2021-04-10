<?php

namespace App\Http\Refactors;

class PhpDry extends Refactor implements RefactorInterface
{
    public $title       = "Dry programming";
    public $description = "Sometimes i find myself repeating code , most of the time when business logic changes and we start implementing if statements.";

    public function original($args): PhpDry
    {
        $companyId = 123456789;
        $mount     = "/mnt/path";
        $identfier = "identifier";

        /** code */

        if (is_null($companyId)) {
            if (!auth()->check()) {
                $path = $mount . '/remote/_chunks' . $identfier;
            } else {
                $path = $mount . '/' . auth()->user->companyId . '/_chunks' . $identfier;
            }
        } else {
            $path = $mount . '/' . $companyId . '/_chunks/' . $identfier;
        }

        /** end code */

        $this->showOutput(__FUNCTION__, "This is the path : {$path}");
        return $this;
    }

    public function refactor($args): PhpDry
    {

        $companyId = 123456789;
        $mount     = "/mnt/path";
        $identfier = "identifier";

        /** code */

        // implementend in two lines for readablity reasons
        $ifNoCompanyId = (!auth()->check() ? "remote" : auth()->user->companyId);
        $companyFolder = $companyId ?? $ifNoCompanyId;

        // or even shorter , but maybe less readable
        $companyFolder = $companyId ?? (!auth()->check() ? "remote" : auth()->user->companyId);

        $path = $mount . '/' . $companyFolder . '/_chunks/' . $identfier;

        /** end code */

        $this->showOutput(__FUNCTION__, "This is the path : {$path}");

        return $this;
    }

    public function getExplanation(): string
    {
        return '
        ';
    }

}
