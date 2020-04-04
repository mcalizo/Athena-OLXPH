<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 06/10/2016
 * Time: 4:42 PM
 */

namespace Tests\Bdd\context;

use Athena\Athena;
use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Pages\Oneweb\HomePage;
use Tests\Pages\Oneweb\LoginPage;
use Tests\Pages\Oneweb\ResultsPage;
use Tests\Pages\Oneweb\OneWeb;

class AdListingContext extends AthenaTestContext
{

    private $listing;
    private $oneweb;
    private $account;
    private $homepage;


    public function __construct(){
        $this->listing = new ResultsPage();
        $this->oneweb = new OneWeb();
        $this->account = new LoginPage();
        $this->homepage = new HomePage();

    }

    /**
     * @Given /^I open olx all categories ad listing page$/
     */
    public function iOpenOlxAllCategoriesAdListingPage()
    {
        $openAllResults = new OneWeb();
        $openAllResults->openPage("all-results");
    }

    /**
     * @Given /^I enter search keyword$/
     */
    public function iEnterSearchKeyword()
    {
        $this->listing->enterSearchKeywords('car');
    }

    /**
     * @Given /^I click location bar$/
     */
    public function iClickLocationBar()
    {
        $this->listing->clickLocationHeader();
        sleep(5);
    }

    /**
     * @Then /^I see modal location popup$/
     */
    public function iSeeModalLocationPopup()
    {
        \PHPUnit_Framework_Assert::assertEquals("display: block",$this->oneweb->getElementAttributes(ResultsPage::ELEMENT_LOCATION_MODAL_ID,ResultsPage::ELEMENT_LOCATION_MODAL_ATTR));
    }

    /**
     * @When /^I enter location keyword$/
     */
    public function iEnterLocationKeyword()
    {
        $this->listing->enterLocationKeywords('Pasig');
        sleep(10);
    }

    /**
     * @Then /^I see suggested locations$/
     */
    public function iSeeSuggestedLocations()
    {
        $this->listing->verifyLocationSuggestionsModal();
    }

    /**
     * @When /^I click the first suggested location$/
     */
    public function iClickTheFirstSuggestedLocation()
    {
        $this->listing->clickSuggestionLocationModal();
    }

    /**
     * @Then /^I should see results related to my search keyword and location$/
     */
    public function iShouldSeeResultsRelatedToMySearchKeywordAndLocation()
    {
        $this->listing->hasResults();
    }

    /**
     * @Given /^I already login to my account$/
     */
    public function iAlreadyLoginToMyAccount()
    {
        $email = Athena::settings()->get('verified-phone')->orFail();

        $password = Athena::settings()->get('password')->orFail();

        $this->oneweb->openPage('login');
        $this->account->loginToUserAccount($email, $password);
    }

    /**
     * @Given /^I am in ad listing results page$/
     */
    public function iAmInAdListingResultsPage()
    {
        $this->oneweb->openPage('all-results');
        $this->listing->hasResults();
    }

    /**
     * @Then /^I should see Sell Your Item button in header$/
     */
    public function iShouldSeeSellYourItemButtonInHeader()
    {
        \PHPUnit_Framework_Assert::assertTrue($this->oneweb->assertElementPresent(ResultsPage::SELL_ITEM_BUTTON_CSS));
    }

    /**
     * @When /^I click Sell Your Item button$/
     */
    public function iClickSellYourItemButton()
    {
        $this->oneweb->clickCssElement(ResultsPage::SELL_ITEM_BUTTON_CSS);
    }

    /**
     * @Then /^I should see Sell Form page$/
     */
    public function iShouldSeeSellFormPage()
    {
        $this->account->verifySellerFormElements();
    }

    /**
     * @Given /^I have not login to my account$/
     */
    public function iHaveNotLoginToMyAccount()
    {
        Athena::browser()->deleteAllCookies();
        $this->iOpenOlxAllCategoriesAdListingPage();
    }

