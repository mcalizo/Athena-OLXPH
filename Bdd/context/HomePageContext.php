<?php

namespace Tests\Bdd\context;

use Athena\Athena;
use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Pages\Oneweb\AdPostPage;
use Tests\Pages\Oneweb\HomePage;
use Tests\Pages\Oneweb\LoginPage;
use Tests\Pages\Oneweb\ResultsPage;
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 29/09/2016
 * Time: 12:06 PM
 */
class HomePageContext extends AthenaTestContext
{
    /**
     * @var HomePage
     */
    private $homepage;
    private $listingpage;
    private $loginpage;
    private $adpostpage;

    /**
     * @var LoginPage
     */
    private $acctloginpage;

    public function __construct(){
        $this->homepage = new HomePage();
        $this->listingpage = new ResultsPage();
        $this->loginpage = new LoginPage();
        $this->adpostpage = new AdPostPage();
    }

    /**
     * @Given /^I am in HomePage$/
     */
    public function iAmInHomePage()
    {
        $this->homepage->openPage('/');
    }
    
    /**
     * @Then /^I should see Sell form page$/
     */
    public function iShouldSeeSellFormPage()
    {
        $acctLoginPage = new LoginPage();
        $acctLoginUrl = $acctLoginPage->getAccountLogin_url();
        \PHPUnit_Framework_Assert::assertContains("/ad/post",$acctLoginUrl);
    }

    /**
     * @When /^I click Computers category$/
     */
    public function iClickComputersCategory()
    {
        $this->homepage->clickMainCategoryCss(HomePage::ELEMENT_CATEGORY_COMPUTER_CSS);
    }

    /**
     * @Then /^I should see results$/
     */
    public function iShouldSeeResults()
    {
        $resultPage =  new ResultsPage();
        $resultPage->hasResults();
    }

    /**
     * @Then /^Url should contain computers$/
     */
    public function urlShouldContainComputers()
    {
        \PHPUnit_Framework_Assert::assertContains("computers",Athena::browser()->getCurrentURL());
    }

    /**
     * @Then /^I should see I'm Browsing in Computers$/
     */
    public function iShouldSeeIMBrowsingInComputers()
    {
        \PHPUnit_Framework_Assert::assertEquals("Computers",$this->listingpage->getText('div[class="filtersPanel"] div div div'));
    }

    /**
     * @Then /^I should see sub Categories in left navigation$/
     */
    public function iShouldSeeSubCategoriesInLeftNavigation()
    {
        //$categoryPage = new OneWeb();
        $this->listingpage->assertElementPresent('li[role="menuitem"] a');
    }

    /**
     * @Then /^I should see Locations in left navigation$/
     */
    public function iShouldSeeLocationsInLeftNavigation()
    {
        $categoryPage = new OneWeb();
        $categoryPage->assertElementPresent('.filterLocations li a');
    }

    /**
     * @Then /^I should be able to access the home page$/
     */
    public function iShouldBeAbleToAccessTheHomePage()
    {
        $this->homepage->verifyHomepageTitle();
        $this->homepage->verifyHomepageAttributeTag();
        $this->homepage->checkHeaderElement();
    }


    /**
     * @Given /^I click the search button in home page$/
     */
    public function iClickTheSearchButtonInHomePage()
    {
        $this->homepage->clickElement('css',HomePage::ELEMENT_SEARCH_BAR_SUBMIT_CSS);
    }

    /**
     * @Then /^I should see results for Computer in Manila$/
     */
    public function iShouldSeeResultsForComputerInManila()
    {
        $this->listingpage->hasResults();
    }

    /**
     * @Given /^the landing page is the ad listings page$/
     */
    public function theLandingPageIsTheAdListingsPage()
    {
        \PHPUnit_Framework_Assert::assertEquals(ResultsPage::STRING_PAGE_BODY_ATTR,$this->listingpage->getAttributeBodyPage2());
    }

    /**
     * @Then /^I should see no results for Cocaine in Manila$/
     */
    public function iShouldSeeNoResultsForCocaineInManila()
    {
        \PHPUnit_Framework_Assert::assertEquals('No Results for "'.Athena::settings()->get('search_keyword_2')->orFail().'"',$this->listingpage->verifyNoResult());
    }

    /**
     * @Given /^the landing page is the no results page$/
     */
    public function theLandingPageIsTheNoResultsPage()
    {
        $this->listingpage->hasNoResults();
    }

    /**
     * @Then /^I should see results for cars without location$/
     */
    public function iShouldSeeResultsForCarsWithoutLocation()
    {
        $this->listingpage->hasResults();
    }

    /**
     * @When /^I click on clothing and accessories category in home page$/
     */
    public function iClickOnClothingAndAccessoriesCategoryInHomePage()
    {
        $this->homepage->clickElement('css',HomePage::ELEMENT_CLOTHING_AND_ACCESSORIES_CATE_CSS);
    }

    /**
     * @Then /^I should be able to see results under clothing and accessories category$/
     */
    public function iShouldBeAbleToSeeResultsUnderClothingAndAccessoriesCategory()
    {
        $this->listingpage->hasResults();
    }

    /**
     * @When /^I click the view all categories button$/
     */
    public function iClickTheViewAllCategoriesButton()
    {
        $this->homepage->clickElement('css',HomePage::ELEMENT_CATEGORY_ALL_BUTTON_CSS);
    }

    /**
     * @Then /^I should be able to see all results$/
     */
    public function iShouldBeAbleToSeeAllResults()
    {
        $this->listingpage->hasResults();
        $url = Athena::settings()->get('urls')->orFail();
        \PHPUnit_Framework_Assert::assertEquals($url['/'] . "/all-results", $this->homepage->getBrowser()->getCurrentURL());
    }

