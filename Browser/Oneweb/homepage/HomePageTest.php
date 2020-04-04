<?php

namespace Tests\Browser\Tests\desktop;

use Athena\Athena;
use Athena\Test\AthenaBrowserTestCase;
use Tests\Pages\Oneweb\HomePage;
use Tests\Pages\Oneweb\ResultsPage;
use Tests\Pages\Oneweb\DetailsPage;
use Tests\Pages\Oneweb\Sinon;

class HomePageTest extends AthenaBrowserTestCase
{
    //const SEARCH_KEYWORD = 'Samsung Galaxy S6';
    const SEARCH_KEYWORD = 'Cars';
    const LOCATION_KEYWORD = 'Pasig';
    /*
     * To verify that Home Page is successfully loaded
     */
    public function testHomepage_shouldLoad()
    {
        $I = new HomePage();
        $I->openPage('/');
        $I->didLoad();

        /*$dummyUser = new Sinon();
        $userDetails = $dummyUser->createUserWithPassword();
        var_dump($userDetails);exit;*/
    }

    /*
     * To verify Home page Title
     */
    public function testHomepage_Title()
    {
        $I = new HomePage();
        $I->verifyHomepageTitle();
        //\PHPUnit_Framework_Assert::assertEquals("OLX.ph - Philippines' #1 Buy and Sell Website",$I->verifyHomepageTitle());
    }

    /*
     * To verify the home page elements header elements present
     */
    public function testHomepage_elements()
    {
        $I = new HomePage();
        $I->openPage('/');
        $I->checkHeaderElement();
    }

    /*
     * To verify that there is at least one suggestion displayed
     * (No checking on data)
     */
    public function testHomepageSuggestion_element()
    {
        $I = new HomePage();
        $I->openPage('/');
        $I->fillSearchBar(self::SEARCH_KEYWORD);
        sleep(5);
        $I->checkSearchSuggestionElement();
    }

    public function testHomepageLocation_element()
    {
        $I = new HomePage();
        $I->openPage('/');
        $I->fillSearchBar(self::SEARCH_KEYWORD);
        $I->fillLocationBar(self::LOCATION_KEYWORD);
        sleep(5);
        $I->checkLocationSuggestionElement();
    }

    /*
     * To verify that search functionality
     */
    public function testHomepage_search()
    {
        $I = new HomePage();
        $I->openPage('/');
        $I->fillSearchBar(self::SEARCH_KEYWORD);
        sleep(5);
        $I->fillLocationBar(self::LOCATION_KEYWORD);
        $I->clickSearchButton();
        sleep(10);
        $R = new ResultsPage();
        $R->hasResults();
    }

    /*
     * To verify that View All Categories button has results
     */
    public function testHomepage_viewAllCategories()
    {
        $I = new HomePage();
        $I->openPage('/');
        $I->clickAllCategoriesButton();
        sleep(10);
        $R = new ResultsPage();
        $R->hasResults();
    }

    /*
     * To verify that View All Categories button has results
     */
    public function testHomepage_mainCategories()
    {
        $I = new HomePage();
        $I->openPage('/');
        sleep(5);
        $I->clickMainCategoryCss(HomePage::ELEMENT_CATEGORY_COMPUTER_CSS);
        sleep(10);
        $R = new ResultsPage();
        $R->hasResults();
        Athena::browser()->navigate()->back();
        $I->clickMainCategoryCss(HomePage::ELEMENT_CATEGORY_JOBS_CSS);
        sleep(10);
        $R->hasResults();
        Athena::browser()->navigate()->back();
        $I->clickMainCategoryCss(HomePage::ELEMENT_CATEGORY_SERVICES_CSS);
        sleep(10);
        $R->hasResults();
    }

    /*
     * To verify user able to navigate in home page by clicking logo in header
     */
    public function testHomepage_lodedFromCategories()
    {
        $I = new HomePage();
        $I->openPage('/');
        $I->clickAllCategoriesButton();
        sleep(10);
        $R = new ResultsPage();
        $R->clickLogo();
        sleep(10);
        $I->verifyHomepageTitle();
        $I->verifyHomepageAttributeTag();
        sleep(10);
    }

    /*
     * To verify user able to navigate to homepage from details page by clicking logo
     */
    public function testHomepage_loadedFromDetailsPage()
    {
        $this->testHomepage_search();
        $listing = new ResultsPage();
        $listing->clickRandomInListing();

        $details = new DetailsPage();
        $details->inDetailsPageCheck();

        $listing->clickLogo();

        $homepage = new HomePage();
        $homepage->verifyHomepageTitle();
        $homepage->verifyHomepageAttributeTag();
    }

}