    /**
     * @Then /^I should see Login button$/
     */
    public function iShouldSeeLoginButton()
    {
        \PHPUnit_Framework_Assert::assertTrue($this->oneweb->assertElementPresentCss(HomePage::ELEMENT_LOGIN_BUTTON_CSS));
    }

    /**
     * @When /^I click Login button$/
     */
    public function iClickLoginButton()
    {
        $this->oneweb->clickCssElement(HomePage::ELEMENT_LOGIN_BUTTON_CSS);
    }

    /**
     * @Then /^I should see Login Page$/
     */
    public function iShouldSeeLoginPage()
    {
        $this->account->verifyAcctLoginElements();
    }

    /**
     * @When /^I input (.*) in the search bar in home page$/
     */
    public function iInputInTheSearchBarInHomePage($searchKeyword)
    {
        $this->listing->enterString('id',HomePage::ELEMENT_SEARCH_BAR_INPUT_ID,$searchKeyword);
    }

    /**
     * @Given /^I input (.*) in the location search bar in home page$/
     */
    public function iInputInTheLocationSearchBarInHomePage($locationKeyword)
    {
        $this->listing->enterString('id',HomePage::ELEMENT_LOCATION_BAR_INPUT_ID,$locationKeyword);
    }

    /**
     * @Given /^I select (.*) from the location dropdown in home page$/
     */
    public function iSelectFromTheLocationDropdownInHomePage($locationKeyword)
    {
        $this->homepage->selectSuggestedLocation($locationKeyword);
    }

    /**
     * @Then /^I should see results about (.*) in (.*)$/
     */
    public function iShouldSeeResultsAboutIn($searchKeyword, $locationKeyword)
    {
        $this->listing->verifyResultsAboutIn($searchKeyword, $locationKeyword);
        $this->listing->hasResults();
       //PUnit_Framework_Assert::assertEquals('Cebu City', $this->listing->getText(ResultsPage::ELEMENT_BROWSING_LOCATION_LEFT_NAV_CSS));
        //\PHPUnit_Framework_Assert::assertEquals('Accessories for Mobile Phones and Tablets', $this->listing->getText(ResultsPage::ELEMENT_BROWSING_CATE_SUBCATE_LEF_NAV_CSS));
    }

    /**
     * @Given /^I am in the ad listings page$/
     */
    public function iAmInTheAdListingsPage()
    {
        $this->listing->openPage('all-results');
    }

    /**
     * @When /^I click the OLX logo in the ad listings page$/
     */
    public function iClickTheOLXLogoInTheAdListingsPage()
    {
        $this->listing->clickElement('css', ResultsPage::ELEMENT_HEADER_LOGO_ID);
    }

    /**
     * @Then /^I should be redirected to the home page$/
     */
    public function iShouldBeRedirectedToTheHomePage()
    {
        $this->homepage->verifyHomepageAttributeTag();
        $this->homepage->verifyHomepageTitle();
    }

    /**
     * @When /^I input (.*) in the search bar in ad listings page$/
     */
    public function iInputInTheSearchBarInAdListingsPage($searchKeyword)
    {
        $this->listing->enterString('css', ResultsPage::ELEMENT_HEADER_SEARCH_KEYWORD_CSS, $searchKeyword);
    }

    /**
     * @Given /^I select (.*) in the location dropdown in ad listings page$/
     */
    public function iSelectInTheLocationDropdownInAdListingsPage($locationKeyword)
    {
        $this->listing->selectSuggestedLocation($locationKeyword);
    }

    /**
     * @Given /^I click the search button in ad listings page$/
     */
    public function iClickTheSearchButtonInAdListingsPage()
    {
        $this->listing->clickElement('id', ResultsPage::ELEMENT_HEADER_SEARCH_BUTTON_ID);
        sleep(10);
    }

    /**
     * @Given /^I have search results$/
     */
    public function iHaveSearchResults()
    {
        $this->listing->hasResults();
    }

