<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 06/06/2017
 * Time: 4:56 PM
 */

namespace Tests\Bdd\context;


use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Pages\Oneweb\AdPostPage;
use Tests\Pages\Oneweb\SellFormConfirmPage;
use Tests\Pages\Oneweb\ManagePage;

class SellFormContext extends AthenaTestContext
{
    private $sellformpage;
    private $sellconfirmpage;
    private $manageadpage;

    public function __construct(){
        $this->sellformpage = new AdPostPage();
        $this->sellconfirmpage = new SellFormConfirmPage();
        $this->manageadpage = new ManagePage();
    }

    /**
     * @When /^I upload Ad Photo$/
     */
    public function iUploadAdPhoto()
    {
        $this->sellformpage->uploadAdPhoto();
        sleep(5);
    }

    /**
     * @Given /^I click Sell Your Item now button in Sell Form Page$/
     */
    public function iClickSellYourItemNowButtonInSellFormPage()
    {
        $this->sellformpage->clickElement('css',AdPostPage::ACCT_SELL_FORM_BUTTON_SELL_CSS);
        sleep(5);
    }

    /**
     * @Then /^I should be notify to enter Ad Title$/
     */
    public function iShouldBeNotifyToEnterAdTitle()
    {
        \PHPUnit_Framework_Assert::assertEquals(AdPostPage::STRING_TITLE_NOTIF_MSGS,
            trim($this->sellformpage->getElementText('css',AdPostPage::ELEMENT_TITLE_NOTIF_MSGS_CSS)),
            "Ad Title Notification not Equal.");
    }

    /**
     * @Given /^I should be notify to select Category$/
     */
    public function iShouldBeNotifyToSelectCategory()
    {
        \PHPUnit_Framework_Assert::assertEquals(AdPostPage::STRING_CATE_NOTIF_MSGS,
            trim($this->sellformpage->getElementText('css',AdPostPage::ELEMENT_CATE_NOTIF_MSGS_CSS)),
            "Ad Category Notification not Equal.");
    }

    /**
     * @Given /^I should be notify to enter Ad Description$/
     */
    public function iShouldBeNotifyToEnterAdDescription()
    {
        \PHPUnit_Framework_Assert::assertEquals(AdPostPage::STRING_DESC_NOTIF_MSGS,
            trim($this->sellformpage->getElementText('css',AdPostPage::ELEMENT_DESC_NOTIF_MSGS_CSS)),
            "Ad Description Notification not Equal.");
    }

    /**
     * @When /^I enter Ad Title$/
     */
    public function iEnterAdTitle()
    {
        $this->sellformpage->enterString('id',AdPostPage::ACCT_SELL_FORM_TITLE_ID,
            $this->sellformpage->generateAdTitle());
    }

    /**
     * @Given /^I click Choose a category button$/
     */
    public function iClickChooseACategoryButton()
    {
        $this->sellformpage->clickElement('id',AdPostPage::ACCT_SELL_FORM_CATE_ID);
        sleep(5);
    }

    /**
     * @Given /^I select category (.*)$/
     */
    public function iSelectCategory($category)
    {
        $this->sellformpage->selectAdCategory($category);
        sleep(5);
    }

    /**
     * @Given /^I select subcategory (.*)$/
     */
    public function iSelectSubcategory($subCategory)
    {
        $this->sellformpage->selectAdCategory($subCategory);
        sleep(5);
    }

    /**
     * @Given /^I enter price of Ad$/
     */
    public function iEnterPriceOfAd()
    {
        $this->sellformpage->enterString('id',AdPostPage::ELEMENT_AD_PRICE_ID, AdPostPage::STRING_AD_PRICE);
    }

    /**
     * @Then /^I should be nofify to upload Ad Photo$/
     */
    public function iShouldBeNofifyToUploadAdPhoto()
    {
        \PHPUnit_Framework_Assert::assertEquals(AdPostPage::STRING_PHOTOS_NOTIF_MSGS,
            trim($this->sellformpage->getElementText('css',AdPostPage::ELEMENT_PHOTOS_NOTIF_MSGS_CSS)),
            "Ad Photos Notification not Equal.");
    }

    /**
     * @Then /^I should notify that my ad has been submitted$/
     */
    public function iShouldNotifyThatMyAdHasBeenSubmitted()
    {
        \PHPUnit_Framework_Assert::assertEquals(SellFormConfirmPage::STRING_AD_CONFIRM_NOTIF_MSGS,
            trim($this->sellconfirmpage->getElementText('css',SellFormConfirmPage::ELEMENT_ADPOST_COMFIRM_CSS)),
            "Ad submit confirm notification not Equal.");
    }

