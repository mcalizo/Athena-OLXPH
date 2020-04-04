<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 06/12/2016
 * Time: 6:28 PM
 */

namespace Tests\Pages\Oneweb;


class BoostPage extends OneWeb
{
    const ELEMENT_AD_CONFIRM_CSS = 'div.off-canvas-wrapper div.feature';
    const ELEMENT_CLICK_BASIC_PACKAGE_CSS = 'div.package.basic div.select button.button.tracking';
    const ELEMENT_CLICK_STARTER_PACKAGE_CSS = 'div.package.starter div.select button.button.tracking';
    const ELEMENT_CLICK_PREMIUM_PACKAGE_CSS = 'div.package.advance div.select button.button.tracking';
    const ELEMENT_CLICK_VIP_PACKAGE_CSS = 'div.package.premium div.select button.button.tracking';
    const ELEMENT_SUMMARY_PACKAGE_ID = 'package-name';
    const ELEMENT_SUMMARY_PACKAGE_NAME_CSS = 'table.pricing>tbody>tr:nth-child(1)>td:nth-child(1)';
    const ELEMENT_AGREE_ID = 'agree';
    const ELEMENT_PROCEED_BUTTON_CSS = 'button.proceed.tracking';
    const ELEMENT_PRICING_CSS = 'strong.stat';
    const ELEMENT_PAYMENT_OPTION_CSS = 'ul.payment-list';
    const ELEMENT_CONFIRM_PACKAGE_NAME_CSS = 'table.pricing tbody tr td.key';
    const ELEMENT_CLICK_OLX_GOLD_ID = 'og';


    public function verifyConfirmBoostAd()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_AD_CONFIRM_CSS);
    }

    public function clickBasicButton()
    {
        $this->clickElement('css',BoostPage::ELEMENT_CLICK_BASIC_PACKAGE_CSS);
    }

    public function verifyBasicPackageName()
    {
        \PHPUnit_Framework_Assert::assertEquals("Basic", $this->getElementText('id',self::ELEMENT_SUMMARY_PACKAGE_ID));
    }

    public function verifyPackagePrice()
    {
        \PHPUnit_Framework_Assert::assertNotEquals("0", $this->getElementText('id',self::ELEMENT_SUMMARY_PACKAGE_ID));
    }

    public function clickAgree()
    {
        $this->clickElement('css',self::ELEMENT_AGREE_ID);
    }

    public function clickProceedButton()
    {
        $this->clickElement('css',self::ELEMENT_PROCEED_BUTTON_CSS);
        sleep(10);
    }

    public function verifyPackagePricing($price)
    {
        \PHPUnit_Framework_Assert::assertEquals($price, trim(substr($this->getElementText('css',self::ELEMENT_PRICING_CSS,1))));

    }
    public function verifyPaymentOptionField()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementsWithCss(self::ELEMENT_PAYMENT_OPTION_CSS);
    }

    public function verifyBasicPackage()
    {
        \PHPUnit_Framework_Assert::assertEquals("Basic", $this->getElementText('id',self::ELEMENT_SUMMARY_PACKAGE_ID));
    }

    public function clickOGButton()
    {
        $this->clickElement('id',BoostPage::ELEMENT_CLICK_OLX_GOLD_ID);
    }
}