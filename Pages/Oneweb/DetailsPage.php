<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 27/09/2016
 * Time: 10:13 AM
 */

namespace Tests\Pages\Oneweb;

use Athena\Athena;

class DetailsPage extends OneWeb
{
    const DETAILS_PAGE_SEND_PM_CSS = 'div[class="contact-secondary"]';
    const ELEMENT_LOCATION_IMAGE_BOX_ID = 'photoGallery';
    const ELEMENT_LOCATION_IMAGE_BOX_ATTR = 'style';
    const ELEMENT_IMAGE_NEXT_BUTTON_CSS = 'button.orbit-next span';
    const ELEMENT_IMAGE_GALLERY_MODAL_EXIT_BUTTON_CSS = '#photoGallery button.close-button span';
    const ELEMENT_ORBIT_BUTTON_GALLERY_MODAL_BUTTON_CSS = 'nav.orbit-bullets button';
    const ELEMENT_IMAGE_GALLERY_MODAL_NEXT_BUTTON_CSS = 'ul.orbit-container button.orbit-next';
    const ELEMENT_IMAGE_GALLERY_VALUE_IS_ACTIVE_CSS = 'nav.orbit-bullets button.is-active';
    //const ELEMENT_IMAGE_GALLERY_ORBIT_BUTTONS_CSS = 'nav.orbit-bullets button';
    const ELEMENT_DETAILS_AD_TITLE_CSS = 'h1.title-name';
    const ELEMENT_DETAILS_AD_PRICE_CSS = 'h2.price-value';
    const ELEMENT_DETAILS_AD_DESCRIPTION_ID = 'description';
    const ELEMENT_DETAILS_AD_CONDITION_FIELD_CSS = '#column div.details ul.list li:nth-child(1)';
    const ELEMENT_DETAILS_AD_LOCATION_CSS = '#column div.details ul.list li:nth-child(2)';
    const ELEMENT_DETAILS_AD_DATE_POSTED_CSS = '#column div.details ul.list li:nth-child(3)';
    const ELEMENT_DETAILS_AD_CATEGORY_CSS = '#column div.details ul.list li:nth-child(4)';
    const ELEMENT_DETAILS_AD_USER_CARD_AVATAR_CSS = '#column div.profile';
    const ELEMENT_DETAILS_AD_SELLER_NAME_CSS = 'div.seller span.username>a';
    const ELEMENT_DETAILS_AD_SELLER_AVATAR_CSS = 'div.seller a[name="user_profile"]';
    const ELEMENT_DETAILS_AD_SELLER_LOCATION_CSS = 'div.seller span[name="seller_location"]';
    const ELEMENT_DETAILS_AD_MEMBER_SINCE_CSS = 'div.seller small ul li:nth-child(1)';
    const ELEMENT_DETAILS_AD_LAST_LOGIN_CSS = 'div.seller small ul li:nth-child(2)';
    const ELEMENT_DETAILS_AD_LAST_ACCESS_FROM_FIELD_CSS = 'div.seller small ul li:nth-child(3)';
    const ELEMENT_DETAILS_AD_VIEW_MORE_AD_FROM_USER_CSS = 'div.seller a[name="view_more_ads"]';
    const ELEMENT_DETAILS_AD_MOBILE_NUMBER_CSS = 'a[data-custom-attr="showPhoneBtn"]';
    const ELEMENT_DETAILS_AD_CHAT_SELLER_BUTTON_ID = 'loginContact';
    const ELEMENT_DETAILS_AD_CHAT_SELLER_BUTTON_CSS = 'div.contact-action a';
    const ELEMENT_DETAILS_AD_CHAT_SELLER_MODAL_ATTR = 'style';
    const ELEMENT_DETAILS_LOGIN_TO_CONTACT_SELLER_CSS = '#loginForm h3';
    const ELEMENT_DETAILS_AD_FB_LOGIN_MODAL_ID = 'fb_login';
    const ELEMENT_DETAILS_AD_GPLUS_LOGIN_MODAL_ID = 'gplus';
    const ELEMENT_DETAILS_AD_MOBILE_LOGIN_MODAL_NAME = 'mobile';
    const ELEMENT_DETAILS_AD_PASSWORD_LOGIN_MODAL_NAME = 'password';
    const ELEMENT_DETAILS_AD_LOGIN_BUTTON_LOGIN_MODAL_ID = 'login_button';
    const ELEMENT_DETAILS_AD_REGISTER_BUTTON_LOGIN_MODAL_ID = 'register_link';
    const ELEMENT_DETAILS_CHAT_SELLER_MODAL_ID = 'sendPM';
    const ELEMENT_DETAILS_CHAT_SELLER_MODAL_ATTR = 'style';
    const ELEMENT_DETAILS_MOBILE_REAL_NUMBER_ID = 'real_mobile_number';
    const ELEMENT_DETAILS_MOBILE_REAL_NUMBER_ATTR = 'style';
    const ELEMENT_DETAILS_AD_BROWSE_MORE_SECTION_CSS = 'div.autokeywords';
    const ELEMENT_DETAILS_AD_BROWSE_MORE_KEYWORDS_CSS = 'div.autokeywords div span.keywords a';
    const ELEMENT_DETAILS_AD_BREADCRUMBS_CSS = 'ul.breadcrumbs';
    const ELEMENT_DETAILS_AD_BREADCRUMBS_LINKS_CSS = 'ul.breadcrumbs li a';
    const ELEMENT_DETAILS_AD_BACK_TO_RESULTS_BUTTON_CSS = 'li.pagination-previous a';
    const ELEMENT_DETAILS_AD_NEXT_AD_BUTTON_CSS = 'li.pagination-next a';
    const ELEMENT_DETAILS_AD_ZOOM_PHOTO_CSS = '#photo a img';
    const ELEMENT_DETAILS_AD_MOBILE_NUMBER_BUTTON_LOGGED_IN_ID = 'show_mobile_number';
    const ELEMENT_DETAILS_CONTACT_P24_BUTTON_ID = 'sendPMP24Btn';
    const ELEMENT_DETAILS_SENDPM_P24_MODAL_ID = 'sendPMP24';
    const ELEMENT_DETAILS_SENDPM_P24_BUTTON_CSS = 'a#sendPM24.button';
    const ELEMENT_DETAILS_SENDPM_P24_MODAL_ATTR = 'style';
    const ELEMENT_DETAILS_MESSAGE_SENT_MODAL_ID = 'messagesent';
    const TEXT_DETAILS_MESSAGE_SENT_MODAL = 'We\'ll notify you via email and/or SMS if the seller responds to your message.';
    const ELEMENT_DETAILS_MESSAGE_SENT_CSS = ' div.reveal.messagesent p';
    const ELEMENT_DETAILS_MESSAGE_SENT_MODAL_ATTR = 'style';
    const TEXT_DETAIL_AD_CONTACT_SELLER_MODAL = 'We aim to keep OLX safe for you';
    const STRING_PAGE_BODY_ATTR = 'page-details';


//    public function __construct()
//    {
//        parent::__construct(Athena::browser(), '/');
//    }

