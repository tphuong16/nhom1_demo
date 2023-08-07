<?php

namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class FirstCest
{
    public function tryToTest(AcceptanceTester $I)
    { 
        $I->amOnPage('/');
        $I->see('facebook');
    }
}
