<?php
/**
 * Created by PhpStorm.
 * User: jbrp
 * Date: 12/8/16
 * Time: 11:47 AM
 */

namespace Tests\Bdd\context;


use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;

class SponsorAdsContext extends AthenaTestContext
{

    /**
     * @Given /^I click Sponsor Ad$/
     */
    public function iClickSponsorAd()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should see sponsor ad page$/
     */
    public function iShouldSeeSponsorAdPage()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I input (.*) in the step (\d+) number field$/
     */
    public function iInputInTheStepNumberField($amount, $arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given /^I click Place bid button$/
     */
    public function iClickPlaceBidButton()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I choose (.*) on how long my ad will be sponsored on step (\d+) selection menu$/
     */
    public function iChooseOnHowLongMyAdWillBeSponsoredOnStepSelectionMenu($duration, $arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given /^I click Set Sponsor Ad Duration$/
     */
    public function iClickSetSponsorAdDuration()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I should see correct Keywords from summary section$/
     */
    public function iShouldSeeCorrectKeywordsFromSummarySection()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I should see correct bid amount from summary section$/
     */
    public function iShouldSeeCorrectBidAmountFromSummarySection()
    {
        throw new PendingException();
    }
}