    /**
     * @Then /^I should be redirected to the login page$/
     */
    public function iShouldBeRedirectedToTheLoginPage()
    {
        $this->loginpage->verifyAcctLoginElements();
        $url = Athena::settings()->get('urls')->orFail();
        \PHPUnit_Framework_Assert::assertContains($url['/'] . $url['login'], $this->homepage->getBrowser()->getCurrentURL());
    }

    /**
     * @When /^I click the sell your item now button$/
     */
    public function iClickTheSellYourItemNowButton()
    {
        sleep(5);
        $this->homepage->clickElement('xpath',HomePage::ELEMENT_SELL_YOUR_ITEM_BTN_XPATH);
    }

    /**
     * @Given /^I am not yet logged in$/
     */
    public function iAmNotYetLoggedIn()
    {
        $this->homepage->getBrowser()->deleteAllCookies();
        $this->homepage->cookieSet();
        $this->homepage->getBrowser()->navigate()->refresh();
    }

    /**
     * @Then /^I should be redirected to the ad posting login page$/
     */
    public function iShouldBeRedirectedToTheAdPostingLoginPage()
    {
        \PHPUnit_Framework_Assert::assertContains("/login", $this->homepage->getBrowser()->getCurrentURL());
        $this->loginpage->verifyAcctLoginElements();
    }

    /**
     * @Given /^I am logged in$/
     */
    public function iAmLoggedIn()
    {
        Athena::browser()->getCurrentPage()->wait(10)->elementWithCss(HomePage::ELEMENT_LOGIN_BUTTON_CSS);
        $this->homepage->clickElement('id',HomePage::ELEMENT_LOGIN_BUTTON_ID);
        $this->loginpage->loginToUserAccount(Athena::settings()->get('email')->orFail(),Athena::settings()->get('password')->orFail());
        sleep(5);
    }

    /**
     * @Then /^I should be able to see the sell form page$/
     */
    public function iShouldBeAbleToSeeTheSellFormPage()
    {
        $this->adpostpage->verifySellerFormElements();
    }

    /**
     * @When /^I click the logout button$/
     */
    public function iClickTheLogoutButton()
    {
        $this->homepage->clickElement('css',HomePage::ELEMENT_USER_LOGGEDIN_LOGOUT_CSS);
    }

    /**
     * @Then /^I should not see the manage ad button$/
     */
    public function iShouldNotSeeTheManageAdButton()
    {
        sleep(5);
        //\PHPUnit_Framework_Assert::assertEquals("display: none",$this->homepage->getElementAttributes2('css',HomePage::ELEMENT_LOGIN_NAVIGATION_CSS,'style'));
        \PHPUnit_Framework_Assert::assertNull($this->homepage->verifyElementNotPresent('css',HomePage::ELEMENT_LOGIN_NAVIGATION_CSS));
    }

    /**
     * @Given /^I should not see the message button$/
     */
    public function iShouldNotSeeTheMessageButton()
    {
        \PHPUnit_Framework_Assert::assertNull($this->homepage->verifyElementNotPresent('css',HomePage::ELEMENT_USER_LOGGEDIN_CHAT_CSS));
    }

    /**
     * @When /^I click the manage ad button$/
     */
    public function iClickTheManageAdButton()
    {
        $this->homepage->clickElement('css',HomePage::ELEMENT_USER_LOGGEDIN_ICON_CSS);
    }

    /**
     * @Then /^I should be redirected to the manage ad page$/
     */
    public function iShouldBeRedirectedToTheManageAdPage()
    {
        $url = Athena::settings()->get('urls')->orFail();
        \PHPUnit_Framework_Assert::assertContains($url['/'] . $url['manage'], $this->homepage->getBrowser()->getCurrentURL());
    }

    /**
     * @When /^I click the message button$/
     */
    public function iClickTheMessageButton()
    {
        $this->homepage->clickElement('css',HomePage::ELEMENT_USER_LOGGEDIN_CHAT_CSS);
    }

    /**
     * @Then /^I should be redirected to the messages page$/
     */
    public function iShouldBeRedirectedToTheMessagesPage()
    {
        $url = Athena::settings()->get('urls')->orFail();
        \PHPUnit_Framework_Assert::assertContains($url['/'] . $url['messages'], $this->homepage->getBrowser()->getCurrentURL());
    }

    /**
     * @When /^I click the sell your item now button when not logged in$/
     */
    public function iClickTheSellYourItemNowButtonWhenNotLoggedIn()
    {
        $this->homepage->clickElement('css',HomePage::ELEMENT_SELL_YOUR_ITEM_LOGGEDOUT_CSS);
    }

    /**
     * @When /^I click the sell your item now button when logged in$/
     */
    public function iClickTheSellYourItemNowButtonWhenLoggedIn()
    {
        $this->homepage->clickElement('css',HomePage::ELEMENT_SELL_YOUR_ITEM_LOGGEDIN_CSS);
    }

    /**
     * @When /^I click the OLX logo$/
     */
    public function iClickTheOLXLogo()
    {
        $this->homepage->clickElement('css',ResultsPage::ELEMENT_HEADER_LOGO_ID);
    }

    /**
     * @Then /^I should see no results for (.*) in (.*)$/
     */
    public function iShouldSeeNoResultsForIn($searchKeyword, $locationKeyword)
    {
        \PHPUnit_Framework_Assert::assertEquals("We didn't find any results for ".$searchKeyword ,
            str_replace("\n"," ",$this->listingpage->getElementText('css',ResultsPage::ELEMEN_NO_RESULTS_NOTIF_AND_KEYWORDS))
        );
        //\PHPUnit_Framework_Assert::assertEquals($locationKeyword,$this->listingpage->getText(ResultsPage::ELEMENT_ACTIVE_FILTER_CSS));

    }


}