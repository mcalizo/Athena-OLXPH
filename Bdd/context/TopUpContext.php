<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 01/12/2016
 * Time: 2:25 PM
 */

namespace Tests\Bdd\context;


use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Pages\Oneweb\LoginPage;
use Tests\Pages\Oneweb\ManagePage;
use Tests\Pages\Oneweb\OneWeb;
use Tests\Pages\Oneweb\PaymentPage;
use Tests\Pages\Oneweb\PaymentsPage;
use Tests\Pages\Oneweb\ThirdPartyPage;
use Tests\Pages\Oneweb\TopUpPage;

class TopUpContext extends AthenaTestContext
{
    private $manageads;
    private $topuppage;
    private $paymentpage;
    private $oneweb;
    private $login;
    private $thirdpartypage;
    
    public function __construct()
    {
        $this->manageads = new ManagePage();
        $this->topuppage = new TopUpPage();
        $this->paymentpage = new  PaymentPage();
        $this->oneweb = new OneWeb();
        $this->payments = new PaymentsPage();
        $this->login = new LoginPage();
        $this->thirdpartypage = new ThirdPartyPage();
    }



    /**
     * @Given /^I am in Manage ads page$/
     */
    public function iAmInManageAdsPage()
    {
//        $this->manageads->openPage('/');
//        $this->oneweb->clickElement('css',HomePage::ELEMENT_LOGIN_BUTTON_CSS);
//        $this->login->loginToUserAccount(Athena::settings()->get('email')->orFail(),Athena::settings()->get('password')->orFail());
//        //$this->manageads->clickElement('css', HomePage::ELEMENT_USER_LOGGEDIN_ICON_CSS);
//        $this->oneweb->getBrowser()->get('manage');

        $this->manageads->loginAndOpenManagePage();
    }

    /**
     * @When /^I click Payments$/
     */
    public function iClickPayments()
    {
        $this->manageads->clickPaymentButton();
    }

    /**
     * @Then /^I should be in the Payment Logs page$/
     */
    public function iShouldBeInThePaymentLogsPage()
   {
       \PHPUnit_Framework_Assert::assertContains("payments", $this->manageads->getBrowser()->getCurrentURL());
   }

    /**
     * @Given /^I am in Payment Logs page$/
     */
    public function iAmInPaymentLogsPage()
    {
        throw new PendingException();
    }



    /**
     * @Given /^I click Buy OLX gold credits button$/
     */
    public function iClickBuyOLXGoldCreditsButton()
    {
        $this->manageads->ClickBuyOLXGoldCreditsButton();
    }

    /**
     * @Given /^I input (.*) credits to buy$/
     */
    public function iInputCreditsToBuy($amount)
    {
        $this->topuppage->enterString('id',TopUpPage::ELEMENT_TOPUP_AMOUNT_ID,$amount);
    }

    /**
     * @Given /^I input (.*) in the address text field$/
     */
    public function iInputInTheAddressTextField($Address)
    {
        $this->topuppage->enterString('name',TopUpPage::ELEMENT_TOPUP_ADDRESS_NAME,$Address);
    }

    /**
     * @Given /^I check the Terms and condition$/
     */
    public function iCheckTheTermsAndCondition()
    {
      $this->topuppage->clickTerms();
    }

    /**
     * @Given /^I click Proceed with payment button$/
     */
    public function iClickProceedWithPaymentButton()
    {
        $this->topuppage->clickProceedPayments();
    }

    /**
     * @Then /^I should redirected to the Payment page$/
     */
    public function iShouldRedirectedToThePaymentPage()
    {
        \PHPUnit_Framework_Assert::assertContains("pay", $this->paymentpage->getBrowser()->getCurrentURL());
    }

    /**
     * @Given /^I click Credit Card$/
     */
    public function iClickCreditCard()
    {
        $this->paymentpage->clickElement('id',PaymentPage::ELEMENT_PAYMENT_CCARD_ID);
        sleep(30);
    }

    /**
     * @Then /^I should redirected to the BDO page$/
     */
    public function iShouldRedirectedToTheBDOPage()
    {
        \PHPUnit_Framework_Assert::assertContains("mastercard", $this->thirdpartypage->getBrowser()->getCurrentURL());
    }

    /**
     * @When /^I click Payment page$/
     */
    public function iClickPaymentPage()
    {
        $this->manageads->clickPaymentButton();
    }

