<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 01/12/2016
 * Time: 2:28 PM
 */

namespace Tests\Bdd\context;

use Athena\Test\AthenaTestContext;
use Tests\Pages\Oneweb\BoostScheduledRefresh;
use Tests\Pages\Oneweb\HomePage;
use Tests\Pages\Oneweb\ManagePage;
use Tests\Pages\Oneweb\PaymentPage;
use Tests\Pages\Oneweb\ThirdPartyPage;

class VasScheduleRefreshContext extends AthenaTestContext
{

    private $homepage;
    private $manageads;
    private $payment;
    private $thirdpartypage;
    private $boostscheduledrefresh;


    public function __construct(){
        $this ->homepage = new HomePage();
        $this ->manageads = new ManagePage();
        $this ->payment = new PaymentPage();
        $this ->thirdpartypage =new ThirdPartyPage();
        $this->boostscheduledrefresh = new BoostScheduledRefresh();
    }
    /**
     * @Then /^I should be redirected to Scheduled Refresh page$/
     */
    public function iShouldBeRedirectedToScheduledRefreshPage()
    {
        \PHPUnit_Framework_Assert::assertContains("scheduled-refresh", $this->thirdpartypage->getBrowser()->getCurrentURL());
    }

    /**
     * @Given /^I check the Terms and Conditions$/
     */
    public function iCheckTheTermsAndConditions()
    {
        $this->boostscheduledrefresh->clickTermCondition();
    }

    /**
     * @Given /^I click Schedule ad refresh date Button$/
     */
    public function iClickScheduleAdRefreshDateButton()
    {
       $this->manageads->clickScheduledRefresh();
    }

    /**
     * @Given /^I choose Refresh Ad every (.*) in dropdown$/
     */
    public function iChooseRefreshAdEveryInDropdown($refreshAdEvery)
    {
        $this->boostscheduledrefresh->selectInDropDownValue('id', BoostScheduledRefresh::ELEMENT_REFRESH_AD_EVERY_ID, $refreshAdEvery);
    }

    /**
     * @Given /^I choose Do this (.*) in dropdown$/
     */
    public function iChooseDoThisInDropdown($doThis)
    {
        $this->boostscheduledrefresh->selectInDropDownValue('id', BoostScheduledRefresh::ELEMENT_REFRESH_AD_DO_THIS_ID, $doThis);
    }


    /**
     * @Given /^I click Confirm refresh schedule for this ad and proceed with payment button$/
     */
    public function iClickConfirmRefreshScheduleForThisAdAndProceedWithPaymentButton()
    {
        $this->boostscheduledrefresh->clickProceedPayments();
    }

}