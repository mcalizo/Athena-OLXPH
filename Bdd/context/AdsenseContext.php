<?php
/**
 * Created by PhpStorm.
 * User: ralph
 * Date: 7/20/17
 * Time: 2:44 PM
 * */

namespace Tests\Bdd\context;

use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Pages\Oneweb\ResultsPage;
use Tests\Pages\Oneweb\OneWeb;

class AdsenseContext extends AthenaTestContext
{

    private $listingpage;
    private $oneweb;

    public function __construct()
    {

        $this->oneweb = new OneWeb();
        $this->listingpage = new ResultsPage();
       

    }

    /**
     * @Given /^I should be able to see the adsense in the middle part of the ad listing$/
     */
    public function iShouldBeAbleToSeeTheAdsenseInTheMiddlePartOfTheAdListing()
    {
        $this->listingpage->verifyAdsensePresent();
    }

    /**
     * @Given /^I should be able to see the adsense in the Right part of the ad listing$/
     */
    public function iShouldBeAbleToSeeTheAdsenseInTheRightPartOfTheAdListing()
    {
        $this->listingpage->verifyAdsenseRightPresent();
    }

    /**
     * @Given /^I should be able to see the adsense in the Bottom part of the ad listing$/
     */
    public function iShouldBeAbleToSeeTheAdsenseInTheBottomPartOfTheAdListing()
    {
        $this->listingpage->verifyAdsenseBottomPresent();
    }

    /**
     * @Given /^I should be able to see the AFS in the Upper part of the Ad listings$/
     */
    public function iShouldBeAbleToSeeTheAFSInTheUpperPartOfTheAdListings()
    {
        $this->listingpage->verifyAfsTopPresent();
    }

    /**
     * @Given /^I shoule be able to see the AFS in the Bottom part of the Ad listings$/
     */
    public function iShouleBeAbleToSeeTheAFSInTheBottomPartOfTheAdListings()
    {
        $this->listingpage->verifyAfsBottomPresent();
    }

    /**
     * @Given /^I should able to see the adsense in the bottom part of the image$/
     */
    public function iShouldAbleToSeeTheAdsenseInTheBottomPartOfTheImage()
    {
        $this->listingpage->verifyGalleryAfsBottomPresent();
    }

    /**
     * @Then /^I should able to see the adsense in the right part of the description$/
     */
    public function iShouldAbleToSeeTheAdsenseInTheRightPartOfTheDescription()
    {
        $this->listingpage->verifyAdsenseDetailsRight();
    }

    /**
     * @Given /^I should able to see the adsense in the bottom part of the description$/
     */
    public function iShouldAbleToSeeTheAdsenseInTheBottomPartOfTheDescription()
    {
        $this->listingpage->verifyAdsenseDetailsBottom();
    }


}