    /*
     * Validating that user in details page
     */
    public function inDetailsPageCheck()
    {
        return $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::DETAILS_PAGE_SEND_PM_CSS);
    }

    /*
     * Validating the exit button in Image Gallery Modal in details page
     */
    public function verifyExitImageButtonModal()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_IMAGE_GALLERY_MODAL_EXIT_BUTTON_CSS);
    }

    /*
     * Validating the orbit button in image gallery modal
     */
    public function verifyOrbitButtonImageGalleryModal()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithCss(self::ELEMENT_ORBIT_BUTTON_GALLERY_MODAL_BUTTON_CSS);
    }

    /*
     * Validating image change when click next button of gallery modal.
     * Create a condition for ad that has only on image due to ramdom
     *  selection in ad listing page
     */
    public function verifyChangeImageDisplay()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_IMAGE_GALLERY_VALUE_IS_ACTIVE_CSS);
    }

    /*
     * Click orbit bullet button randomly
     */
    public function clickOrbitBulletRandomly()
    {
        $elements = $this->page()->find()->elementsWithCss(self::ELEMENT_ORBIT_BUTTON_GALLERY_MODAL_BUTTON_CSS);
        shuffle($elements);
        $elements[0]->click();
        sleep(3);
    }

    /*
     * Validating the ad details page title exists
     */
    public function verifyAdDetailsPageTitleElementExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_DETAILS_AD_TITLE_CSS);
    }

    /*
     * Validating the ad details page price exists
     */
    public function verifyAdDetailsPagePriceElementExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_DETAILS_AD_PRICE_CSS);
    }

    /*
     * Validating the ad details page description exists
     */
    public function verifyAdDetailsPageDescriptionElementExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_DETAILS_AD_DESCRIPTION_ID);
    }

    /*
     * Validating the ad details page condition
     */
    public function verifyAdDetailsPageConditionElementExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_DETAILS_AD_CONDITION_FIELD_CSS);
    }

    /*
     * Validation the ad details page location exists
     */
    public function verifyAdDetailsPageLocationElementExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_DETAILS_AD_LOCATION_CSS);
    }

    /*
     * Validating the ad details page posted date
     */
    public function verifyAdDetailsPagePostedDateElementExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_DETAILS_AD_DATE_POSTED_CSS);
    }

    /*
     * Validating the ad details page category exists
     */
    public function verifyAdDetailsPageCategoryElementExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_DETAILS_AD_CATEGORY_CSS);
    }

    /*
     * Validating the ad details page card avatar exists
     */
    public function verifyAdDetailsPageCardAvatarElementExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_DETAILS_AD_USER_CARD_AVATAR_CSS);
    }

    /*
     * Validating the ad details page seller name element exists
     */
    public function verifyAdDetailsPageSellerNameElementExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_DETAILS_AD_SELLER_NAME_CSS);
    }

    /*
     * Validating the ad details page seller avatar element exists
     */
    public function verifyAdDetailsPageSellerAvatarElementExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_DETAILS_AD_SELLER_AVATAR_CSS);
    }

    /*
     * Validating the ad details page seller location element exists
     */
    public function verifyAdDetailsPageSellerLocationElementExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_DETAILS_AD_SELLER_LOCATION_CSS);
    }

    /*
     * Validating the ad details page seller last login field
     */
    public function verifyAdDetailsPageSellerLastLoginElementExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_DETAILS_AD_LAST_LOGIN_CSS);
    }

    /*
     * Validating the ad details page seller last access from ad
     */
    public function verifyAdDetailsPageSellerLastAccessElementExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_DETAILS_AD_LAST_ACCESS_FROM_FIELD_CSS);
    }

    /*
     * Validating the ad details page seller member since element exists
     */
    public function verifyAdDetailsPageSellerMemberSinceElementExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_DETAILS_AD_MEMBER_SINCE_CSS);
    }

    /*
     * Validating ad details page seller view more ads element exists
     */
    public function verifyAdDetailsPageSellerViewMoreAdsElementExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_DETAILS_AD_VIEW_MORE_AD_FROM_USER_CSS);
    }

    /*
     * Validate login model in ad details page
     */
    public function verifyAdDetailsPageChatSellerLoginModal()
    {
        \PHPUnit_Framework_Assert::assertEquals(self::TEXT_DETAIL_AD_CONTACT_SELLER_MODAL, $this->getText(self::ELEMENT_DETAILS_LOGIN_TO_CONTACT_SELLER_CSS));
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_DETAILS_AD_FB_LOGIN_MODAL_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_DETAILS_AD_GPLUS_LOGIN_MODAL_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithName(self::ELEMENT_DETAILS_AD_MOBILE_LOGIN_MODAL_NAME);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithName(self::ELEMENT_DETAILS_AD_PASSWORD_LOGIN_MODAL_NAME);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_DETAILS_AD_LOGIN_BUTTON_LOGIN_MODAL_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_DETAILS_AD_REGISTER_BUTTON_LOGIN_MODAL_ID);
    }

    /*
     * Validating seller ads page URL
     */
    public function verifySellerProfileAdsPageUrl()
    {

        \PHPUnit_Framework_Assert::assertContains('.olx.ph/ads/user/', $this->getBrowser()->getCurrentURL());
    }

    /*
     * Validating seller ads page listings
     */
    public function verifySellerProfileAdsListing()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithCss(SellerAdsPage::ELEMENT_SELLER_ADS_PROFILE_CSS);
    }

    /*
     * Validating the Browse More sections
     */
    public function verifyBrowseMoreSection()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementsWithCss(self::ELEMENT_DETAILS_AD_BROWSE_MORE_SECTION_CSS);
        \PHPUnit_Framework_Assert::assertContains('Browse more', $this->getText(self::ELEMENT_DETAILS_AD_BROWSE_MORE_SECTION_CSS));
    }

    /*
     * Validating the keywords exists in Browse More section
     */
    public function verifyBrowseMoreKeywordsExists()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithCss(self::ELEMENT_DETAILS_AD_BROWSE_MORE_KEYWORDS_CSS);
    }

    /*
     * Validating the breadcrumbs exists in ad detail page
     */
    public function verifyAdDetailsBreadcrumbsExists()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_DETAILS_AD_BREADCRUMBS_CSS);
    }

    /*
     * Validating links of breadcrumbs is 200
     */
    public function verifyAdDetailsBreadcrumbsLinksNotBroken ()
    {
        $broken = [];
        $valid = [];

        $urls = $this->getBreadcrumbsLinks();

        foreach ($urls as $url) {
            if ($this->isURLBroken($url) == true) {
                $broken[] = $url;
            } else {
                $valid[] = $url;
            }
        }

//        for($i=0;$i<$total_link_test;$i++){
//            if($this->isURLBroken($urls[$i])){
//                $broken[] = array($i=>$urls[$i]);
//            }else{
//                $valid[] = array($i=>$urls[$i]);
//            }
//        }

        if(count($broken)>0){
            print_r($broken);
            $error = print_r($broken);
            \PHPUnit_Framework_Assert::fail($error);
        }
    }

    /*
     * Get href links of breadcrumbs
     */
    public function getBreadcrumbsLinks ()
    {
        $elements = $this->getBrowser()->getCurrentPage()->find()->elementsWithCss(self::ELEMENT_DETAILS_AD_BREADCRUMBS_LINKS_CSS);

        foreach ($elements as $links)
        {
            $urls[] = $links->getAttribute('href');
        }

        return $urls;
    }

    /*
     * Checking of photos in details page => 3 for testing purposes
     */
    public function checkPhotosOfAdMoreEqualMoreThanThree ()
    {
        //$obj = $this->page()->find()->elementsWithCss(self::ELEMENT_ORBIT_BUTTON_GALLERY_MODAL_BUTTON_CSS);
        $listing = new ResultsPage();
        while (count($this->page()->find()->elementsWithCss(self::ELEMENT_ORBIT_BUTTON_GALLERY_MODAL_BUTTON_CSS)) < 3) {
                $this->openPage('all-results');
                $listing->clickRandomInListing();
        }
    }

    /*
     * Verify user able to send message to seller with condition if P24
     */
    public function verifyUserABleToSendMessageToSellerWithCondition () {
        sleep(5);
        $curUrl = $this->getBrowser()->getCurrentURL();
        if (stripos($curUrl, "messages/chat-") == true) {
            $url = Athena::settings()->get('urls')->orFail();
            \PHPUnit_Framework_Assert::assertContains($url['/'] . $url['messages'] . "/chat-", $this->getBrowser()->getCurrentURL());
        } else {
            $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_DETAILS_SENDPM_P24_MODAL_ID);
        }
    }

    /*
     * Verify send message elements with condition if P24
     */
    public function verifySendMessageElementsWithConditionifP24 () {
        sleep(15);
        $curUrl = $this->getBrowser()->getCurrentURL();
        if (stripos($curUrl, "/messages") == true) {
            echo "Organic Ads";
            $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(MessagesPage::ELEMENT_CONVERSATION_CHAT_FIELD_ID);
        } else {
            echo "P24 Ads";
            \PHPUnit_Framework_Assert::assertEquals("display: block",$this->getElementAttributes(self::ELEMENT_DETAILS_SENDPM_P24_MODAL_ID,self::ELEMENT_DETAILS_SENDPM_P24_MODAL_ATTR));
        }
    }


    public function verifyAdUnits($adUnits)
    {
        $currentPage = $this->getBrowser()->getPageSource();
        return stripos($currentPage,$adUnits);

    }

    public function verifyMessageSentModal()

    {
        \PHPUnit_Framework_Assert::assertEquals(self::TEXT_DETAILS_MESSAGE_SENT_MODAL,$this->getElementText('css',self::ELEMENT_DETAILS_MESSAGE_SENT_CSS));
    }

}