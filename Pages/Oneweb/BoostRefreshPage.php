<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 06/12/2016
 * Time: 6:28 PM
 */

namespace Tests\Pages\Oneweb;


class BoostRefreshPage extends OneWeb
{
    const ELEMENT_CONFIRM_REFRESH_TERMS_ID = 'agree';
    const ELEMENT_CONFIRM_REFRESH_CONFIRM_CSS = 'div.feature button.submit';
    const STRING_BOOST_REFRESH_URL = '/boost/refresh/';

    public function verifyBoostRefreshPageElements()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_CONFIRM_REFRESH_TERMS_ID );
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_CONFIRM_REFRESH_CONFIRM_CSS );

    }

    public function clickTermCondition()

    {
        $this->page()->find()->elementWithId(self::ELEMENT_CONFIRM_REFRESH_TERMS_ID)->click();
        $this->page()->wait(10);
    }

    public function clickProceedPayments()
        
    {
        $this->page()->find()->elementWithCss(self::ELEMENT_CONFIRM_REFRESH_CONFIRM_CSS)->click();
        $this->page()->wait(10);
    }


}