<?php

namespace Step\Acceptance;

class LoginStep extends \AcceptanceTester
{
    public function loginToFacebook($email, $password)
    {
        $this->amOnPage('/'); 
        // Fill in the email and password fields and click the login button
        $this->fillField(['name' => 'email'], $email);
        $this->fillField(['name' => 'pass'], $password);
        $this->click(['name' => 'login']);
    }

    public function seeLoginPage()
    {
        $this->seeElement(['name' => 'email']);
        $this->seeElement(['name' => 'pass']);
        $this->seeElement(['name' => 'login']);
    }

}
