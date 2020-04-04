<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 20/10/2016
 * Time: 6:37 PM
 */

namespace Tests\Bdd\context;

use Athena\Athena;
use Athena\Test\AthenaTestContext;

use Behat\Behat\Tester\Exception\PendingException;
use Tests\Pages\Oneweb\DetailsPage;
use Tests\Pages\Oneweb\ResultsPage;


class AdDetailsContext extends AthenaTestContext
{
    private $listing;
    private $details;

    public function __construct(){
        $this->listing = new ResultsPage();
        $this->details = new DetailsPage();

    }

    /**
     * @When /^I click first item on the listing$/
     */
    public function iClickFirstItemOnTheListing()
    {
        $this->listing->clickRandomInListing();
    }

    /**
     * @Then /^the landing page should be the ad details page of that item$/
     */
    public function theLandingPageShouldBeTheAdDetailsPageOfThatItem()
    {
        \PHPUnit_Framework_Assert::assertEquals(DetailsPage::STRING_PAGE_BODY_ATTR, $this->details->getAttributeBodyPage2());
    }

    /**
     * @Given /^I am in the ad details page$/
     */
    public function iAmInTheAdDetailsPage()
    {
        $this->listing->openPage('all-results');
        $this->listing->clickRandomInListing();
        $this->details->checkPhotosOfAdMoreEqualMoreThanThree();
        \PHPUnit_Framework_Assert::assertEquals(DetailsPage::STRING_PAGE_BODY_ATTR, $this->details->getAttributeBodyPage2());
    }

    /**
     * @When /^I click photo navigation arrows$/
     */
    public function iClickPhotoNavigationArrows()
    {
        $this->listing->clickElement('css',DetailsPage::ELEMENT_IMAGE_GALLERY_MODAL_NEXT_BUTTON_CSS);
    }

    /**
     * @Then /^I should see a photo being displayed$/
     */
    public function iShouldSeeAPhotoBeingDisplayed()
    {
        \PHPUnit_Framework_Assert::assertEquals("display: block",$this->details->getElementAttributes(DetailsPage::ELEMENT_LOCATION_IMAGE_BOX_ID,DetailsPage::ELEMENT_LOCATION_IMAGE_BOX_ATTR));
    }

    /**
     * @Given /^I should see the exit button at the top right side of the screen$/
     */
    public function iShouldSeeTheExitButtonAtTheTopRightSideOfTheScreen()
    {
        $this->details->verifyExitImageButtonModal();
    }

    /**
     * @Given /^I should see the photo navigation bullets below the photo$/
     */
    public function iShouldSeeThePhotoNavigationBulletsBelowThePhoto()
    {
        $this->details->verifyOrbitButtonImageGalleryModal();
    }

    /**
     * @Then /^the photo should change$/
     */
    public function thePhotoShouldChange()
    {
        $this->details->verifyChangeImageDisplay();
    }

    /**
     * @Given /^if I click the photo navigation bullet$/
     */
    public function ifIClickThePhotoNavigationBullet()
    {
        $this->details->clickOrbitBulletRandomly();
    }

    /**
     * @Given /^if I click the exit button$/
     */
    public function ifIClickTheExitButton()
    {
        $this->details->clickElement('css',DetailsPage::ELEMENT_IMAGE_GALLERY_MODAL_EXIT_BUTTON_CSS);
    }

    /**
     * @Then /^the landing page should be the ad details page$/
     */
    public function theLandingPageShouldBeTheAdDetailsPage()
    {
        \PHPUnit_Framework_Assert::assertEquals(DetailsPage::STRING_PAGE_BODY_ATTR,$this->details->getAttributeBodyPage2());
    }


    /**
     * @Then /^I should see the ad title$/
     */
    public function iShouldSeeTheAdTitle()
    {
        $this->details->verifyAdDetailsPageTitleElementExists();
    }

    /**
     * @Then /^I should see the ad price$/
     */
    public function iShouldSeeTheAdPrice()
    {
        $this->details->verifyAdDetailsPagePriceElementExists();
    }

    /**
     * @Then /^I should see the ad description$/
     */
    public function iShouldSeeTheAdDescription()
    {
        $this->details->verifyAdDetailsPageDescriptionElementExists();
    }

