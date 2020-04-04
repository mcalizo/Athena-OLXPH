<?php
/**
 * Created by PhpStorm.
 * User: ralph
 * Date: 1/26/17
 * Time: 10:01 AM
 */

namespace Tests\Pages\Oneweb;


class BoostScheduledRefresh extends OneWeb
{
    const ELEMENT_REFRESH_AD_EVERY_ID = 'interval';
    const ELEMENT_REFRESH_AD_DO_THIS_ID = 'frequency';

    const ELEMENT_SCHEDULE_REFRESH_TERMS_ID = 'agree';
    const ELEMENT_SCHEDULE_REFRESH_CONFIRM_CSS = 'div.feature button.submit';

    public function verifyBoostRefreshPageElements()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_REFRESH_AD_EVERY_ID );
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_REFRESH_AD_DO_THIS_ID );
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_SCHEDULE_REFRESH_TERMS_ID );
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_SCHEDULE_REFRESH_CONFIRM_CSS );

    }

    public function clickTermCondition()

    {
        $this->page()->find()->elementWithId(self::ELEMENT_SCHEDULE_REFRESH_TERMS_ID)->click();
        $this->page()->wait(10);
    }

    public function clickProceedPayments()

    {
        $this->page()->find()->elementWithCss(self::ELEMENT_SCHEDULE_REFRESH_CONFIRM_CSS)->click();
        $this->page()->wait(10);
    }








}