    /**
     * @When /^I click the next button$/
     */
    public function iClickTheNextButton()
    {
        #scroll to bottom
        $this->listing->getBrowser()->executeScript('window.scrollTo(0, document.body.scrollHeight);',array());
        sleep(3);
        $this->listing->clickElement('css', ResultsPage::ELEMENT_NEXT_BUTTON_PAGINATION_CSS);
        sleep(7);
    }

    /**
     * @Then /^I should be redirected to the next page of ad listings page$/
     */
    public function iShouldBeRedirectedToTheNextPageOfAdListingsPage()
    {
        
        \PHPUnit_Framework_Assert::assertContains('?page=2',$this->listing->getBrowser()->getCurrentURL());
    }

    /**
     * @Given /^I get the same results as the previous search item$/
     */
    public function iGetTheSameResultsAsThePreviousSearchItem()
    {
        $this->listing->hasResults();
    }

    /**
     * @When /^I click the sort by dropdown$/
     */
    public function iClickTheSortByDropdown()
    {
        $this->listing->clickElement('css', ResultsPage::ELEMENT_SORT_BY_CSS);
    }

    /**
     * @When /^I click the filters button$/
     */
    public function iClickTheFiltersButton()
    {
        $this->listing->clickElement('id', ResultsPage::ELEMENT_FILTERS_BAR_ID);
    }

    /**
     * @Then /^it should display the date posted options$/
     */
    public function itShouldDisplayTheDatePostedOptions()
    {
        $this->listing->verifyDatePostedFilterOptionsAllResults();
    }

    /**
     * @Given /^I click last (\d+) days option$/
     */
    public function iClickLastDaysOption($arg1)
    {
        $this->listing->selectInDropDownValue('css', ResultsPage::ELEMENT_SORT_BY_CSS, $arg1);
    }

    /**
     * @Then /^it should display ads posted (\d+) days ago$/
     */
    public function itShouldDisplayAdsPostedDaysAgo($arg1)
    {
        \PHPUnit_Framework_Assert::assertEquals($arg1, $this->listing->getSelectedValueInDropDown(ResultsPage::ELEMENT_SORT_BY_CSS));
    }

    /**
     * @Given /^I select (.*) in the location dropdown in home page$/
     */
    public function iSelectInTheLocationDropdownInHomePage($locationKeyword)
    {
        $this->homepage->selectSuggestedLocation($locationKeyword);
    }

    /**
     * @When /^I select (.*) in the left side widget of ad listings page$/
     */
    public function iSelectInTheLeftSideWidgetOfAdListingsPage($categoryFilter)
    {
        $this->listing->selectFilterByCategoryLeftNav($categoryFilter);
    }

    /**
     * @Then /^I should see filters of price range$/
     */
    public function iShouldSeeFiltersOfPriceRange()
    {
        $this->listing->verifyLeftNavFilterOptionsSubCategory(ResultsPage::TEXT_PRICE_RANGE, ResultsPage::ELEMENT_PRICE_RANGE_TEXT_CSS, ResultsPage::ELEMENT_PRICE_RANCE_FILTER_CSS);
    }

    /**
     * @Given /^I should see filters of condition$/
     */
    public function iShouldSeeFiltersOfCondition()
    {
        $this->listing->verifyLeftNavFilterOptionsSubCategory(ResultsPage::TEXT_CONDITION, ResultsPage::ELEMENT_CONDITION_TEXT_CSS, ResultsPage::ELEMENT_CONDITION_FILTER);
    }

    /**
     * @Given /^I should see filters of date posted$/
     */
    public function iShouldSeeFiltersOfDatePosted()
    {
        $this->listing->verifyLeftNavFilterOptionsSubCategory(ResultsPage::TEXT_DATE_POSTED, ResultsPage::ELEMENT_DATE_POSTED_TEXT_CSS, ResultsPage::ELEMENT_DATE_POSTED_FILTER_CSS);
    }