    /**
     * @Given /^I click the ellipsis button of previously posted Ad$/
     */
    public function iClickTheEllipsisButtonOfPreviouslyPostedAd()
    {
        $this->manageadpage->clickEllipsisOfPreviousAdPostWithCountChecking();
    }

    /**
     * @Given /^I click Delete button in ellipsis modal$/
     */
    public function iClickDeleteButtonInEllipsisModal()
    {
        $this->manageadpage->clickElement('css',ManagePage::ELEMENT_ELLIPSIS_MODAL_BTN_DELETE_CSS);
    }

    /**
     * @Then /^I should be notify to Delete this ad permanently$/
     */
    public function iShouldBeNotifyToDeleteThisAdPermanently()
    {
        sleep(3);
        \PHPUnit_Framework_Assert::assertEquals(ManagePage::STRING_ELLIPSIS_DELETE_CONFIRMATION_MSGS,
            trim($this->manageadpage->getElementText('css',ManagePage::ELEMENT_ELLIPSIS_MODAL_NOTIF_CONFIRMATION_CSS)),
            "Ad delete confirm notification not Equal.");
    }

    /**
     * @When /^I click Delete button to confirm ad delete$/
     */
    public function iClickDeleteButtonToConfirmAdDelete()
    {
        $this->manageadpage->clickElement('css', ManagePage::ELEMENT_DELETE_BTN_CONFIRM_CSS);
    }

    /**
     * @Then /^I should be notify that Ad has been permanently deleted$/
     */
    public function iShouldBeNotifyThatAdHasBeenPermanendlyDeleted()
    {
        sleep(5);
        \PHPUnit_Framework_Assert::assertEquals(ManagePage::STRING_AD_PERMANENTLY_DELETED_MSGS,
            trim($this->manageadpage->getElementText('css',ManagePage::ELEMENT_CONFIRM_DELETE_MODAL_NOTIF_CSS)),
            "Ad delete permanently confirm notification not Equal.");
    }

    /**
     * @When /^I close the lightbox$/
     */
    public function iCloseTheLightbox()
    {
        $this->manageadpage->clickElement('css', ManagePage::ELEMENT_PERMANENT_DELETE_MODAL_CLOSE_BUTTON_CSS);
        sleep(5);
    }

    /**
     * @Then /^I the previously ad posted should be deleted$/
     */
    public function iThePreviouslyAdPostedShouldBeDeleted()
    {
        \PHPUnit_Framework_Assert::assertEquals(1,count($this->manageadpage->countActiveAdInAdManagement()),'Previously ad posted not deleted');
    }

    /**
     * @Given /^I enter ad description$/
     */
    public function iEnterAdDescription()
    {
        $this->sellformpage->enterString('id',AdPostPage::ACCT_SELL_FORM_DESC_ID, AdPostPage::STRING_AD_DESCRIPTION);
    }

    /**
     * @Given /^I select another subcategory (.*)$/
     */
    public function iSelectAnotherSubcategory($moreSubCategory)
    {
        $this->sellformpage->selectAdCategory($moreSubCategory);
        sleep(5);
    }

    /**
     * @Given /^I upload another Photo$/
     */
    public function iUploadAnotherPhoto()
    {
        $this->sellformpage->uploadMoreAdPhoto();
        sleep(5);
    }

    /**
     * @Given /^I click on pending tab$/
     */
    public function iClickOnPendingTab()
    {
        $this->manageadpage->clickElement('css',ManagePage::ELEMENT_AD_STATUS_LIST_PENDING_CSS);
    }

    /**
     * @Given /^I click on Moderated Tab$/
     */
    public function iClickOnModeratedTab()
    {
        $this->manageadpage->clickElement('css',ManagePage::ELEMENT_AD_STATUS_LIST_MODERATED_CSS);
    }

    /**
     * @Then /^the previously ad posted should be deleted$/
     */
    public function thePreviouslyAdPostedShouldBeDeleted()
    {
        \PHPUnit_Framework_Assert::assertEquals(1,count($this->manageadpage->countActiveAdInAdManagement()),'Previously ad posted not deleted');
    }

    /**
     * @When /^I select (.*) in moderated ad drop\-down$/
     */
    public function iSelectInModeratedAdDropDown($options)
    {
        $this->manageadpage->selectOptionOfPreviousAdPostWithCountChecking($options);
    }

