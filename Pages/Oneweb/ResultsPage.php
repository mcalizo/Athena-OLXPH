<?php

namespace Tests\Pages\Oneweb;

class ResultsPage extends OneWeb
{
    const ELEMENT_SEARCH_RESULT = '.item a:nth-child(3) span.title';
    const ELEMENT_LISTING_COMMON = 'div #listingsRow div';
    const ELEMENT_HEADER_LOGO_ID = 'a[href="/"][class="logo-link"] g#logo';
    const ELEMENT_HEADER_SEARCH_KEYWORD_CSS = 'input.desktopSearchBar';
    const ELEMENT_HEADER_LOCATION_KEYWORD_ID = 'locationSearchBar';
    const ELEMENT_HEADER_SEARCH_BUTTON_ID = 'desktopSearchButton';
    const ELEMENT_HEADER_LOCATION_MODAL_CSS = '#headerLocationModal input#location-search';
    const ELEMENT_LOCATION_MODAL_ID = 'headerLocationModal';
    const ELEMENT_LOCATION_MODAL_ATTR = 'style';
    const ELEMENT_NO_RESULT_TEXT_CSS = 'div.paging.text-center';
    const ELEMENT_SEARCH_RESULTSTEXT_ID = '#listingsContent div.results span.result-count';
    const ELEMENT_SEARCH_REGIONLIST_MAIN_SUB_CSS = 'div#headerLocationModal ul li a';
    const ELEMENT_NEXT_BUTTON_PAGINATION_CSS = 'li.pagination-next a.page';
    //const ELEMENT_SORT_BY_CSS = 'select#orderId option';
    const ELEMENT_SORT_BY_CSS = 'div.results select';
    const ELEMENT_LINK_BREADCRUMBS_HOME_CSS = 'ul.breadcrumbs li a';
    const ELEMENT_FILTERS_BAR_ID = 'moreFiltersSideBar';
    const ELEMENT_TEXT_DATE_POSTED_CSS = 'div#moreFilters div div';
    const ELEMENT_FILTER_DATE_POSTED_CSS = 'div#moreFilters div ul li a';
    const ELEMENT_CATEGORY_LEFTNAV_FILTER_CSS = 'div.categories.filter ul li ul li a';
    const ELEMENT_DATE_POSTED_TEXT_CSS = 'div#moreFilters.more>div:nth-child(3) div.filtertitle';
    const ELEMENT_DATE_POSTED_FILTER_CSS = 'div#moreFilters.more>div:nth-child(3) ul li';
    const TEXT_DATE_POSTED = 'Date Posted';
    const ELEMENT_CONDITION_TEXT_CSS = 'div#moreFilters.more>div:nth-child(1)>div.filtertitle';
    const ELEMENT_CONDITION_FILTER = 'div#moreFilters.more>div:nth-child(1)>ul li';
    const TEXT_CONDITION = 'Condition';
    const ELEMENT_PRICE_RANGE_TEXT_CSS = 'div#moreFilters.more>form:nth-child(2) div.filtertitle';
    const ELEMENT_PRICE_RANCE_FILTER_CSS = 'div#moreFilters.more>form:nth-child(2) ul li';
    const TEXT_PRICE_RANGE = '₱ Price Range';
    const ELEMENT_CATE_SUBCATE_LEFTNAV_CSS = 'div.columns.filtercolumn ul li a';
    const ELEMENT_BROWSING_LOCATION_LEFT_NAV_CSS = 'div[class="filtersPanel"]>div:nth-child(1)>div>div';
    const ELEMENT_BROWSING_CATE_SUBCATE_LEF_NAV_CSS = 'div[class="filtersPanel"]>div:nth-child(2)>div>div';
    const ELEMENT_ACTIVE_FILTER_CSS = 'span.label.filter';
    const ELEMENT_ACTIVE_FILTER_2DAYS_CSS = 'span.result-count span:nth-child(2)';
    const ELEMENT_SPONSORED_ADS_CSS = '.item a.link.highlight';
    const ELEMENT_VIEW_BUY_NOW_ITEMS_BUTTON_ID = 'view_buy_now_items';
    const ELEMENT_ADS_BUY_NOW_BADGE_CSS = 'span.marker>i.icon.buynow.light';
    const ELEMENT_REMOVED_ACTIVE_FILTER_CSS = 'span.label.filter a.close';
    const SELL_ITEM_BUTTON_CSS = 'a.button.hollow.sell';
    const ELEMENT_PRICE_RANGE_MIN_ID = 'priceRangeMin';
    const ELEMENT_PRICE_FILTER_BTN_ID = 'btnPriceFilter';

    const STRING_PAGE_BODY_ATTR = 'page-listing';