    /**
     * @When /^I click the home in breadcrumbs$/
     */
    public function iClickTheHomeInBreadcrumbs()
    {
        #scroll to bottom
        //$this->listing->getBrowser()->executeScript('window.scrollTo(0, document.body.scrollHeight);',array());
        sleep(3);
        $this->listing->clickElement('css',ResultsPage::ELEMENT_LINK_BREADCRUMBS_HOME_CSS);
        sleep(7);
    }

    /**
     * @Given /^I click location bar in ad listing page$/
     */
    public function iClickLocationBarInAdListingPage()
    {
        $this->listing->clickElement('id', ResultsPage::ELEMENT_HEADER_LOCATION_KEYWORD_ID);
    }

    /**
     * @Given /^I select (.*) in dropdown$/
     */
    public function iSelectInDropdown($sortBy)
    {
        $this->listing->selectInDropDownValue('css', ResultsPage::ELEMENT_SORT_BY_CSS, $sortBy);
    }

    /**
     * @Then /^I should see results sorted by (.*)$/
     */
    public function iShouldSeeResultsSortedBy($sortBy)
    {
        $this->listing->hasResults();
        $this->listing->verifyUrlSortedByDropdown($sortBy);
        \PHPUnit_Framework_Assert::assertEquals($sortBy,$this->listing->getSelectedValueInDropDown(ResultsPage::ELEMENT_SORT_BY_CSS));

    }

    /**
     * @When /^I selected the (.*) sub category$/
     */
    public function iSelectedTheSubCategory($subCatetory)
    {
        $this->listing->selectFilterByCategoryLeftNav($subCatetory);
    }

    /**
     * @Given /^I click (.*) option$/
     */
    public function iClickOption($subCategory)
    {
        $this->listing->selectFilterByCategoryLeftNav($subCategory);
        sleep(10);
    }

    /**
     * @Then /^it should display ads posted (.*) ago$/
     */
    public function itShouldDisplayAdsPostedAgo($subCategory)
    {
        \PHPUnit_Framework_Assert::assertContains('date_posted=2', $this->listing->getBrowser()->getCurrentURL());
        \PHPUnit_Framework_Assert::assertContains($subCategory, $this->listing->getElementText('css',ResultsPage::ELEMENT_ACTIVE_FILTER_2DAYS_CSS));
        $this->listing->hasResults();
    }

    /**
     * @Given /^I removed the active category filter$/
     */
    public function iRemovedTheActiveCategoryFilter()
    {
        $this->listing->clickElement('css', ResultsPage::ELEMENT_REMOVED_ACTIVE_FILTER_CSS);
    }

    /**
     * @Given /^the active category should be removed$/
     */
    public function theActiveCategoryShouldBeRemoved()
    {
        sleep(5);
        \PHPUnit_Framework_Assert::assertFalse($this->listing->assertElementPresentCss(ResultsPage::ELEMENT_REMOVED_ACTIVE_FILTER_CSS), "active filter found in page.");
    }

    /**
     * @Given /^the all categories should display$/
     */
    public function theAllCategoriesShouldDisplay()
    {
        
    }

    /**
     * @Given /^I input (.*) in price range min$/
     */
    public function iInputInPriceRangeMin($amount)
    {
        $this->listing->enterString('id',ResultsPage::ELEMENT_PRICE_RANGE_MIN_ID,$amount);
    }

    /**
     * @Then /^I click Go Button$/
     */
    public function iClickGoButton()
    {
        $this->listing->clickElement('id',ResultsPage::ELEMENT_PRICE_FILTER_BTN_ID);
    }

    /**
     * @Given /^I should able to check the audience segment id in page source$/
     */
    public function iShouldAbleToCheckTheAudienceSegmentIdInPageSource()
    {

    }

    /**
     * @Given /^I should able to check the audience pixel value (.*)$/
     */
    public function iShouldAbleToCheckTheAudiencePixelValue($audiencePixel)
    {
        sleep(5);
        $this->listing->getAudienceSegments();
        \PHPUnit_Framework_Assert::assertEquals($audiencePixel, $this->listing->getAudienceSegments());
    }


}