    /**
     * @Then /^I should see the condition field$/
     */
    public function iShouldSeeTheConditionField()
    {
        $this->details->verifyAdDetailsPageConditionElementExists();
    }

    /**
     * @Given /^I should see the location field$/
     */
    public function iShouldSeeTheLocationField()
    {
        $this->details->verifyAdDetailsPageLocationElementExists();
    }

    /**
     * @Given /^I should see the date posted field$/
     */
    public function iShouldSeeTheDatePostedField()
    {
        $this->details->verifyAdDetailsPagePostedDateElementExists();
    }

    /**
     * @Given /^I should see the category field$/
     */
    public function iShouldSeeTheCategoryField()
    {
        $this->details->verifyAdDetailsPageCategoryElementExists();
    }

    /**
     * @Then /^I should see the seller user card avatar$/
     */
    public function iShouldSeeTheSellerUserCardAvatar()
    {
        $this->details->verifyAdDetailsPageCardAvatarElementExists();
    }

    /**
     * @Given /^I should see the name of the seller$/
     */
    public function iShouldSeeTheNameOfTheSeller()
    {
        $this->details->verifyAdDetailsPageSellerNameElementExists();
    }

    /**
     * @Given /^I should see the avatar of the seller$/
     */
    public function iShouldSeeTheAvatarOfTheSeller()
    {
        $this->details->verifyAdDetailsPageSellerAvatarElementExists();
    }

    /**
     * @Given /^I should see the location of the seller$/
     */
    public function iShouldSeeTheLocationOfTheSeller()
    {
        $this->details->verifyAdDetailsPageSellerLocationElementExists();
    }

    /**
     * @Given /^I should see the member since field$/
     */
    public function iShouldSeeTheMemberSinceField()
    {
        $this->details->verifyAdDetailsPageSellerMemberSinceElementExists();
    }

    /**
     * @Given /^I should see the last login field$/
     */
    public function iShouldSeeTheLastLoginField()
    {
        $this->details->verifyAdDetailsPageSellerMemberSinceElementExists();
    }

    /**
     * @Given /^I should see the last access from field$/
     */
    public function iShouldSeeTheLastAccessFromField()
    {
        $this->details->verifyAdDetailsPageSellerLastAccessElementExists();
    }

    /**
     * @Given /^I should see the view more ads from this user link$/
     */
    public function iShouldSeeTheViewMoreAdsFromThisUserLink()
    {
        $this->details->verifyAdDetailsPageSellerViewMoreAdsElementExists();
    }

    /**
     * @Given /^I am a logged out user$/
     */
    public function iAmALoggedOutUser()
    {
        $this->details->getBrowser()->deleteAllCookies();
    }

    /**
     * @When /^I click chat seller button$/
     */
    public function iClickChatSellerButton()
    {
        $this->details->clickElement('css',DetailsPage::ELEMENT_DETAILS_AD_CHAT_SELLER_BUTTON_CSS);
    }

    /**
     * @Then /^I should see the login modal$/
     */
    public function iShouldSeeTheLoginModal()
    {
        \PHPUnit_Framework_Assert::assertEquals("display: block",$this->details->getElementAttributes(DetailsPage::ELEMENT_DETAILS_AD_CHAT_SELLER_BUTTON_ID,DetailsPage::ELEMENT_DETAILS_AD_CHAT_SELLER_MODAL_ATTR));
    }

    /**
     * @Given /^I should be asked to log in$/
     */
    public function iShouldBeAskedToLogIn()
    {
        $this->details->verifyAdDetailsPageChatSellerLoginModal();
    }

    /**
     * @When /^I click mobile number button$/
     */
    public function iClickMobileNumberButton()
    {
        $this->details->clickElement('css',DetailsPage::ELEMENT_DETAILS_AD_MOBILE_NUMBER_CSS);
    }

    /**
     * @Given /^the login modal is displayed$/
     */
    public function theLoginModalIsDisplayed()
    {
        \PHPUnit_Framework_Assert::assertEquals("display: block",$this->details->getElementAttributes(DetailsPage::ELEMENT_DETAILS_AD_CHAT_SELLER_BUTTON_ID,DetailsPage::ELEMENT_DETAILS_AD_CHAT_SELLER_MODAL_ATTR));
    }


