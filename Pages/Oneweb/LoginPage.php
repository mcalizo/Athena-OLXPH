<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 21/09/2016
 * Time: 6:39 PM
 */

namespace Tests\Pages\Oneweb;

use Athena\Athena;


class LoginPage extends OneWeb
{

    const ACCT_LOGIN_VIA_FACEBOOK_ID = 'fb_login';
    const ACCT_LOGIN_VIA_GOOGLE_ID = 'gplus';
    const ACCT_LOGIN_VIA_GOOGLE_CSS = 'button#gplus';
    const ACCT_LOGIN_MOB_EMAIL_INPUT_NAME = 'mobile';
    const ACCT_LOGIN_PASSWORD_INPUT_NAME = 'password';
    const ACCT_LOGIN_FORGOT_PASS_ID = 'forgotPwd';
    const ACCT_LOGIN_BUTTON_ID = 'login_button';

    const ELEMENT_REG_TEXT_LINK_CSS = 'a#register_link';
    const ELEMENT_REG_TEXT_LINK_ID = 'register_link';
    const ELEMENT_LOGIN_ERROR_MODAL_ID = 'loginErrorModal';
    const ELEMENT_LOGIN_ERROR_MSG_CSS = 'div.error-message';

    const FB_ELEMENT_EMAIL_ID = 'email';
    const FB_ELEMENT_PWD_ID = 'pass';
    const FB_ELEMENT_LOGIN_ID = 'loginbutton';

    const GOOGLE_ELEMENT_EMAIL_INPUT_ID = 'Email';
    const GOOGLE_ELEMENT_NEXT_BTN_ID = 'next';
    const GOOGLE_ELEMENT_PWD_INPUT_ID = 'Passwd';
    const GOOGLE_ELEMENT_SIGNIN_BTN_ID = 'signIn';

    const ELEMENT_LOGIN_MODAL_ID = 'loginContact';

    const TEXT_INVALID_MESSAGING_USERNAME_PWD = 'Invalid mobile number, email address or password.';


//    public function __construct()
//    {
//        parent::__construct(Athena::browser(), '/');
//    }

    /*
     * Method to validate account login elements
     */
    public function verifyAcctLoginElements()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementsWithId(LoginPage::ACCT_LOGIN_VIA_FACEBOOK_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementsWithId(LoginPage::ACCT_LOGIN_VIA_GOOGLE_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementsWithName(LoginPage::ACCT_LOGIN_MOB_EMAIL_INPUT_NAME);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementsWithName(LoginPage::ACCT_LOGIN_PASSWORD_INPUT_NAME);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementsWithId(LoginPage::ACCT_LOGIN_FORGOT_PASS_ID);
        //$this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_LOGIN_MODAL_ID);
    }

    public function verifySellerFormElements()
    {
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(AdPostPage::ACCT_SELL_FORM_UPLOAD_PHOTOS_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(AdPostPage::ACCT_SELL_FORM_TITLE_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(AdPostPage::ACCT_SELL_FORM_CATE_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(AdPostPage::ACCT_SELL_FORM_DESC_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(AdPostPage::ACCT_SELL_FORM_LOC_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(AdPostPage::ACCT_SELL_FORM_LOC_BUTTON_ID);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(AdPostPage::ACCT_SELL_FORM_SELLER_DTLS_CSS);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(AdPostPage::ACCT_SELL_FORM_BUTTON_SELL_CSS);
    }

    /**
     * Method to create user with password using sinon trojan
     * @return array
     */
    public function createUserWithPwd()
    {
        $account = new Sinon();
        return $account->createUserWithPassword();
    }

    /*
     * method input email
     */
    public function enterEmailAddress($email)
    {
        #$this->page()->find()->elementWithName(self::ACCT_LOGIN_MOB_EMAIL_INPUT_NAME)->sendKeys($email);
        sleep(2);
        $this->page()->wait(5)->elementWithName(self::ACCT_LOGIN_MOB_EMAIL_INPUT_NAME)->sendKeys($email);
    }

    /**
     * method to enter password
     */
    public function enterUserPassword($password)
    {
        $this->page()->find()->elementWithName(self::ACCT_LOGIN_PASSWORD_INPUT_NAME)->sendKeys($password);
    }

    public function clickLoginButton(){
        sleep(3);
        $this->page()->find()->elementWithId(self::ACCT_LOGIN_BUTTON_ID)->click();
        sleep(3);
    }

    /*
     * get current url
     */
    public function getAccountLogin_url()
    {
        return $this->getBrowser()->getCurrentURL();
    }

    public function loginToUserAccount ($email,$password) {
        $this->enterEmailAddress($email);
        $this->enterUserPassword($password);
        $this->clickLoginButton();
    }

    public function verifySuccessfulUserLogin()
    {
        sleep(5);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(HomePage::ELEMENT_USER_LOGGEDIN_CHAT_CSS);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(HomePage::ELEMENT_USER_LOGGEDIN_ICON_CSS);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(HomePage::ELEMENT_USER_LOGGEDIN_INITIALS_CSS);
        //$this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithCss(HomePage::ELEMENT_USER_LOGGEDIN_LOGOUT_CSS);
    }

    public function verifyErrorModalDisplayed()
    {
        sleep(3);
        $this->page()->findAndAssertThat()->existsOnlyOnce()->elementWithId(self::ELEMENT_LOGIN_ERROR_MODAL_ID);
    }

    public function verifyErrorMessageDisplayed()
    {
        return $this->getText(self::ELEMENT_LOGIN_ERROR_MSG_CSS);
    }

    public function fbPageAccoutLoginEnterEmail()
    {
        $this->enterString('id', self::FB_ELEMENT_EMAIL_ID, Athena::settings()->get('email')->orFail());
    }

    public function fbPageAccountLoginEnterPwd()
    {
        $this->enterString('id', self::FB_ELEMENT_PWD_ID, Athena::settings()->get('password')->orFail());
    }

    public function fbPageAccountClickLoginButton()
    {
        $this->clickElement('id', self::FB_ELEMENT_LOGIN_ID);
    }

    public function googlePageAccoutLoginEnterEmail()
    {
        $this->enterString('id', self::GOOGLE_ELEMENT_EMAIL_INPUT_ID, Athena::settings()->get('email')->orFail());
    }

    public function googlePageAccountLoginEnterPwd()
    {
        $this->enterString('id', self::GOOGLE_ELEMENT_PWD_INPUT_ID, Athena::settings()->get('password')->orFail());
    }

    public function googlePageAccountClickLoginButton()
    {
        $this->clickElement('id', self::GOOGLE_ELEMENT_SIGNIN_BTN_ID);
        sleep(5);
    }

    public function waitForElementPresent()
    {
        $this->page()->wait(10)->untilVisibilityOf()->elementWithCss(self::ACCT_LOGIN_VIA_GOOGLE_CSS);
    }

    public function focusNewWindowPopUp()
    {
        $this->openLastWindow();
        sleep(3);


    }

    public function googleClickNextButtonLogin()
    {
        $this->clickElement('id', self::GOOGLE_ELEMENT_NEXT_BTN_ID);
        sleep(5);
    }

    public function focusOnMainWindow()
    {
        $windows = $this->getBrowser()->getWindowHandles();
        $this->getBrowser()->switchTo()->window(end($windows));
    }




}