    /**
     * @Then /^I should verify that condition field is present$/
     */
    public function iShouldVerifyThatConditionFieldIsPresent()
    {
        
        $this->sellformpage->verifyConditionPresent();
    }

    /**
     * @Given /^I should verify that warranty field is present$/
     */
    public function iShouldVerifyThatWarrantyFieldIsPresent()
    {
        $this->sellformpage->verifyWarrantyPresent();
    }

    /**
     * @Given /^I should verify that year field is present$/
     */
    public function iShouldVerifyThatYearFieldIsPresent()
    {
        $this->sellformpage->verifyYearPresent();
    }

    /**
     * @Given /^I should verify that brand field is present$/
     */
    public function iShouldVerifyThatBrandFieldIsPresent()
    {
        $this->sellformpage->verifyBrandPresent();
    }

    /**
     * @Given /^I should verify that model field is present$/
     */
    public function iShouldVerifyThatModelFieldIsPresent()
    {
        $this->sellformpage->verifyModelPresent();
    }

    /**
     * @Given /^I should verify that transmission field is present$/
     */
    public function iShouldVerifyThatTransmissionFieldIsPresent()
    {
        $this->sellformpage->verifyTransmissionPresent();
    }

    /**
     * @Given /^I should verify that mileage fied is present$/
     */
    public function iShouldVerifyThatMileageFiedIsPresent()
    {
        $this->sellformpage->verifyMileagePresent();
    }

    /**
     * @Given /^I should verify that fuel type field is present$/
     */
    public function iShouldVerifyThatFuelTypeFieldIsPresent()
    {
        $this->sellformpage->verifyFuelPresent();
    }

    /**
     * @Given /^I should verify that plate number field is present$/
     */
    public function iShouldVerifyThatPlateNumberFieldIsPresent()
    {
        $this->sellformpage->verifyPlateNoPresent();
    }

    /**
     * @Given /^I should verify that bedrooms field is present$/
     */
    public function iShouldVerifyThatBedroomsFieldIsPresent()
    {
        $this->sellformpage->verifyBedroomsPresent();
    }

    /**
     * @Given /^I should verify that bathrooms field is present$/
     */
    public function iShouldVerifyThatBathroomsFieldIsPresent()
    {
        $this->sellformpage->verifyBathroomsPresent();
    }

    /**
     * @Given /^I should verify that floor area field is present$/
     */
    public function iShouldVerifyThatFloorAreaFieldIsPresent()
    {
        $this->sellformpage->verifyFloorAreaPresent();
    }

    /**
     * @Given /^I should verify that lot area field is not present$/
     */
    public function iShouldVerifyThatLotAreaFieldIsNotPresent()
    {
        $this->sellformpage->verifyLotAreaNotPresent();
    }

    /**
     * @Then /^I should verify that real estate condition field is present$/
     */
    public function iShouldVerifyThatRealEstateConditionFieldIsPresent()
    {
       $this->sellformpage->verifyRealEstateConditionPresent();
    }

    /**
     * @Given /^I should verify that lot area field is present$/
     */
    public function iShouldVerifyThatLotAreaFieldIsPresent()
    {
        $this->sellformpage->verifyLotAreaPresent();
    }

    /**
     * @Then /^I should verify that address field is present$/
     */
    public function iShouldVerifyThatAddressFieldIsPresent()
    {
        $this->sellformpage->verifyAddressPresent();
    }

    /**
     * @Given /^I should verify that job type field is present$/
     */
    public function iShouldVerifyThatJobTypeFieldIsPresent()
    {
        $this->sellformpage->verifyjobTypePresent();
    }

    /**
     * @Given /^I should verify that experience field is present$/
     */
    public function iShouldVerifyThatExperienceFieldIsPresent()
    {
        $this->sellformpage->verifyExperiencePresent();
    }

    /**
     * @Given /^I should verify that job title field is present$/
     */
    public function iShouldVerifyThatJobTitleFieldIsPresent()
    {
        $this->sellformpage->verifyjobTitlePresent();
    }

    /**
     * @Given /^I shuold verify that education field is present$/
     */
    public function iShuoldVerifyThatEducationFieldIsPresent()
    {
        $this->sellformpage->verifyEducationPresent();
    }

    /**
     * @Given /^I should verify that condition field is not present$/
     */
    public function iShouldVerifyThatConditionFieldIsNotPresent()
    {
        $this->sellformpage->verifyconditionNotPresent();
    }

}