    /**
     * @Given /^the chat modal is displayed$/
     */
    public function theChatModalIsDisplayed()
    {
        $this->details->verifySendMessageElementsWithConditionifP24();
    }

    /**
     * @Given /^the landing page is the ad details page$/
     */
    public function theLandingPageIsTheAdDetailsPage()
    {
        \PHPUnit_Framework_Assert::assertEquals(DetailsPage::STRING_PAGE_BODY_ATTR,$this->details->getAttributeBodyPage2());
    }

    /**
     * @Given /^I should be able to see the complete mobile number of the seller$/
     */
    public function iShouldBeAbleToSeeTheCompleteMobileNumberOfTheSeller()
    {
        \PHPUnit_Framework_Assert::assertNotContains("display:none",$this->details->getElementAttributes(DetailsPage::ELEMENT_DETAILS_MOBILE_REAL_NUMBER_ID,DetailsPage::ELEMENT_DETAILS_MOBILE_REAL_NUMBER_ATTR));
    }


    /**
     * @Then /^I the chat modal should be displayed$/
     */
    public function iTheChatModalShouldBeDisplayed()
    {
        $this->details->verifySendMessageElementsWithConditionifP24();
    }

    /**
     * @Given /^the complete mobile number of the seller is displayed$/
     */
    public function theCompleteMobileNumberOfTheSellerIsDisplayed()
    {
        \PHPUnit_Framework_Assert::assertNotContains("display:none",$this->details->getElementAttributes(DetailsPage::ELEMENT_DETAILS_MOBILE_REAL_NUMBER_ID,DetailsPage::ELEMENT_DETAILS_MOBILE_REAL_NUMBER_ATTR));
    }

    /**
     * @Given /^I click avatar of the seller$/
     */
    public function iClickAvatarOfTheSeller()
    {
        $this->details->clickElement('css',DetailsPage::ELEMENT_DETAILS_AD_SELLER_AVATAR_CSS);
    }

    /**
     * @Then /^the landing page should be the seller profile ads page$/
     */
    public function theLandingPageShouldBeTheSellerProfileAdsPage()
    {
        $this->details->verifySellerProfileAdsPageUrl();
        $this->details->verifySellerProfileAdsListing();
    }

    /**
     * @Given /^I click name of the seller$/
     */
    public function iClickNameOfTheSeller()
    {
        $this->details->clickElement('css',DetailsPage::ELEMENT_DETAILS_AD_SELLER_NAME_CSS);
    }

    /**
     * @Given /^I click location of the seller$/
     */
    public function iClickLocationOfTheSeller()
    {
        $this->details->clickElement('css',DetailsPage::ELEMENT_DETAILS_AD_SELLER_LOCATION_CSS);
    }

    /**
     * @Given /^I click view more ads from this user link$/
     */
    public function iClickViewMoreAdsFromThisUserLink()
    {
        $this->details->clickElement('css',DetailsPage::ELEMENT_DETAILS_AD_VIEW_MORE_AD_FROM_USER_CSS);
    }

    /**
     * @Then /^the browse more section is displayed$/
     */
    public function theBrowseMoreSectionIsDisplayed()
    {
        $this->details->verifyBrowseMoreSection();
    }

    /**
     * @Given /^the keywords are displayed$/
     */
    public function theKeywordsAreDisplayed()
    {
        $this->details->verifyBrowseMoreKeywordsExists();
    }

    /**
     * @Then /^the breadcrumbs should be displayed$/
     */
    public function theBreadcrumbsShouldBeDisplayed()
    {
        $this->details->verifyAdDetailsBreadcrumbsExists();
    }

    /**
     * @Given /^the links are properly redirected to its pages$/
     */
    public function theLinksAreProperlyRedirectedToItsPages()
    {
        $this->details->verifyAdDetailsBreadcrumbsLinksNotBroken();
    }

    /**
     * @Given /^I click back to results button$/
     */
    public function iClickBackToResultsButton()
    {
        $this->details->clickElement('css', DetailsPage::ELEMENT_DETAILS_AD_BACK_TO_RESULTS_BUTTON_CSS);
    }

