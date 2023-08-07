<?php
class FacebookLoginCest
{
    // Test login with valid credentials
    public function loginWithValidCredentials($I)
    {
        $I->amOnPage('/');
        // Fill in the email and password fields and click the login button
        $I->fillField(['name' => 'email'], 'your@gmail.com');
        $I->fillField(['name' => 'pass'], 'yourpassword');
        $I->click(['name' => 'login']);
        // Add an assertion to check if login is successful
        $I->seeInCurrentUrl('/'); 
    }
    // Test login with invalid credentials
    public function loginWithInvalidCredentials($I)
    {
        $I->amOnPage('/');
        // Fill in the email and password fields with invalid data and click the login button
        $I->fillField(['name' => 'email'], 'invalid_email');
        $I->fillField(['name' => 'pass'], 'invalid_password');
        $I->click(['name' => 'login']);
        // Add assertions here to check if login failed 
        $I->see('Find your account and log in.'.' Log in'.' Forgotten password?');
    }
    // Test login with non-existent account
    public function loginWithNonExistentAccount($I)
    {
        $I->amOnPage('/');
        // Fill in the email and password fields with non-existent account data and click the login button
        $I->fillField(['name' => 'email'], 'non_existent_account@gmail.com');
        $I->fillField(['name' => 'pass'], 'random_password');
        $I->click(['name' => 'login']);
        // Add assertions here to check if login failed due to non-existent account
        $I->see('Find your account and log in.'); // Example of an error message
    }
    // Test login with incorrect password
    public function loginWithIncorrectPassword($I)
    {
        $I->amOnPage('/');
        // Fill in the email and password fields with valid email but incorrect password and click the login button
        $I->fillField(['name' => 'email'], 'your@gmail.com');
        $I->fillField(['name' => 'pass'], 'incorrect_password');
        $I->click(['name' => 'login']);
        // Add assertions here to check if login failed due to incorrect password
        $I->see('Try another way'); 
    }
}