    const ELEMENT_ADSENSE_LISTING_ID = 'div-gpt-ad-1493902203535-0';
    const ELEMENT_ADSENSE_LISTING_RIGHT_ID = 'div-gpt-ad-740477080970898284-2';
    const ELEMENT_ADSENSE_LISTING_BOTTOM_ID = 'div-gpt-ad-1493963761060-0';
    const ELEMENT_ADSENSE_LISTING_AFS_TOP_ID = 'banner_afs_top';
    const ELEMENT_ADSENSE_LISTING_AFS_BOTTOM_ID = 'banner_afs_bottom';
    const ELEMENT_ADSENSE_DETAILS_GALLERY_BOTTOM_ID = 'div-gpt-ad-1499936530770-0';
    const ELEMENT_ADSENSE_DETAILS_RIGHT_ID = 'div-gpt-ad-1494474159390-0';
    const ELEMENT_ADSENSE_DETAILS_BOTTOM_ID = 'div-gpt-ad-1493888374551-0';
    const ELEMEN_NO_RESULTS_NOTIF_AND_KEYWORDS = 'div.text-center h2';
    const ELLEMENT_NO_RESULTS_NOTIF_AND_LOCATION = 'div.listing.with-sky.no-results div.paging.text-center div.text-center p:nth-child(3)';


//    public function __construct()
//    {
//        parent::__construct(Athena::browser(), '/');
//    }

    /**
     * Method to
     * @return \Facebook\WebDriver\Remote\RemoteWebElement[]
     */
    public function hasResults()
    {
        return $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithCss(self::ELEMENT_SEARCH_RESULT);
    }

    public function hasNoResults()
    {
        $this->page()->findAndAssertThat()->doesNotExist()->elementsWithCss(self::ELEMENT_SEARCH_RESULT);
    }

    private function getElementLogo(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withCss(self::ELEMENT_HEADER_LOGO_ID);
    }

    /**
     * Method to click OLX logo
     */
    public function clickLogo()
    {
        $this->getElementLogo()->thenFind()->asHtmlElement()->click();
        //$this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_HEADER_LOGO_ID)->click();
    }

    public function getListingElements()
    {
        return $this->getBrowser()->getCurrentPage()->find()->elementsWithCss(self::ELEMENT_SEARCH_RESULT);
    }

    public function clickRandomInListing()
    {
        #scroll to bottom
        $this->page()->executeScript('window.scrollTo(0, document.body.scrollHeight);',array());
        sleep(3);
        #scroll up
        $this->page()->executeScript('window.scrollTo(0, -document.body.scrollHeight);',array());
        sleep(2);
        $itemLists = $this->getListingElements();
        shuffle($itemLists);
        $itemLists[0]->click();
        sleep(3);
    }

    /**
     * Method to enter search keywords in header at listing page
     * @param string $keywords
     */
    public function enterSearchKeywords ($keywords = '')
    {
        $this->page()->find()->elementWithCss(self::ELEMENT_HEADER_SEARCH_KEYWORD_CSS)->sendKeys($keywords);
    }

    public function enterLocationKeywords ($location = '')
    {
        $this->page()->find()->elementWithCss(self::ELEMENT_HEADER_LOCATION_MODAL_CSS)->sendKeys($location);
    }

    public function clickLocationHeader()
    {
        $this->page()->find()->elementWithId(self::ELEMENT_HEADER_LOCATION_KEYWORD_ID)->click();
    }