    /**
     * @Given /^I click Paypal$/
     */
    public function iClickPaypal()
    {
        $this->paymentpage->clickElement('css',PaymentPage::ELEMENT_PAYMENT_PAYPAL_CSS);
        sleep(30);
    }

    /**
     * @Then /^I should redirected to the Paypal page$/
     */
    public function iShouldRedirectedToThePaypalPage()
    {
        $this->thirdpartypage->assertElementPresentAtLeastOnce('id',ThirdPartyPage::ELEMENT_PAYPAL_CREDIT_CARD_ID);
        \PHPUnit_Framework_Assert::assertContains("paypal", $this->thirdpartypage->getBrowser()->getCurrentURL());
    }

    /**
     * @Given /^I input (.*) in the step (\d+) text field$/
     */

    /**
     * @Given /^I click Credit Card via Paypal$/
     */
    public function iClickCreditCardViaPaypal()
    {
        $this->paymentpage->clickElement('css',PaymentPage::ELEMENT_PAYMENT_CCPAYPAL_CSS);
        sleep(15);
    }

    /**
     * @Given /^I click ATM Debit Card$/
     */
    public function iClickATMDebitCard()
    {
        $this->paymentpage->clickElement('id',PaymentPage::ELEMENT_PAYMENT_DEBITCARD_ID);
        sleep(30);
    }

    /**
     * @Then /^I should redirected to the Pesopay page$/
     */
    public function iShouldRedirectedToThePesopayPage()
    {
        \PHPUnit_Framework_Assert::assertContains("pesopay", $this->thirdpartypage->getBrowser()->getCurrentURL());
    }

    /**
     * @Given /^I click GCash$/
     */
    public function iClickGCash()
    {
        $this->paymentpage->clickElement('id',PaymentPage::ELEMENT_PAYMENT_GCASH_ID);
        sleep(40);
    }

    

    /**
     * @Given /^I click BDO$/
     */
    public function iClickBDO()
    {
        $this->paymentpage->clickElement('id',PaymentPage::ELEMENT_PAYMENT_BDO_ID);
        sleep(30);
    }

    /**
     * @Then /^I should see a modal that contains the Payment instructions for BDO$/
     */
    public function iShouldSeeAModalThatContainsThePaymentInstructionsForBDO()
    {
        $this->paymentpage->verifyBdoPaymentModal();
    }

    /**
     * @Given /^I click Cebuana$/
     */
    public function iClickCebuana()
    {
        $this->paymentpage->clickElement('id',PaymentPage::ELEMENT_PAYMENT_CEBUANA_ID);
        sleep(30);
    }

    /**
     * @Then /^I should see a modal that contains the Payment instructions for Cebuana$/
     */
    public function iShouldSeeAModalThatContainsThePaymentInstructionsForCebuana()
    {
        $this->paymentpage->verifyCebuanaPaymentModal();
    }

    /**
     * @Given /^I click LBC Dragonpay$/
     */
    public function iClickLBCDragonpay()
    {
        $this->paymentpage->clickElement('id',PaymentPage::ELEMENT_PAYMENT_LBC_ID);
        sleep(30);
    }

    /**
     * @Then /^I should redirect to lbc Dragonpay page$/
     */
    public function iShouldRedirectToLbcDragonpayPage()
    {
        \PHPUnit_Framework_Assert::assertContains("dragonpay", $this->thirdpartypage->getBrowser()->getCurrentURL());
    }

    /**
     * @Given /^I click 7\-Eleven$/
     */
    public function iClick7Eleven()
    {
        $this->paymentpage->clickElement('id',PaymentPage::ELEMENT_PAYMENT_7ELEVEN_ID);
        sleep(30);
    }

    /**
     * @Then /^I should see a modal that contains the Payment instructions for 7\-Eleven$/
     */
    public function iShouldSeeAModalThatContainsThePaymentInstructionsFor7Eleven()
    {
        $this->paymentpage->verifySevenelevenPaymentModal();
    }

    /**
     * @Given /^I click Other payment centers$/
     */
    public function iClickOtherPaymentCenters()
    {
        $this->paymentpage->clickElement('id',PaymentPage::ELEMENT_PAYMENT_OTHERPAYMENT_ID);
        sleep(30);
    }




}