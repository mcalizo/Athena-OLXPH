<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 01/12/2016
 * Time: 2:27 PM
 */

namespace Tests\Bdd\context;

use Tests\Pages\Oneweb\HomePage;
use Tests\Pages\Oneweb\ManagePage;
use Tests\Pages\Oneweb\PaymentPage;
use Tests\Pages\Oneweb\BoostRefreshPage;

use Athena\Athena;
use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Pages\Oneweb\ThirdPartyPage;

class VasRefreshContext extends AthenaTestContext
{

    private $homepage;
    private $manageads;
    private $payment;
    private $refresh;
    private $thirdpartypage;
    private $boostrefresh;


    public function __construct(){
        $this ->homepage = new HomePage();
        $this ->manageads = new ManagePage();
        $this ->payment = new PaymentPage();
        $this ->refresh = new BoostRefreshPage();
        $this ->thirdpartypage =new ThirdPartyPage();
        $this ->boostrefresh = new BoostRefreshPage();
    }


    /**
     * @Given /^I click the user profile button$/
     */
    public function iClickTheUserProfileButton()
    {
        $this->manageads->clickUserProfileButton();
    }

    /**
     * @Then /^I should be in the Manage Ads page$/
     */
    public function iShouldBeInTheManageAdsPage()
    {
        $url = Athena::settings()->get('urls')->orFail();
        \PHPUnit_Framework_Assert::assertEquals($url['/'] . $url['manage'], $this->homepage->getBrowser()->getCurrentURL());

    }

    /**
     * @When /^I click the Refresh Button$/
     */
    public function iClickTheRefreshButton()
    {
        $this->manageads->clickElement('css',ManagePage::ELEMENT_MANAGE_REFRESH_CSS);
        sleep(5);;
    }

    /**
     * @Then /^I should able to see the modal with refresh options$/
     */
    public function iShouldAbleToSeeTheModalWithRefreshOptions()
    {
        $this->manageads->verifyRefreshModal();
    }

    /**
     * @Given /^I click the Refresh Button in Modal$/
     */
    public function iClickTheRefreshButtonInModal()
    {
        $this->manageads->clickElement('css',ManagePage::ELEMENT_MANAGE_REFRESH_NOW_CSS);
    }


    /**
     * @Then /^I should be redirected to Refresh page$/
     */
    public function iShouldBeRedirectedToRefreshPage()
    {
        \PHPUnit_Framework_Assert::assertContains(BoostRefreshPage::STRING_BOOST_REFRESH_URL, $this->refresh->getBrowser()->getCurrentURL());
    }

    /**
     * @Given /^I check the terms and conditions$/
     */
    public function iCheckTheTermsAndConditions()
    {
        $this->boostrefresh->clickTermCondition();
    }

    /**
     * @Given /^I click the Confirm Refresh for this ad and process the payment Button$/
     */
    public function iClickTheConfirmRefreshForThisAdAndProcessThePaymentButton()
    {
        $this->boostrefresh->clickProceedPayments();
    }

    /**
     * @Then /^I should be redirected to the Payment page$/
     */
    public function iShouldBeRedirectedToThePaymentPage()
    {
     $this->payment->assertElementPresentAtLeastOnce('id',PaymentPage::ELEMENT_PAYMENT_BUTTON_ID);
    }

    /**
     * @Given /^I click OLX Gold for payments$/
     */
    public function iClickOLXGoldForPayments()
    {
        $this->payment->clickOlxGoldPayment();
    }

    /**
     * @Then /^I should be redirected to success payment page$/
     */
    public function iShouldBeRedirectedToSuccessPaymentPage()
    {
        \PHPUnit_Framework_Assert::assertContains(PaymentPage::STRING_OLX_GOLD_PAYMENT_PAGE, $this->payment->getBrowser()->getCurrentURL());
    }

    /**
     * @Then /^I should redirect to the external website$/
     */
    public function iShouldRedirectToTheExternalWebsite()
    {
        \PHPUnit_Framework_Assert::assertContains(ThirdPartyPage::STRING_MASTERCARD_PAYMENT, $this->thirdpartypage->getBrowser()->getCurrentURL());
    }

    /**
     * @Then /^I should be redirected to the paypal page$/
     */
    public function iShouldBeRedirectedToThePaypalPage()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should redirected to the paypal page$/
     */
    public function iShouldRedirectedToThePaypalPage()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should be redirected to the dragonpay page$/
     */
    public function iShouldBeRedirectedToTheDragonpayPage()
    {
        \PHPUnit_Framework_Assert::assertContains(ThirdPartyPage::STRING_DRAGONPAY_PAYMENT, $this->thirdpartypage->getBrowser()->getCurrentURL());
    }

    /**
     * @Then /^I should redirect to the dragonpay page\/GCash$/
     */
    public function iShouldRedirectToTheDragonpayPageGCash()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should notify by the systems that i have insufficient OLX gold credits$/
     */
    public function iShouldNotifyByTheSystemsThatIHaveInsufficientOLXGoldCredits()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I input valid promo code and click the apply button$/
     */
    public function iInputValidPromoCodeAndClickTheApplyButton()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should be notified by the system that the promo is valid$/
     */
    public function iShouldBeNotifiedByTheSystemThatThePromoIsValid()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I input invalid promo code and click the apply button$/
     */
    public function iInputInvalidPromoCodeAndClickTheApplyButton()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should be notified by the system that the prome is invalid$/
     */
    public function iShouldBeNotifiedByTheSystemThatThePromeIsInvalid()
    {
        throw new PendingException();
    }

    /**
     * @When /^I click ellipsis Button$/
     */
    public function iClickEllipsisButton()
    {
        $this->manageads->clickEllipsisButton();
        sleep(5);
    }


    /**
     * @Then /^I should be notified by the system that the promo is invalid$/
     */
    public function iShouldBeNotifiedByTheSystemThatThePromoIsInvalid()
    {

    }

    /**
     * @Then /^I should able to see the ellipsis modal with refresh options$/
     */
    public function iShouldAbleToSeeTheEllipsisModalWithRefreshOptions()
    {
        $this->manageads->verifyEllipsisModal();
    }

    /**
     * @Given /^I click the Refresh Button in ellipsis Modal$/
     */
    public function iClickTheRefreshButtonInEllipsisModal()
    {
        $this->manageads->clickEllipsisRefresh();
    }

    /**
     * @When /^I click drop\-down options$/
     */
    public function iClickDropDownOptions()
    {
        $this->manageads->clickElement('css', ManagePage::ELEMENT_MANAGE_DROPDOWN_OPTION_CSS);
    }

    /**
     * @Then /^I should able to see the content of drop\-down$/
     */
    public function iShouldAbleToSeeTheContentOfDropDown()
    {
        throw new PendingException();
    }

    /**
     * @When /^I select (.*) in drop\-down$/
     */
    public function iSelectInDropDown($options)
    {
        $this->manageads->selectInDropDownValue('css', ManagePage::ELEMENT_MANAGE_DROPDOWN_OPTION_CSS, $options);
    }


}