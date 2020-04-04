<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 06/12/2016
 * Time: 6:27 PM
 */

namespace Tests\Pages\Oneweb;


class PaymentPage extends OneWeb
{

    const ELEMENT_PAYMENT_OLXGOLD_CSS = 'div.payments li.option.og';
    const ELEMENT_PAYMENT_CCARD_ID = 'bdocc';
    const ELEMENT_PAYMENT_PAYPAL_CSS = 'div.payments>div.type>ul.payment-list>li.paypal';
    const ELEMENT_PAYMENT_CCPAYPAL_CSS = 'li.option.ccpaypal';
    const ELEMENT_PAYMENT_DEBITCARD_ID = 'pesopay';
    const ELEMENT_PAYMENT_GCASH_ID = 'gcash';
    const ELEMENT_PAYMENT_BDOMODAL_ID = 'bdoModal';
    const ELEMENT_PAYMENT_CEBUANAMODAL_ID = 'cebuanaModal';
    const ELEMENT_PAYMENT_LBC_ID = 'lbc';
    const ELEMENT_PAYMENT_7ELEVEN_ID = 'seveneleven';
    const ELEMENT_PAYMENT_7ELEVEN_MODAL_ID = 'sevenelevenModal';
    const ELEMENT_PAYMENT_OTHERPAYMENT_ID = 'othermethods';
    const ELEMENT_PAYMENT_BUTTON_ID = 'pay';
    const ELEMENT_PAYMENT_BDO_ID = 'pesopay_bdo_otc';
    const ELEMENT_PAYMENT_CEBUANA_ID = 'cebuana';

    const STRING_OLX_GOLD_PAYMENT_PAGE = '/pay/finish';


    public function verifyPaymentPageElements()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_PAYMENT_OLXGOLD_CSS);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_PAYMENT_CCARD_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_PAYMENT_PAYPAL_CSS);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_PAYMENT_CCPAYPAL_CSS);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_PAYMENT_DEBITCARD_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_PAYMENT_GCASH_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_PAYMENT_BDO_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_PAYMENT_BDOMODAL_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_PAYMENT_CEBUANA_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_PAYMENT_CEBUANAMODAL_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_PAYMENT_LBC_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_PAYMENT_7ELEVEN_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_PAYMENT_7ELEVEN_MODAL_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_PAYMENT_OTHERPAYMENT_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_PAYMENT_BUTTON_ID);

    }

    public function clickOlxGoldPayment()

    {
        $this->clickElement('css',PaymentPage::ELEMENT_PAYMENT_OLXGOLD_CSS);
        sleep(5);
    }

    public function clickCreditcardPayment()

    {
        $this->page()->find()->elementWithId(self::ELEMENT_PAYMENT_CCARD_ID)->click();
        $this->page()->wait(10);

    }

    public function clickPaypalPayment()

    {
        $this->page()->find()->elementWithCss(self::ELEMENT_PAYMENT_PAYPAL_CSS)->click();
        $this->page()->wait(10);

    }

    public function clickCreditcardPaypalPayment()

    {
        $this->page()->find()->elementWithCss(self::ELEMENT_PAYMENT_CCPAYPAL_CSS)->click();
        $this->page()->wait(10);

    }

    public function clickDebitcardPayment()

    {
        $this->page()->find()->elementWithId(self::ELEMENT_PAYMENT_DEBITCARD_ID)->click();
        $this->page()->wait(10);

    }

    public function clickGcashPayment()

    {
        $this->page()->find()->elementWithId(self::ELEMENT_PAYMENT_GCASH_ID)->click();
        $this->page()->wait(10);

    }

    public function clickBdoPayment()

    {
        $this->page()->find()->elementWithId(self::ELEMENT_PAYMENT_BDO_ID)->click();
        $this->page()->wait(10);

    }

    public function verifyBdoPaymentModal()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithId(self::ELEMENT_PAYMENT_BDOMODAL_ID);
    }


    public function clickCebuanaPayment()
    {
        $this->page()->find()->elementWithId(self::ELEMENT_PAYMENT_CEBUANA_ID)->click();
        $this->page()->wait(10);
    }

    public function verifyCebuanaPaymentModal()

    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithId(self::ELEMENT_PAYMENT_CEBUANAMODAL_ID);

    }

    public function clickLbcPayment()
    {
        $this->page()->find()->elementWithId(self::ELEMENT_PAYMENT_LBC_ID)->click();
        $this->page()->wait(10);
    }

    public function clickSevenelevenPayment()
    {
        $this->page()->find()->elementWithId(self::ELEMENT_PAYMENT_7ELEVEN_ID)->click();
        $this->page()->wait(10);
    }

    public function verifySevenelevenPaymentModal()

    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithId('seveneleven');

    }

    public function clickOtherPayment()
    {
        $this->page()->find()->elementWithId(self::ELEMENT_PAYMENT_OTHERPAYMENT_ID)->click();
        $this->page()->wait(10);
    }

}





