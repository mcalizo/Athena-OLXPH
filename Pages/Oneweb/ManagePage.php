<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 14/11/2016
 * Time: 7:22 PM
 */

namespace Tests\Pages\Oneweb;

use Athena\Athena;

class ManagePage extends OneWeb
{

    const ELEMENT_USERNAME_CSS = 'span.username';
    const ELEMENT_CHATS_MESSAGE_SEARCH_CSS = 'input#messageSearch';
    const ELEMENT_MANAGEANDS_PAYMENTS_CSS = 'div.navigation>ul.menu li a[href="/payments"]';
    const ELEMENT_MANAGE_OLXGOLD_CSS = 'div.row ul.menu li a[href="/topup"]';
    const ELEMENT_MANAGE_REFRESH_CSS = 'div.row span.set button.button.small.refresh';
    const ELEMENT_MANAGE_REFRESH_MODAL_CSS = 'div.modals div.actions.reveal.refresh';
    const ELEMENT_MANAGE_REFRESH_NOW_CSS = 'div.modals div.actions.reveal.refresh form a.success';
    const ELEMENT_MANAGE_ELLIPSIS_BUTTON_CSS = 'div.row span.set button.small.options';
    const ELEMENT_MANAGE_ELLIPSIS_REFRESH_CSS = 'a.button.refresh.action.tracking ';
    const ELEMENT_MANAGE_ELLIPSIS_MODAL_CSS = 'div#boostModal.actions.reveal.boost';
    const ELEMENT_MANAGE_SCHEDULED_REFRESH_ID = 'scheduledRefresh';
    const ELEMENT_MANAGE_BOOST_BUTTON_CSS = 'a.button.boost.action.tracking';
    const ELEMENT_MANAGE_BOOST_MODAL_ID = 'boostModal';
    const ELEMENT_MANAGE_BOOST_ELLIPSIS_PACKAGE_CSS = 'div.reveal.boost ul li a.action.package.tracking';
    const ELEMENT_AD_CONTAINER_CSS = 'div.listing div.container div.item.deletable';
    const ELEMENT_ELLIPSIS_MODAL_BTN_DELETE_CSS = 'ul.menu.expanded.subactions a.delete';
    const ELEMENT_ELLIPSIS_MODAL_NOTIF_CONFIRMATION_CSS = 'div#deleteModal h2';
    const ELEMENT_DELETE_BTN_CONFIRM_CSS = 'a#deleteBtn.button.go';
    const ELEMENT_CONFIRM_DELETE_MODAL_NOTIF_CSS = 'div#confirmDeleteModal h2';
    const ELEMENT_PERMANENT_DELETE_MODAL_CLOSE_BUTTON_CSS = 'div#confirmDeleteModal button.close-button span';
    const ELEMENT_AD_STATUS_LIST_PENDING_CSS = 'ul#statusList a[href="/ad/manage/pending"]';
    const ELEMENT_AD_STATUS_LIST_MODERATED_CSS = 'ul#statusList a[href="/ad/manage/moderated"]';
    const ELEMENT_AD_STATUS_LIST_ARCHIVE_CSS = 'ul#statusList a[href="/ad/manage/archive"]';
    const ELEMENT_AD_STATUS_LIST_ACTIVE_CSS = 'ul#statusList a[href="/ad/manage"]';

    const STRING_ELLIPSIS_DELETE_CONFIRMATION_MSGS = 'Delete this ad permanently?';
    const STRING_AD_PERMANENTLY_DELETED_MSGS = 'Ad has been permanently deleted';
    const ELEMENT_MANAGE_DROPDOWN_OPTION_CSS = 'div.listing>div:nth-child(1).container>div.item>div.actions>span.set select.options';
    const ELEMENT_MANAGE_OPTION_REFRESH_MODAL_ID = 'refreshModal';