    /**
     * @Then /^the landing page should be the corresponding ad listing page$/
     */
    public function theLandingPageShouldBeTheCorrespondingAdListingPage()
    {
        $this->listing->hasResults();
        \PHPUnit_Framework_Assert::assertEquals(ResultsPage::STRING_PAGE_BODY_ATTR,$this->details->getAttributeBodyPage2());
    }

    /**
     * @Given /^I click next ad button$/
     */
    public function iClickNextAdButton()
    {
        sleep(15);
        $this->details->clickElement('css',DetailsPage::ELEMENT_DETAILS_AD_NEXT_AD_BUTTON_CSS);
    }

    /**
     * @Then /^the landing page should be the next ad from the list$/
     */
    public function theLandingPageShouldBeTheNextAdFromTheList()
    {
        \PHPUnit_Framework_Assert::assertEquals(DetailsPage::STRING_PAGE_BODY_ATTR,$this->details->getAttributeBodyPage2());
    }

    /**
     * @When /^I click photo$/
     */
    public function iClickPhoto()
    {
        $this->listing->clickElement('css',DetailsPage::ELEMENT_DETAILS_AD_ZOOM_PHOTO_CSS);
    }

    /**
     * @When /^I enter a registered mobile number in login modal$/
     */
    public function iEnterARegisteredMobileNumberInLoginModal()
    {
        $this->details->enterString('name', DetailsPage::ELEMENT_DETAILS_AD_MOBILE_LOGIN_MODAL_NAME, Athena::settings()->get('verified-phone')->orFail());
    }

    /**
     * @Given /^I enter a valid password in login modal$/
     */
    public function iEnterAValidPasswordInLoginModal()
    {
        $this->details->enterString('name', DetailsPage::ELEMENT_DETAILS_AD_PASSWORD_LOGIN_MODAL_NAME, Athena::settings()->get('password')->orFail());
    }

    /**
     * @Given /^I click the login button in login modal$/
     */
    public function iClickTheLoginButtonInLoginModal()
    {
        $this->details->clickElement('id', DetailsPage::ELEMENT_DETAILS_AD_LOGIN_BUTTON_LOGIN_MODAL_ID);
    }

    /**
     * @When /^I click mobile number button when logged in$/
     */
    public function iClickMobileNumberButtonWhenLoggedIn()
    {
        $this->details->clickElement('id', DetailsPage::ELEMENT_DETAILS_AD_MOBILE_NUMBER_BUTTON_LOGGED_IN_ID);
    }

    /**
     * @Then /^I should be able to send message to seller$/
     */
    public function iShouldBeAbleToSendMessageToSeller()
    {
        $this->details->verifyMessageSentModal();
    }

    /**
     * @Given /^I should verify that this (.*) was exist$/
     */
    public function iShouldVerifyThatThisWasExist($adUnits)
    {
        sleep(5);
        $this->details->verifyAdUnits($adUnits);
         \PHPUnit_Framework_Assert::assertEquals(true,$this->details->verifyAdUnits($adUnits));


    }

    /**
     * @Given /^the send message modal is displayed$/
     */
    public function theSendMessageModalIsDisplayed()
    {
        sleep(10);
        \PHPUnit_Framework_Assert::assertEquals("display: block",$this->details->getElementAttributes2('id',DetailsPage::ELEMENT_DETAILS_MESSAGE_SENT_MODAL_ID,DetailsPage::ELEMENT_DETAILS_MESSAGE_SENT_MODAL_ATTR));

    }

    /**
     * @When /^I enter a buyer mobile number in login modal$/
     */
    public function iEnterABuyerMobileNumberInLoginModal()
    {
        $this->details->enterString('name', DetailsPage::ELEMENT_DETAILS_AD_MOBILE_LOGIN_MODAL_NAME, Athena::settings()->get('buyer-phone')->orFail());
    }

    /**
     * @Given /^I enter a buyer password in login modal$/
     */
    public function iEnterABuyerPasswordInLoginModal()
    {
        $this->details->enterString('name', DetailsPage::ELEMENT_DETAILS_AD_PASSWORD_LOGIN_MODAL_NAME, Athena::settings()->get('buyer-password')->orFail());
    }
}