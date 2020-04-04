<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 07/11/2016
 * Time: 3:19 PM
 */

namespace Tests\Pages\Oneweb;
set_time_limit(0);
use Athena\Athena;

class RegisterPage extends OneWeb
{
    const ELEMENT_REGISTRATION_INPUTNAME_NAME = 'name';
    const ELEMENT_REGISTRATION_INPUTMOBILE_NAME = 'mobile';
    const ELEMENT_REGISTRATION_INPUTEMAIL_NAME = 'email';
    const ELEMENT_REGISTRATION_CHKBOXNEWLETTER_NAME = 'newsletter';
    const ELEMENT_REGISTRATION_ACCEPTTERMS_ID = 'acceptTerms';
    const ELEMENT_REGISTRATION_REG_BUTTON_ID = 'register_button';
    const ELEMENT_REGISTRATION_WARNING_CSS = 'div.callout.warning';
    const ELEMENT_REGISTRATION_PASSWORD_NAME = 'password';
    const ELEMENT_REGISTRATION_PASSWORD2_NAME = 'password2';
    const TEXT_PASSWORD = '#1234qwer';
    const TEXT_PASSWORD2 = '#1234qwer2';


//    public function __construct()
//    {
//        //parent::__construct(Athena::browser(), '/');
//    }

    public function acceptTerms ()
    {
        $this->clickElement('id',self::ELEMENT_REGISTRATION_ACCEPTTERMS_ID);
    }

    public function enterRegisteredMobile ()
    {
        $this->enterString('name', self::ELEMENT_REGISTRATION_INPUTMOBILE_NAME,Athena::settings()->get('verified-phone')->orFail());
    }

    public function enterName ()
    {
        $this->enterString('name', self::ELEMENT_REGISTRATION_INPUTNAME_NAME, $this->mobile = Athena::settings()->get('name')->orFail());
    }

    public function enterNotRegisterValidMobileNumber()
    {
        //create sinon here (staging only)
    }

    public function verifyRegisteredAccountNotCreatedWarningMessage()
    {
        $string = $this->getText(self::ELEMENT_REGISTRATION_WARNING_CSS);

        return $string;
    }

    public function verifyInvalidMobileNotCreated()
    {
        return $this->page()->findAndAssertThat()->doesNotExist()->elementWithCss(self::ELEMENT_REGISTRATION_WARNING_CSS);
    }

    public function enterInvalidMobileNumber()
    {
        $this->enterString('name', self::ELEMENT_REGISTRATION_INPUTMOBILE_NAME, '+639172290010-');
    }

    public function clickLoginButtonHeader ()
    {
        $this->clickElement('id', HomePage::ELEMENT_LOGIN_BUTTON_ID);
    }




}