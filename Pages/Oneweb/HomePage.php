<?php

namespace Tests\Pages\Oneweb;

use Athena\Athena;

class HomePage extends OneWeb
{
    const ATTR_HOME_BODY_TAG = 'home';
    const ELEMENT_CATEGORY_JOBS_CSS = '.categories .jobs a';
    const ELEMENT_CATEGORY_SERVICES_CSS = '.categories .services a';
    const ELEMENT_CATEGORY_COMPUTER_CSS = '.categories .computers a';
    const ELEMENT_CATEGORY_BUY_NOW_CSS = 'div.categories>div.category-container.buy-now';
    const ELEMENT_CATEGORY_ALL_BUTTON_CSS ='a[href="/all-results"].button';
    const ELEMENT_CATEGORY_LINK = '.category-container';
    const ELEMENT_SELL_YOUR_ITEM_BTN_CSS = 'a:nth-child(1).button.hollow.sell.btnSell';
    const ELEMENT_SELL_YOUR_ITEM_BTN_XPATH = '//*[@class="button hollow sell btnSell"]';
    const ELEMENT_USER_LOGGEDIN_ICON_CSS = 'i.icon.person.dark';
    const ELEMENT_USER_LOGGEDIN_INITIALS_CSS = 'span.initials';
    const ELEMENT_USER_LOGGEDIN_CHAT_CSS = '#chatJewel';
    const ELEMENT_USER_LOGGEDIN_LOGOUT_CSS = 'a[href="/logout"][class="login button link logoutButton"]';
    const ELEMENT_CLOTHING_AND_ACCESSORIES_CATE_CSS = 'div.category-container.clothing-accessories a';
    const ELEMENT_SELL_YOUR_ITEM_LOGGEDIN_CSS = 'div.nav.right.member-element a.button.link.sell';
    const ELEMENT_SELL_YOUR_ITEM_LOGGEDOUT_CSS = 'div.nav.right.guest-element a.button.hollow.sell';
    const ELEMENT_SEARCH_BAR_INPUT_ID = 'searchKeyword';
    const ELEMENT_LOCATION_BAR_INPUT_ID = 'locationBar';
    const ELEMENT_SEARCH_BAR_SUBMIT_CSS = 'button[type="submit"]';
    const ELEMENT_LOGIN_BUTTON_ID = 'homepage_login_button';
    const ELEMENT_SEARCH_BAR_SUGGESTION_ID = '#searchSuggestions li a';
    const ELEMENT_LOCATION_BAR_SUGGESTION_ID = '#locationsResult li a';
    const ELEMENT_LOGO_ID = 'logo';
    const ELEMENT_WIN_WIN_EXCHANGE_CSS = 'h1 img[src$=".png"]';
    const ELEMENT_LOGIN_BUTTON_CSS = 'a.button.login.tracking';
    const ELEMENT_CATEGORY_TEXT_CSS = 'span.category-title';
    const ELEMENT_LOGIN_NAVIGATION_CSS = '#nav > div.nav.right.member-element';

//    public function __construct()
//    {
//        parent::__construct(Athena::browser(), '/');
//    }

    /*
     * Opens url specified
     */
//    public function openPage($url)
//    {
//        Athena::browser()->get($url);
//        $this->cookieSet();
//        Athena::browser()->get($url);
//        Athena::browser()->manage()->window()->maximize();
//        sleep(2);
//    }

    /*
     * Method to verify home page title
     */
    public function verifyHomepageTitle ()
    {
        \PHPUnit_Framework_Assert::assertEquals("OLX.ph - Philippines' #1 Buy and Sell Website", $this->getTitle());
    }

    /*
     * Method to verify home page attribute tag
     */
    public function verifyHomepageAttributeTag ()
    {
        $OneWeb = new OneWeb();
        \PHPUnit_Framework_Assert::assertEquals(self::ATTR_HOME_BODY_TAG,$OneWeb->getAttributeBodyPage2());
    }

