<?php
namespace Page;
use \Codeception\Actor;
class LoginPage
{
    public static $URL = 'https://www.facebook.com/';
    // Define Facebook login form fields
    public static $emailField = '#email';
    public static $passwordField = '#pass';
    public static $loginButton = '#loginbutton';
    /**
     * @var Actor
     */
    protected $actor;
    /**
     * LoginPage constructor.
     * @param Actor $actor
     */
    public function __construct(Actor $actor)
    {
        $this->actor = $actor;
    }
    /* Open the Facebook login page*/
    public function open()
    {
        $this->actor->amOnPage(self::$URL);
    }
    /**
     * Fill in email and password fields and click the login button
     * @param string $email
     * @param string $password
     */
    public function login($email, $password)
    {
        $this->actor->fillField(self::$emailField, $email);
        $this->actor->fillField(self::$passwordField, $password);
        $this->actor->click(self::$loginButton);
    }
    /* Check if the login page is displayed */
    public function seeLoginPage()
    {
        $this->actor->seeElement(self::$emailField);
        $this->actor->seeElement(self::$passwordField);
        $this->actor->seeElement(self::$loginButton);
    }
    /* Check if the login failed with an error message*/
    public function seeLoginFailedErrorMessage()
    {
        // Add assertions here to check if the login failed and an error message is displayed
    }
    /* Check if the login was successful and the user is redirected to the home page*/
    public function seeHomePageAfterLogin()
    {
        // Add assertions here to check if the login was successful and the user is redirected to the home page
    }
}
