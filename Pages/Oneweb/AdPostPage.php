<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 14/11/2016
 * Time: 6:59 PM
 */

namespace Tests\Pages\Oneweb;

class AdPostPage extends OneWeb
{

    const ACCT_SELL_FORM_UPLOAD_PHOTOS_ID = 'uploadmore';
    const ACCT_SELL_FORM_TITLE_ID = 'title';
    const ACCT_SELL_FORM_CATE_ID = 'category-btn';
    const ACCT_SELL_FORM_DESC_ID = 'description';
    const ACCT_SELL_FORM_LOC_ID = 'location-title';
    const ACCT_SELL_FORM_LOC_BUTTON_ID = 'location-btn';
    const ACCT_SELL_FORM_SELLER_DTLS_CSS = 'fieldset.seller';
    const ACCT_SELL_FORM_BUTTON_SELL_CSS = 'fieldset.submit button.sell-button';

    const ELEMENT_IMG_INPUT_UPLOAD_CSS = 'div#imgdropzone div>input';
    const ELEMENT_AD_CATEGORIES_CSS = 'div#categoryModal ul.list.all li a';
    const ELEMENT_AD_PRICE_ID = 'param_price';
    const ELEMENT_TITLE_NOTIF_MSGS_CSS = 'div#title-error-container span';
    const ELEMENT_CATE_NOTIF_MSGS_CSS = 'div#category_id-error-container span';
    const ELEMENT_DESC_NOTIF_MSGS_CSS = 'div#description-error-container span';
    const ELEMENT_PHOTOS_NOTIF_MSGS_CSS = 'div#riak_key-error-container span';

    const ELEMENT_SELL_CONDITION_CSS = 'fieldset.itemdetails select#param_condition';
    const ELEMENT_SELL_CARS_WARRANTY_CSS = 'fieldset.itemdetails select#param_warranty';
    const ELEMENT_SELL_CARS_YEAR_CSS= 'fieldset.itemdetails input#param_year';
    const ELEMENT_SELL_CARS_BRAND_CSS = 'fieldset.itemdetails select#param_make';
    const ELEMENT_SELL_CARS_MODEL_CSS = 'fieldset.itemdetails input#param_model';
    const ELEMENT_SELL_CARS_TRANSMISSION_CSS = 'fieldset.itemdetails select#param_transmission';
    const ELEMENT_SELL_CARS_MILEAGE_CSS = 'fieldset.itemdetails select#param_mileage';
    const ELEMENT_SELL_CARS_FUELTYPE_CSS = 'fieldset.itemdetails select#param_fuel';
    const ELEMENT_SELL_CARS_PLATENO_CSS = 'fieldset.itemdetails input#param_plate';
    const ELEMENT_SELL_REALESTATEFORSALE_CONDITION_CSS = 'fieldset.itemdetails select#param_propertycondition';
    const ELEMENT_SELL_REALESTATEFORSALE_BEDROOM_CSS = 'fieldset.itemdetails input#param_bed';
    const ELEMENT_SELL_REALESTATEFORSALE_BATHROOM_CSS = 'fieldset.itemdetails input#param_bath';
    const ELEMENT_SELL_REALESTATEFORSALE_FLOOR_CSS = 'fieldset.itemdetails input#param_floor';
    const ELEMENT_SELL_REALESTATEFORSALE_LOT_CSS = 'fieldset.itemdetails input#param_lot';
    const ELEMENT_SELL_JOBS_ADDRESS_CSS = 'fieldset.itemdetails input#param_address';
    const ELEMENT_SELL_JOBS_TYPE_CSS = 'fieldset.itemdetails select#param_jobtype';
    const ELEMENT_SELL_JOBS_EXPERIENCE_CSS = 'fieldset.itemdetails select#param_experience';
    const ELEMENT_SELL_JOBS_TITLE_CSS = 'fieldset.itemdetails input#param_jobtitle';
    const ELEMENT_SELL_JOBS_EDUCATION_CSS = 'fieldset.itemdetails select#param_education';

    const STRING_IMG_LOCATION = '/tmp/playstation.jpeg';
    const STRING_IMG_2_LOCATION = '/tmp/playstation2.jpeg';
    const STRING_TITLE_NOTIF_MSGS = 'Oops! Enter Ad Title';
    const STRING_CATE_NOTIF_MSGS = 'Oops! Select a Category';
    const STRING_DESC_NOTIF_MSGS = 'Oops! Enter Ad Description';
    const STRING_PHOTOS_NOTIF_MSGS = 'Oops! Upload at least one(1) actual photo of the item you are selling';
    const STRING_AD_PRICE = '15999';
    const STRING_AD_DESCRIPTION = 'Brand new playstation 4. Available in COD payment.
    Kindly send message for discount and inquiries.';

