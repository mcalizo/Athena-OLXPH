<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 28/10/2016
 * Time: 11:42 AM
 */

namespace Tests\Bdd\context;


use Tests\Pages\Oneweb\HomePage;
use Tests\Pages\Oneweb\LoginPage;
use Tests\Pages\Oneweb\RegisterPage;

use Athena\Athena;
use Athena\Test\AthenaTestContext;

class LoginContext extends AthenaTestContext
{

    private $homepage;
    private $acctlogin;
    private $registerpage;

    const INVALID_PWD_STRING = 'invalidPass123';
    const UNREGISTERED_MOB = '09650011321678';
    const UNREGISTERED_EMAIL = 'unregistered_email@olx.ph';

    public function __construct(){
        $this->homepage = new HomePage();
        $this->acctlogin = new LoginPage();
        $this->registerpage = new RegisterPage();
    }


    /**
     * @Given /^I am in the login page$/
     */
    public function iAmInTheLoginPage()
    {
        //$this->acctlogin->getBrowser()->deleteAllCookies();
        $this->acctlogin->openPage("login");
    }

    /**
     * @Given /^I enter a valid password$/
     */
    public function iEnterAValidPassword()
    {
        $this->acctlogin->enterString('name', LoginPage::ACCT_LOGIN_PASSWORD_INPUT_NAME, Athena::settings()->get('password')->orFail());
    }

    /**
     * @Then /^I should be able to log in$/
     */
    public function iShouldBeAbleToLogIn()
    {
        $this->acctlogin->verifySuccessfulUserLogin();
    }

    /**
     * @Given /^the landing page is the home page$/
     */
    public function theLandingPageIsTheHomePage()
    {
        $url = Athena::settings()->get('urls')->orFail();
        \PHPUnit_Framework_Assert::assertEquals($url["/"],  rtrim($this->acctlogin->cleanUpUrl(),'/'));
    }

    /**
     * @When /^I enter a registered email address$/
     */
    public function iEnterARegisteredEmailAddress()
    {
        $this->acctlogin->enterString('name',LoginPage::ACCT_LOGIN_MOB_EMAIL_INPUT_NAME,Athena::settings()->get('email')->orFail());
    }

    /**
     * @Given /^I enter an invalid password$/
     */
    public function iEnterAnInvalidPassword()
    {
        $this->acctlogin->enterString('name',LoginPage::ACCT_LOGIN_PASSWORD_INPUT_NAME, self::INVALID_PWD_STRING);
    }

    /**
     * @Then /^I should not be able to log in$/
     */
    public function iShouldNotBeAbleToLogIn()
    {
        $this->acctlogin->verifyErrorModalDisplayed();
    }

    /**
     * @Given /^an error message is displayed for invalid username and password$/
     */
    public function anErrorMessageIsDisplayedForInvalidUsernameAndPassword()
    {
        //\PHPUnit_Framework_Assert::assertEquals(LoginPage::TEXT_INVALID_MESSAGING_USERNAME_PWD,$this->acctlogin->verifyErrorMessageDisplayed());
        \PHPUnit_Framework_Assert::assertContains(LoginPage::TEXT_INVALID_MESSAGING_USERNAME_PWD, $this->acctlogin->verifyErrorMessageDisplayed());
    }

    /**
     * @When /^I enter an unregistered mobile number$/
     */
    public function iEnterAnUnregisteredMobileNumber()
    {
        $this->acctlogin->enterString('name',LoginPage::ACCT_LOGIN_MOB_EMAIL_INPUT_NAME,self::UNREGISTERED_MOB);
    }

    /**
     * @Given /^I enter an password$/
     */
    public function iEnterAnPassword()
    {
        $password = Athena::settings()->get('password')->orFail();
        $this->acctlogin->enterUserPassword($password);
    }

    /**
     * @When /^I enter an unregistered email address$/
     */
    public function iEnterAnUnregisteredEmailAddress()
    {
        $this->acctlogin->enterString('name',LoginPage::ACCT_LOGIN_MOB_EMAIL_INPUT_NAME,self::UNREGISTERED_EMAIL);
    }

    /**
     * @When /^I click the login via facebook button$/
     */
    public function iClickTheLoginViaFacebookButton()
    {
        $this->acctlogin->clickElement('id', LoginPage::ACCT_LOGIN_VIA_FACEBOOK_ID);
        sleep(10);
    }

    /**
     * @When /^I click the login via google button$/
     */
    public function iClickTheLoginViaGoogleButton()
    {
        sleep(5);
        $this->acctlogin->waitForElementPresent();
        $this->acctlogin->clickElement('css', LoginPage::ACCT_LOGIN_VIA_GOOGLE_CSS);
        sleep(5);
        $this->acctlogin->focusNewWindowPopUp();
    }

    /**
     * @Given /^I enter email at facebook login page$/
     */
    public function iEnterEmailAtFacebookLoginPage()
    {
        $this->acctlogin->fbPageAccoutLoginEnterEmail();
    }

    /**
     * @Given /^I enter password at facebook login page$/
     */
    public function iEnterPasswordAtFacebookLoginPage()
    {
        $this->acctlogin->fbPageAccountLoginEnterPwd();
    }

    /**
     * @Given /^I click login button at facebook login page$/
     */
    public function iClickLoginButtonAtFacebookLoginPage()
    {
        $this->acctlogin->fbPageAccountClickLoginButton();
    }

    /**
     * @Given /^I enter registered google email$/
     */
    public function iEnterRegisteredGoogleEmail()
    {
        $this->acctlogin->googlePageAccoutLoginEnterEmail();
    }

    /**
     * @Given /^I enter google email password$/
     */
    public function iEnterGoogleEmailPassword()
    {
        $this->acctlogin->googlePageAccountLoginEnterPwd();
    }

    /**
     * @Given /^I click google login button$/
     */
    public function iClickGoogleLoginButton()
    {
        $this->acctlogin->googlePageAccountClickLoginButton();
        sleep(5);
        $this->acctlogin->focusOnMainWindow();
    }

    /**
     * @When /^I click the login button$/
     */
    public function iClickTheLoginButton()
    {
        $this->acctlogin->clickElement('id', LoginPage::ACCT_LOGIN_BUTTON_ID);
        sleep(5);
    }

    /**
     * @When /^I enter a registered mobile number at login page$/
     */
    public function iEnterARegisteredMobileNumberAtLoginPage()
    {
        $this->acctlogin->enterString('name', LoginPage::ACCT_LOGIN_MOB_EMAIL_INPUT_NAME, Athena::settings()->get('verified-phone')->orFail());
    }

    /**
     * @Given /^I click next button$/
     */
    public function iClickNextButton()
    {
        $this->acctlogin->googleClickNextButtonLogin();
    }
}