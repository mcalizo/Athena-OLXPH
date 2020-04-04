<?php
/**
 * Created by PhpStorm.
 * User: jbrp
 * Date: 12/6/16
 * Time: 4:47 PM
 */

namespace Tests\Bdd\context;


use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Pages\Oneweb\BoostPage;
use Tests\Pages\Oneweb\BoostRefreshPage;
use Tests\Pages\Oneweb\ManagePage;
use Tests\Pages\Oneweb\PaymentsPage;


class AdBoostingPackageContext extends AthenaTestContext
{
    private $admanage;
    private $payment;
    private $boostpage;
    private $boostrefresh;


    public function __construct(){
        $this->admanage = new ManagePage();
        $this->payment = new PaymentsPage();
        $this->boostpage = new BoostPage();
        $this->boostrefresh = new BoostRefreshPage();
    }

    /**
     * @Then /^I see ad modal on screen$/
     */
    public function iSeeAdModalOnScreen()
    {
        sleep(5);
        $this->admanage->verifyEllipsisModal();
    }

    /**
     * @Then /^I see Boost ad page$/
     */
    public function iSeeBoostAdPage()
    {
        sleep(5);
        $this->admanage->verifyBoostAdModal();
    }

    /**
     * @Given /^I select Basic Package$/
     */
    public function iSelectBasicPackage()
    {
        sleep(5);
        $this->boostpage->clickBasicButton();
    }

    /**
     * @Then /^I should see correct price from summary section$/
     */
    public function iShouldSeeCorrectPriceFromSummarySection()
    {
        $this->boostpage->verifyPackagePrice();
    }

    /**
     * @Given /^I should see correct Package name on summary section$/
     */
    public function iShouldSeeCorrectPackageNameOnSummarySection()
    {
        $this->boostpage->verifyBasicPackageName();
    }

    /**
     * @Given /^I tick the agreement checkbox$/
     */
    public function iTickTheAgreementCheckbox()
    {
        $this->boostpage->clickAgree();
    }

    /**
     * @Then /^I should see the Confirm button should be available to click$/
     */
    public function iShouldSeeTheConfirmButtonShouldBeAvailableToClick()
    {
        $this->boostpage->clickProceedButton();
    }

    /**
     * @Then /^I should see payment page with total summary$/
     */
    public function iShouldSeePaymentPageWithTotalSummary()
    {
        $this->boostpage->verifyBasicPackage();
    }

    /**
     * @Given /^I should see payment option selection$/
     */
    public function iShouldSeePaymentOptionSelection()
    {
        $this->boostpage->verifyPaymentOptionField();
    }

    /**
     * @Then /^I should see success message with posting date and ad validity$/
     */
    public function iShouldSeeSuccessMessageWithPostingDateAndAdValidity()
    {
        sleep(5);
        \PHPUnit_Framework_Assert::assertContains("/pay/finish", $this->payment->getBrowser()->getCurrentURL());
    }

    /**
     * @Given /^I select Premium Package$/
     */
    public function iSelectPremiumPackage()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I select VIP Package$/
     */
    public function iSelectVIPPackage()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I click Boost ad button on an ad$/
     */
    public function iClickBoostAdButtonOnAnAd()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I click Ad Boost Package Button$/
     */
    public function iClickAdBoostPackageButton()
    {
        sleep(6);
        $this->admanage->clickEllipsisAdboostButton();
    }

    /**
     * @Given /^I click Confirm ad\-boosting to confirm payment$/
     */
    public function iClickConfirmAdBoostingToConfirmPayment()
    {
        $this->boostpage->clickProceedButton();
    }

    /**
     * @When /^I click OLX Gold for payment$/
     */
    public function iClickOLXGoldForPayment()
    {
        $this->boostpage->clickOGButton();
    }

    /**
     * @When /^I click Recommended boosting package$/
     */
    public function iClickRecommendedBoostingPackage()
    {
        sleep(5);
        $this->admanage->clickEllipsisBoostButton();
    }

    /**
     * @Then /^I see Confirmation boosting package page$/
     */
    public function iSeeConfirmationBoostingPackagePage()
    {
        sleep(5);
        $this->boostpage->verifyConfirmBoostAd();
    }

    /**
     * @Given /^I select Starter Package$/
     */
    public function iSelectStarterPackage()
    {
        $this->boostpage->clickElement('css', BoostPage::ELEMENT_CLICK_STARTER_PACKAGE_CSS);
    }

    /**
     * @Given /^I should see correct Package name for (.*) on summary section$/
     */
    public function iShouldSeeCorrectPackageNameForOnSummarySection($packageName)
    {
        \PHPUnit_Framework_Assert::assertEquals($packageName, $this->boostpage->getElementText('id',BoostPage::ELEMENT_SUMMARY_PACKAGE_ID));
    }

    /**
     * @Then /^I should see payment page with total summary for (.*) package$/
     */
    public function iShouldSeePaymentPageWithTotalSummaryForPackage($packageName)
    {
        \PHPUnit_Framework_Assert::assertEquals($packageName . " Package"  , $this->boostpage->getElementText('css',BoostPage::ELEMENT_SUMMARY_PACKAGE_NAME_CSS));
    }

}