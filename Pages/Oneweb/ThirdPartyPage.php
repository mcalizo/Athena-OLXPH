<?php
/**
 * Created by PhpStorm.
 * User: ralph
 * Date: 1/24/17
 * Time: 12:53 PM
 */

namespace Tests\Pages\Oneweb;

class ThirdPartyPage extends OneWeb
{
    const ELEMENT_BDO_CREDICARD_PAYMENT_NAME = 'Visa';
    const ELEMENT_PAYPAL_CREDIT_CARD_ID = 'paypalLogo';
    const ELEMENT_PESOPAY_LOGO_CSS = 'img.payDollar_logo';
    const ELEMENT_GCASH_LOGO_ID = 'ContentPlaceHolder1_bankLogoImage';

    const STRING_MASTERCARD_PAYMENT = 'mastercard';
    const STRING_DRAGONPAY_PAYMENT = 'dragonpay';

    public function checkVisaLogoInCreditCardPayment () {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithName(self::ELEMENT_BDO_CREDICARD_PAYMENT_NAME);
    }

    public function checkPayPalLogoViaCreditCardPayment () {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_PAYPAL_CREDIT_CARD_ID);
    }

    public function checkPesoPaylLogo () {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_PESOPAY_LOGO_CSS);
    }

    public function checkGCashLogo () {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_GCASH_LOGO_ID);
    }











}