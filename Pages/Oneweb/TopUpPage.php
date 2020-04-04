<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 06/12/2016
 * Time: 6:27 PM
 */

namespace Tests\Pages\Oneweb;

class TopUpPage extends OneWeb
{
    const ELEMENT_TOPUP_AMOUNT_ID = 'amount';
    const ELEMENT_TOPUP_NAME_ID = 'default_person';
    const ELEMENT_TOPUP_ADDRESS_NAME = 'default_map_address';
    const ELEMENT_TOPUP_TERMS_ID = 'agree';
    const ELEMENT_TOPUP_SUBMIT_ID  = 'pay';


    public function verifyTopupPageElements()

        {
            $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_TOPUP_AMOUNT_ID );
            $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_TOPUP_NAME_ID);
            $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_TOPUP_ADDRESS_NAME);
            $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_TOPUP_TERMS_ID);
            $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_TOPUP_SUBMIT_ID);

        }

    public function enterOlxGoldCredits ($amount = '')
    {
        $this->page()->find()->elementWithId(self::ELEMENT_TOPUP_AMOUNT_ID)->sendKeys($amount);
    }


    public function enterSellerName ($seller = '')

    {
        $this->page()->find()->elementWithId(self::ELEMENT_TOPUP_NAME_ID)->sendKeys($seller);

    }
    
    public function clickTerms()
        
    {
        $this->page()->find()->elementWithId(self::ELEMENT_TOPUP_TERMS_ID)->click();
        $this->page()->wait(10);
    }
    
    
    public function clickProceedPayments ()
        
    {
        $this->page()->find()->elementWithId(self::ELEMENT_TOPUP_SUBMIT_ID)->click();
        $this->page()->wait(10);
    }

}