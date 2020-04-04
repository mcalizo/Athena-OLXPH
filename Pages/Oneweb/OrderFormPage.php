<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 19/04/2017
 * Time: 5:38 PM
 */

namespace Tests\Pages\Oneweb;


class OrderFormPage extends OneWeb
{

    const ELEMENT_AGREEMENT_CHECKBOX_ID = 'verification';
    const ELEMENT_ORDER_DETAILS_NOTES_ID = 'details';
    const ELEMENT_INPUT_NAME_ID = 'name';
    const ELEMENT_INPUT_MOBILE_ID = 'mobilenumber';
    const ELEMENT_INPUT_ADDRESS1_ID = 'address';
    const ELEMENT_INPUT_ADDRESS2_ID = 'address2';
    const ELEMENT_SELECT_REGION_NAME = 'region';
    const ELEMENT_SELECT_CITY_NAME = 'city';
    const ELEMENT_INPUT_ZIP_CODE_ID = 'zip';
    const ELEMENT_BUTTON_SUBMIT_ORDER_ID = 'submitOrder';
}