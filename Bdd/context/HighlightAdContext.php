<?php
/**
 * Created by PhpStorm.
 * User: jbrp
 * Date: 12/20/16
 * Time: 5:50 PM
 */

namespace Tests\Bdd\context;


use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use Tests\Pages\Oneweb\ManagePage;
use Tests\Pages\Oneweb\PaymentPage;

class HighlightAdContext extends AthenaTestContext
{

    private $admanage;
    private $payment;

    public function __construct()
    {
        $this->admanage = new ManagePage();
        $this->payment = new PaymentPage();
    }
    /**
     * @Then /^I should see Item window modal$/
     */
    public function iShouldSeeItemWindowModal()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I see ad boosting modal on screen$/
     */
    public function iSeeAdBoostingModalOnScreen()
    {
        sleep(5);
        $this->admanage->verifyBoostAdModal();
        sleep(5);
    }

    /**
     * @Then /^I should see highlight ad page$/
     */
    public function iShouldSeeHighlightAdPage()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I select (.*) on how long my ad will be highlighted$/
     */
    public function iSelectOnHowLongMyAdWillBeHighlighted($duration)
    {
        throw new PendingException();
    }

    /**
     * @Given /^I should see correct duration from summary section$/
     */
    public function iShouldSeeCorrectDurationFromSummarySection()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should see the Proceed with payment button should be available to click$/
     */
    public function iShouldSeeTheProceedWithPaymentButtonShouldBeAvailableToClick()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I click ellipsis button$/
     */
    public function iClickEllipsisButton()
    {
        $this->admanage->clickEllipsisButton();
    }

    /**
     * @Given /^I click Highlight Ad$/
     */
    public function iClickHighlightAd()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I click Proceed  with payment$/
     */
    public function iClickProceedWithPayment()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I am in ad manage page$/
     */
    public function iAmInAdManagePage()
    {
        throw new PendingException();
    }
}