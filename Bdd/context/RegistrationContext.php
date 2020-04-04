<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 04/11/2016
 * Time: 4:28 PM
 */

namespace Tests\Bdd\context;

use Tests\Pages\Oneweb\LoginPage;
use Tests\Pages\Oneweb\RegisterPage;

use Athena\Athena;
use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;

class RegistrationContext extends AthenaTestContext
{
    private $acctlogin;
    private $registerpage;
    private $mobile;

    public function __construct(){
        $this->acctlogin = new LoginPage();
        $this->registerpage = new RegisterPage();
    }

    /**
     * @When /^I click the login button at home page$/
     */
    public function iClickTheLoginButtonAtHomePage()
    {
        $this->registerpage->clickLoginButtonHeader();
        sleep(3);
    }

    /**
     * @Then /^I should be in the login page$/
     */
    public function iShouldBeInTheLoginPage()
    {
        $url = Athena::settings()->get('urls')->orFail();
        $this->acctlogin->verifyAcctLoginElements();
        \PHPUnit_Framework_Assert::assertEquals($url["/"] . "/login", $this->registerpage->getBrowser()->getCurrentURL());
    }

    /**
     * @Given /^the register text link is present$/
     */
    public function theRegisterTextLinkIsPresent()
    {
        \PHPUnit_Framework_Assert::assertEquals(true , $this->registerpage->assertElementPresent(LoginPage::ELEMENT_REG_TEXT_LINK_ID));
    }

    /**
     * @When /^I click the register button$/
     */
    public function iClickTheRegisterButton()
    {
        $this->registerpage->clickElement('id',RegisterPage::ELEMENT_REGISTRATION_REG_BUTTON_ID);
    }

    /**
     * @Then /^I should be able to access the registration page$/
     */
    public function iShouldBeAbleToAccessTheRegistrationPage()
    {
        \PHPUnit_Framework_Assert::assertFalse($this->registerpage->isURLBroken($this->registerpage->getBrowser()->getCurrentURL()));
    }

    /**
     * @Given /^I am in the registration page$/
     */
    public function iAmInTheRegistrationPage()
    {
        $this->registerpage->openPage('register');
    }

    /**
     * @When /^I enter a name$/
     */
    public function iEnterAName()
    {
        $this->registerpage->enterName();
    }

    /**
     * @Given /^I enter a not register valid mobile number$/
     */
    public function iEnterANotRegisterValidMobileNumber()
    {
        $this->registerpage->enterNotRegisterValidMobileNumber();
    }

    /**
     * @Given /^I tick the terms of use$/
     */
    public function iCheckTheTermsOfUse()
    {
        $this->registerpage->acceptTerms();
    }

    /**
     * @Then /^the system should create a new account$/
     */
    public function theSystemShouldCreateANewAccount()
    {
        throw new PendingException();
    }

    /**
     * @Given /^the landing page is the registration\-confirmation page$/
     */
    public function theLandingPageIsTheRegistrationConfirmationPage()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I enter a registered mobile number$/
     */
    public function iEnterARegisteredMobileNumber()
    {
        $this->mobile = Athena::settings()->get('verified-phone')->orFail();
        $this->registerpage->enterString('name', RegisterPage::ELEMENT_REGISTRATION_INPUTMOBILE_NAME, $this->mobile);
    }

    /**
     * @Then /^the system should not create a new account$/
     */
    public function theSystemShouldNotCreateANewAccount()
    {
        throw new PendingException();
    }

    /**
     * @Given /^the landing page is the registration page$/
     */
    public function theLandingPageIsTheRegistrationPage()
    {
        $url = Athena::settings()->get('urls')->orFail();
        \PHPUnit_Framework_Assert::assertEquals($url["/"] . "/register",  $this->registerpage->getBrowser()->getCurrentURL());
    }

    /**
     * @Given /^an error message is displayed$/
     */
    public function anErrorMessageIsDisplayed()
    {
        \PHPUnit_Framework_Assert::assertNotNull($this->registerpage->verifyRegisteredAccountNotCreatedWarningMessage());
    }

    /**
     * @Given /^I enter an invalid mobile number$/

     */
    public function iEnterAnInvalidMobileNumber()
    {
        $this->registerpage->enterInvalidMobileNumber();
    }

    /**
     * @Then /^the system should not create a new account for registered mobile number$/
     */
    public function theSystemShouldNotCreateANewAccountForRegisteredMobileNumber()
    {
        \PHPUnit_Framework_Assert::assertEquals('Oops! Mobile number or email indicated is already associated with an OLX account. Do you want to login using this mobile number?',
            $this->registerpage->verifyRegisteredAccountNotCreatedWarningMessage());
    }

    /**
     * @Then /^the system should not create a new account for invalid mobile number$/
     */
    public function theSystemShouldNotCreateANewAccountForInvalidMobileNumber()
    {
        \PHPUnit_Framework_Assert::assertNull($this->registerpage->verifyInvalidMobileNotCreated());
    }

    /**
     * @When /^I click the register text link$/
     */
    public function iClickTheRegisterTextLink()
    {
        $this->registerpage->clickElement('id',LoginPage::ELEMENT_REG_TEXT_LINK_ID);
    }

    /**
     * @Given /^an error message is displayed for invalid mobile number$/
     */
    public function anErrorMessageIsDisplayedForInvalidMobileNumber()
    {
        \PHPUnit_Framework_Assert::assertNull($this->registerpage->verifyInvalidMobileNotCreated());
    }

    /**
     * @Given /^I enter disired password$/
     */
    public function iEnterDisiredPassword()
    {
        $this->registerpage->enterString('name',RegisterPage::ELEMENT_REGISTRATION_PASSWORD_NAME,RegisterPage::TEXT_PASSWORD);
    }

    /**
     * @Given /^I repeat enter disred password to confirm$/
     */
    public function iRepeatEnterDisredPasswordToConfirm()
    {
        $this->registerpage->enterString('name', RegisterPage::ELEMENT_REGISTRATION_PASSWORD2_NAME, RegisterPage::TEXT_PASSWORD);
    }
}