    public function verifyMessagesElements()
    {

        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_CHATS_MESSAGE_SEARCH_CSS);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_USERNAME_CSS);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_MANAGEANDS_PAYMENTS_CSS);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_MANAGE_OLXGOLD_CSS);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_MANAGE_OLXGOLD_CSS);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_MANAGE_REFRESH_MODAL_CSS);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_MANAGE_REFRESH_NOW_CSS);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_MANAGE_ELLIPSIS_BUTTON_CSS);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(self::ELEMENT_MANAGE_ELLIPSIS_REFRESH_CSS);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_MANAGE_SCHEDULED_REFRESH_ID);

    }


    public function clickUserProfileButton()

    {
        $this->clickElement('Css',HomePage::ELEMENT_USER_LOGGEDIN_ICON_CSS);
    }

    public function clickPaymentButton()

    {
       $this->clickElement('css',ManagePage::ELEMENT_MANAGEANDS_PAYMENTS_CSS);
    }
    
   public function ClickBuyOLXGoldCreditsButton()
    {
       $this->clickElement('css',ManagePage::ELEMENT_MANAGE_OLXGOLD_CSS);
    }

    public function clickRefreshButton()

    {
        $this->clickElement('css',ManagePage::ELEMENT_MANAGE_REFRESH_CSS);
    }
    //public function click

    public function verifyRefreshModal()
        
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithId(self::ELEMENT_MANAGE_OPTION_REFRESH_MODAL_ID);
    }

    public function clickRefreshNow()
    {
        $this->clickElement('css',ManagePage::ELEMENT_MANAGE_REFRESH_NOW_CSS);
    }

    public function verifyEllipsisModal()

    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithId(self::ELEMENT_MANAGE_BOOST_MODAL_ID);
    }

    public function clickEllipsisButton()
    {
        $this->clickElement('css',ManagePage::ELEMENT_MANAGE_ELLIPSIS_BUTTON_CSS);
    }

    public function clickEllipsisRefresh()

    {
        $this->clickElement('css',ManagePage::ELEMENT_MANAGE_ELLIPSIS_REFRESH_CSS);
    }

    public function clickScheduledRefresh()

    {
        $this->clickElement('id',ManagePage::ELEMENT_MANAGE_SCHEDULED_REFRESH_ID);
    }

    public function loginAndOpenManagePage() {
        $this->openPage('login');
        //$this->getBrowser()->get('login');
        $login = new LoginPage();
        $login->loginToUserAccount(Athena::settings()->get('email')->orFail(),Athena::settings()->get('password')->orFail());
        $this->getBrowser()->get('manage');

    }

    public function verifyBoostAdModal()
    {
        sleep(5);
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithId(self::ELEMENT_MANAGE_BOOST_MODAL_ID);
    }

    public function clickEllipsisBoostButton()
    {
        $this->clickElement('css',ManagePage::ELEMENT_MANAGE_BOOST_ELLIPSIS_PACKAGE_CSS);
    }

    public function clickEllipsisAdboostButton()
    {
        $this->clickElement('css',ManagePage::ELEMENT_MANAGE_BOOST_BUTTON_CSS);
    }

    /**
     * Method to click previously posted ad
     */
    public function clickEllipsisOfPreviousAdPostWithCountChecking(){
        $counter = 0;
        while (count($this->page()->find()->elementsWithCss(self::ELEMENT_AD_CONTAINER_CSS)) < 2) {
            var_dump(count($this->page()->find()->elementsWithCss(self::ELEMENT_AD_CONTAINER_CSS)));
            $this->refresh();
            sleep(5);
            $counter++;
            var_dump($counter);
            if ($counter == 30) {
                \PHPUnit_Framework_Assert::assertEquals(
                    "Previously posted ad should be displayed in moderated ad" ,
                    "Previously posted ad not displayed in moderated tab in given time",
                    "Previously posted ad not displayed.");
            }
        }
        $this->clickElement('css', self::ELEMENT_MANAGE_ELLIPSIS_BUTTON_CSS);
        sleep(3);
    }

    /**
     * Count active ads
     */
    public function countActiveAdInAdManagement(){
        return count($this->page()->find()->elementsWithCss(self::ELEMENT_AD_CONTAINER_CSS));
    }

    /**
     * Method to click previously posted ad
     */
    public function selectOptionOfPreviousAdPostWithCountChecking($option = ''){
        $counter = 0;
        while (count($this->page()->find()->elementsWithCss(self::ELEMENT_AD_CONTAINER_CSS)) < 2) {
            var_dump(count($this->page()->find()->elementsWithCss(self::ELEMENT_AD_CONTAINER_CSS)));
            $this->refresh();
            sleep(5);
            $counter++;
            var_dump($counter);
            if ($counter == 30) {
                \PHPUnit_Framework_Assert::assertEquals(
                    "Previously posted ad should be displayed in moderated ad" ,
                    "Previously posted ad not displayed in moderated tab in given time",
                    "Previously posted ad not displayed.");
                break;
            }
        }
        $this->selectInDropDownValue('css', self::ELEMENT_MANAGE_DROPDOWN_OPTION_CSS, $option);
        sleep(3);
    }
}