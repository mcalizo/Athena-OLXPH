<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 18/04/2017
 * Time: 3:05 PM
 */

namespace Tests\Bdd\context;

use Athena\Test\AthenaTestContext;
use Tests\Pages\Oneweb\HomePage;
use Tests\Pages\Oneweb\LoginPage;
use Tests\Pages\Oneweb\ResultsPage;
use Tests\Pages\Oneweb\DetailsPage;
use Tests\Pages\Oneweb\OrderFormPage;


class BuyNowContext extends AthenaTestContext
{
    private $homepage;
    private $listingpage;
    private $loginpage;
    private $detailspage;
    private $orderformpage;

    public function __construct(){
        $this->homepage = new HomePage();
        $this->listingpage = new ResultsPage();
        $this->loginpage = new LoginPage();
        $this->detailspage = new DetailsPage();
        $this->orderformpage = new OrderFormPage();
    }

    /**
     * @When /^I click (.*) category in homepage$/
     */
    public function iClickCategoryInHomepage($categoryName)
    {
        $this->homepage->clickCategory_byVisibleText_inHomepage($categoryName);
    }

    /**
     * @Then /^I should be redirected to results page$/
     */
    public function iShouldBeRedirectedToResultsPage()
    {
        $this->listingpage->hasResults();
        \PHPUnit_Framework_Assert::assertEquals(ResultsPage::STRING_PAGE_BODY_ATTR,$this->listingpage->getAttributeBodyPage2());
    }

    /**
     * @Given /^I should see all buy now ads$/
     */
    public function iShouldSeeAllBuyNowAds()
    {
        \PHPUnit_Framework_Assert::assertEquals($this->listingpage->getAdsCountDisplayedInResultsPage(), $this->listingpage->getBuyNowBadgeCountInResultsPage());
    }

    /**
     * @Given /^I should not see the View Buy Now items button in banner$/
     */
    public function iShouldNotSeeTheViewBuyNowItemsButtonInBanner()
    {
        \PHPUnit_Framework_Assert::assertFalse($this->listingpage->assertElementPresent(ResultsPage::ELEMENT_VIEW_BUY_NOW_ITEMS_BUTTON_ID), "Buy Now button found in listing page banner.");
    }

    /**
     * @Given /^I should not see sponsored ads$/
     */
    public function iShouldNotSeeSponsoredAds()
    {
        \PHPUnit_Framework_Assert::assertFalse($this->listingpage->assertElementPresentCss(ResultsPage::ELEMENT_SPONSORED_ADS_CSS), "Sponsored Ads found in listing page.");
    }

    /**
     * @Given /^I am in ad listing with active buy now filter$/
     */
    public function iAmInAdListingWithActiveBuyNowFilter()
    {
        $this->listingpage->openPage('buynow');
    }

    /**
     * @When /^I removed the active buy now filter$/
     */
    public function iRemovedTheActiveBuyNowFilter()
    {
        $this->listingpage->clickElement('css', ResultsPage::ELEMENT_REMOVED_ACTIVE_FILTER_CSS);
    }

    /**
     * @Then /^the buy now active filter should be removed$/
     */
    public function theBuyNowActiveFilterShouldBeRemoved()
    {
        sleep(5);
        \PHPUnit_Framework_Assert::assertFalse($this->listingpage->assertElementPresentCss(ResultsPage::ELEMENT_REMOVED_ACTIVE_FILTER_CSS), "Buy Now active filter found in page.");
    }

    /**
     * @Given /^the View Buy Now items button should be in banner$/
     */
    public function theViewBuyNowItemsButtonShouldBeInBanner()
    {
        \PHPUnit_Framework_Assert::assertTrue($this->listingpage->assertElementPresent(ResultsPage::ELEMENT_VIEW_BUY_NOW_ITEMS_BUTTON_ID), "Buy Now button in banner not found in page.");
    }

    /**
     * @Given /^I should see sponsored ads is displayed$/
     */
    public function iShouldSeeSponsoredAdsIsDisplayed()
    {
        \PHPUnit_Framework_Assert::assertTrue($this->listingpage->assertElementPresentCssAtLeastOnce(ResultsPage::ELEMENT_SPONSORED_ADS_CSS), "Sponsored Ads not found in page.");
    }

    /**
     * @When /^I click View Buy now items button$/
     */
    public function iClickViewBuyNowItemsButton()
    {
        $this->listingpage->clickElement('id', ResultsPage::ELEMENT_VIEW_BUY_NOW_ITEMS_BUTTON_ID);
    }

    /**
     * @When /^I click an ad in listing page$/
     */
    public function iClickAnAdInListingPage()
    {
        $this->listingpage->clickRandomInListing();
    }

    /**
     * @Then /^I should be redirected to the ad details page$/
     */
    public function iShouldBeRedirectedToTheAdDetailsPage()
    {
        \PHPUnit_Framework_Assert::assertEquals(true, $this->detailspage->assertElementPresentCss(DetailsPage::ELEMENT_DETAILS_AD_SELLER_NAME_CSS));
    }

    /**
     * @When /^I click Buy Now button$/
     */
    public function iClickBuyNowButton()
    {
        $this->detailspage->clickElement('css',DetailsPage::ELEMENT_DETAILS_AD_CHAT_SELLER_BUTTON_CSS);
    }

    /**
     * @Then /^I should be redirected to Buy Now Order Form page$/
     */
    public function iShouldBeRedirectedToBuyNowOrderFormPage()
    {
        \PHPUnit_Framework_Assert::assertEquals(true, $this->orderformpage->assertElementPresent(OrderFormPage::ELEMENT_BUTTON_SUBMIT_ORDER_ID));
    }

    /**
     * @Given /^I should see that (.*) filter is active$/
     */
    public function iShouldSeeThatFilterIsActive($categoryName)
    {
        \PHPUnit_Framework_Assert::assertContains($categoryName, $this->listingpage->getText(ResultsPage::ELEMENT_ACTIVE_FILTER_CSS),"Active filter does contain " . $categoryName);
    }


}