    public function verifySellerFormElements()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ACCT_SELL_FORM_UPLOAD_PHOTOS_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ACCT_SELL_FORM_TITLE_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ACCT_SELL_FORM_CATE_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ACCT_SELL_FORM_DESC_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ACCT_SELL_FORM_LOC_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ACCT_SELL_FORM_LOC_BUTTON_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ACCT_SELL_FORM_SELLER_DTLS_CSS);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ACCT_SELL_FORM_BUTTON_SELL_CSS);
    }

    /**
     * Method to upload image in sell form page
     */
    public function uploadAdPhoto(){
        $this->page()
            ->findAndAssertThat()
            ->existsOnlyOnce()
            ->elementWithCss(self::ELEMENT_IMG_INPUT_UPLOAD_CSS)
            ->sendKeys(self::STRING_IMG_LOCATION);
    }

    /**
     * Method to upload 2nd image in sell form page
     */
    public function uploadMoreAdPhoto(){
        $this->page()
            ->findAndAssertThat()
            ->existsOnlyOnce()
            ->elementWithCss(self::ELEMENT_IMG_INPUT_UPLOAD_CSS)
            ->sendKeys(self::STRING_IMG_2_LOCATION);
    }

    /**
     * Method to create Random string for Ad Titel
     */
    public function generateAdTitle(){
        $this->generateRandomString(10);
        return "Brand New PlayStation4 (COD Available)";
    }

    /**
     * Random string generator
     * @param $length
     * @return string
     */
    public function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function selectAdCategory ($keyword = '')
    {
        $filters = $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithCss(self::ELEMENT_AD_CATEGORIES_CSS);
        foreach ($filters as $data)
        {
            $objectData = $data->getText();
            //var_dump("OBJECT TEXT: ". $objectData);
            if ($objectData == $keyword)
            {
                sleep(5);
                $data->click();
                sleep(2);
                break;
            }
        }
    }
    
    public function verifyConditionPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_CONDITION_CSS);
    }

    public function verifyWarrantyPresent()

    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_CARS_WARRANTY_CSS);
    }

    public function verifyYearPresent()

    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_CARS_YEAR_CSS);
    }

    public function verifyBrandPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_CARS_BRAND_CSS);
    }

    public function verifyModelPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_CARS_MODEL_CSS);
    }

    public function verifyTransmissionPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_CARS_TRANSMISSION_CSS);
    }

    public function verifyMileagePresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_CARS_MILEAGE_CSS);
    }

    public function verifyFuelPresent()

    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_CARS_FUELTYPE_CSS);
    }

    public function verifyPlateNoPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_CARS_PLATENO_CSS);

    }

    public function verifyBedroomsPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_REALESTATEFORSALE_BEDROOM_CSS);
    }

    public function verifyBathroomsPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_REALESTATEFORSALE_BATHROOM_CSS);
    }

    public function verifyFloorAreaPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_REALESTATEFORSALE_FLOOR_CSS);

    }

    public function verifyLotAreaNotPresent()
    {
        $this->page()->findAndAssertThat()->doesNotExist()->elementWithCss(self::ELEMENT_SELL_REALESTATEFORSALE_LOT_CSS);
    }

    public function verifyRealEstateConditionPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_REALESTATEFORSALE_CONDITION_CSS);
    }

    public function verifyLotAreaPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_REALESTATEFORSALE_LOT_CSS);
    }

    public function verifyAddressPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_JOBS_ADDRESS_CSS);
    }

    public function verifyjobTypePresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_JOBS_TYPE_CSS);
    }

    public function verifyExperiencePresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_JOBS_EXPERIENCE_CSS);
    }

    public function verifyjobTitlePresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_JOBS_TITLE_CSS);
    }

    public function verifyEducationPresent()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithCss(self::ELEMENT_SELL_JOBS_EDUCATION_CSS);
    }

    public function verifyconditionNotPresent()
    {
        $this->page()->findAndAssertThat()->doesNotExist()->elementWithCss(self::ELEMENT_SELL_CONDITION_CSS);
    }


}