    public function verifyLocationSuggestionsModal()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss('#regionsList li a div');
    }


    public function clickSuggestionLocationModal()
    {
        $this->page()->find()->elementWithCss('#regionsList li:nth-child(1) a div')->click();
    }

    public function enterLocationViaModal ()
    {
        $this->clickLocationHeader();
    }

    public function clickSearchButton()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_HEADER_SEARCH_BUTTON_ID)->click();
    }

    public function verifyNoResult()
    {
        return $this->getText(self::ELEMENT_NO_RESULT_TEXT_CSS);
    }

    public function verifyResultsAboutIn($searchKeyword,$locationKeyword){
        $resultsText = $this->getText(self::ELEMENT_SEARCH_RESULTSTEXT_ID);
        \PHPUnit_Framework_Assert::assertContains($searchKeyword, $resultsText);
        \PHPUnit_Framework_Assert::assertContains($locationKeyword, $resultsText);

    }

    public function getSelectedValueInDropDown ($element){
        $value = $this->getBrowser()->getCurrentPage()->getElement()->withCss($element);
        $value->thenFind()->asDropDown()->getFirstSelectedOption();
        return trim($value->thenFind()->asDropDown()->getFirstSelectedOption()->getText());
    }

    /*
     * Method to select the suggested keyword base on entered keyword in listing page
     */
    public function selectSuggestedLocation($keyword = '')
    {
        $suggestions = $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithCss(self::ELEMENT_SEARCH_REGIONLIST_MAIN_SUB_CSS);
        foreach ($suggestions as $data)
        {
            $objectData = $data->getText();
            if ($objectData == $keyword)
            {
                sleep(10);
                $data->click();
                sleep(5);
                break;
            }

        }
    }


    /**
     * Method to select the category filter in left navigation
     * @param string $keyword
     */
    function selectFilterByCategoryLeftNav ($keyword = '')
    {
        $filters = $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithCss(self::ELEMENT_CATE_SUBCATE_LEFTNAV_CSS);
        foreach ($filters as $data)
        {
            $objectData = $data->getText();
            //$objectData = str_replace('\n','',$data->getText());
            //var_dump("OBJECT TEXT: ". $objectData);
            if ($objectData == $keyword)
            {
                sleep(5);
                $data->click();
                sleep(10);
                break;
            }

        }
    }


    public function verifyLeftNavFilterOptionsSubCategory($text = '',$element1 = '', $element2 = ''){
        \PHPUnit_Framework_Assert::assertEquals($text,$this->getText($element1));
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithCss($element2);
    }

    public function verifyDatePostedFilterOptionsAllResults()
    {
        \PHPUnit_Framework_Assert::assertEquals(self::TEXT_DATE_POSTED,$this->getText(self::ELEMENT_TEXT_DATE_POSTED_CSS));
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithCss(self::ELEMENT_FILTER_DATE_POSTED_CSS);
    }


    public function verifyUrlSortedByDropdown($sortBy)
    {
        $type = strtolower($sortBy);
        switch ($type)
        {
            case "relevance":
                \PHPUnit_Framework_Assert::assertNotContains('order=filter_float_price:asc',$this->getBrowser()->getCurrentURL());
                \PHPUnit_Framework_Assert::assertNotContains('order=filter_float_price:desc',$this->getBrowser()->getCurrentURL());
                \PHPUnit_Framework_Assert::assertNotContains('order=created_at:asc',$this->getBrowser()->getCurrentURL());
                break;
            case "cheapest first":
                \PHPUnit_Framework_Assert::assertContains('order=filter_float_price:asc', $this->getBrowser()->getCurrentURL());
                break;
            case "expensive first":
                \PHPUnit_Framework_Assert::assertContains('order=filter_float_price:desc', $this->getBrowser()->getCurrentURL());
                break;
            case "date posted":
                \PHPUnit_Framework_Assert::assertContains('order=created_at:asc', $this->getBrowser()->getCurrentURL());
                break;
        }
    }

    /**
     * Get count of ads displayed in results page
     * @return int
     */
    public function getAdsCountDisplayedInResultsPage()
    {
        return count($this->page()->findAndAssertThat()->elementsWithCss(self::ELEMENT_SEARCH_RESULT));
    }

    /**
     * Get count of buy now badge in results page
     * @return int
     */
    public function getBuyNowBadgeCountInResultsPage()
    {
        return count($this->page()->findAndAssertThat()->elementsWithCss(self::ELEMENT_ADS_BUY_NOW_BADGE_CSS));
    }
    
    public function verifyAdsensePresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithId(self::ELEMENT_ADSENSE_LISTING_ID);
    }

    public function verifyAdsenseRightPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithId(self::ELEMENT_ADSENSE_LISTING_RIGHT_ID);
    }

    public function verifyAdsenseBottomPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithId(self::ELEMENT_ADSENSE_LISTING_RIGHT_ID);
    }

    public function verifyAfsTopPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithId(self::ELEMENT_ADSENSE_LISTING_AFS_TOP_ID);
    }

    public function verifyAfsBottomPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithId(self::ELEMENT_ADSENSE_LISTING_AFS_BOTTOM_ID);
    }

    public function verifyGalleryAfsBottomPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithId(self::ELEMENT_ADSENSE_DETAILS_GALLERY_BOTTOM_ID);
    }

    public function verifyAdsenseDetailsRight()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithId(self::ELEMENT_ADSENSE_DETAILS_RIGHT_ID);
    }

    public function verifyAdsenseDetailsBottom()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithId(self::ELEMENT_ADSENSE_DETAILS_BOTTOM_ID);
    }

    public function getAudienceSegments()
    {

        sleep(3);
        $currentPage = $this->getBrowser()->getPageSource();
        preg_match('/.*dc_seg=(\d+).*/', $currentPage, $matches);
        //echo "<pre>";
       // print_r($matches);
        return $matches[1];
    }
}