    /*
     * Method to fill search bar in homepage
     */
    public function fillSearchBar($keyword = '')
    {
        $this->page()->find()->elementWithId(self::ELEMENT_SEARCH_BAR_INPUT_ID)->sendKeys($keyword);
    }

    /*
     * Method to fill location bar homepage
     */
    public function fillLocationBar ($location = '')
    {
        $this->page()->find()->elementWithId(self::ELEMENT_LOCATION_BAR_INPUT_ID)->sendKeys($location);
    }

    /*
     * Method of clicking search submit button
     */
    public function clickSearchButton()
    {
        $this->page()->find()->elementWithCss(self::ELEMENT_SEARCH_BAR_SUBMIT_CSS)->click();
        $this->page()->wait(10);
    }

    /*
     * Method for checking if listing page is loaded
     */
    public function didLoad()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithCss(self::ELEMENT_CATEGORY_LINK);
    }

    /*
     * Method of checking element in homepage is present
     */
    public function checkHeaderElement()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_SEARCH_BAR_INPUT_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_LOCATION_BAR_INPUT_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_SEARCH_BAR_SUBMIT_CSS);
        //$this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(LayoutPageHeader::ELEMENT_LOGO_ID);
        //$this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(LayoutPageHeader::ELEMENT_WIN_WIN_EXCHANGE_CSS);
    }

    /*
     * Method of checking search suggestion is displayed
     */
    public function checkSearchSuggestionElement()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SEARCH_BAR_SUGGESTION_ID);
        /*
        $this->page()->findAndAssertThat()->textEquals($keywords)->elementWithCss(self::ELEMENT_SEARCH_BAR_SUGGESTION_ID);
        $suggestions = $this->getBrowser()->getCurrentPage()->getElement()->withCss(self::ELEMENT_SEARCH_BAR_SUGGESTION_ID);
        return $suggestions->thenFind()->asHtmlElement()->getText();
        */
    }

    /*
     * Method of checking location suggestion is displayed
     */
    public function checkLocationSuggestionElement()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_LOCATION_BAR_SUGGESTION_ID);
    }

    /*
     * Method to click View All Categories in homepage
     */
    public function clickAllCategoriesButton()
    {
        $this->page()->find()->elementWithCss(self::ELEMENT_CATEGORY_ALL_BUTTON_CSS)->click();
        //$this->page()->wait(10);
    }

    /*
     * Method of clicking category in homepage
     */
    public function clickMainCategoryCss($category)
    {
        $this->page()->find()->elementWithCss($category)->click();
        $this->page()->wait(10);
    }

    /*
     * Method to click Sell Your Item button in homepage
     */
    public function clickSellYourItemButton()
    {
        $this->page()->find()->elementWithCss(self::ELEMENT_SELL_YOUR_ITEM_BTN_CSS)->click();
    }

    /*
     * Method to close browser under test.
     */
    public function closeBrowser()
    {
        Athena::browser()->close();
    }

    /*
     * Method to select the suggested keyword base on entered keyword
     */
    public function selectSuggestedLocation($keyword = '')
    {
        $suggestions = $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithCss(self::ELEMENT_LOCATION_BAR_SUGGESTION_ID);
        foreach ($suggestions as $data)
        {
            $objectData = $data->getText();
            if ($objectData == $keyword)
            {
                sleep(1);
                $data->click();
                sleep(5);
                break;
            }

        }
    }

    public function clickCategory_byVisibleText_inHomepage($categoryName)
    {
        $categories = $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithCss(self::ELEMENT_CATEGORY_TEXT_CSS);
        foreach ($categories as $data)
        {
            $objectData = $data->getText();
            //var_dump($objectData);

            if ((strtoupper(trim($objectData)) == strtoupper(trim($categoryName))) OR
                (stristr(strtoupper(trim($objectData)),strtoupper(trim($categoryName))) == true))
            {
                sleep(1);
                $data->click();
                break;
            }
        }
    }


}
