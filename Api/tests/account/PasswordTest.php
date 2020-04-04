<?php

/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 13/09/2017
 * Time: 11:28 AM
 */
namespace Tests\Api\tests\account;

use Athena\Test\AthenaAPITestCase;
use Tests\Api\pages\AccountPage;
use Tests\Api\src\JsonAssert;

class PasswordTest extends AthenaAPITestCase
{
    public function testAccountPassword_updatePasswordSuccess_checkResponseValues_httpReturn200()
    {
        // arrange
        $accPage = new AccountPage();
        $changePassword = $accPage->changePasswordAction(AccountPage::USER_PASSWORD, AccountPage::USER_PASSWORD);
        $this->assertEquals(200, $changePassword->getResponse()->getStatusCode());
        $this->assertTrue(is_array($changePassword->fromJson(true)));
        $this->assertArrayHasKey('status', $changePassword->fromJson(true));

        JsonAssert::from($changePassword->fromJson(true))
            ->assertJsonPathPresent("$.status.code")
            ->assertJsonPathPresent("$.status.message")

        ;
        JsonAssert::from($changePassword->fromJson(true))
            ->assertJsonPathEquals("$.status.code", 1)
            ->assertJsonPathEquals("$.status.message", "Success")
        ;

    }

    public function testAccountPassword_updatePasswordMisMatch_checkResponseValues_httpReturn400()
    {
        // arrange
        $accPage = new AccountPage();
        $changePassword = $accPage->changePasswordAction(AccountPage::USER_PASSWORD, AccountPage::USER_PASSWORD_MISMATCH);
        $this->assertEquals(400, $changePassword->getResponse()->getStatusCode());
        $this->assertTrue(is_array($changePassword->fromJson(true)));
        $this->assertArrayHasKey('error', $changePassword->fromJson(true));

        JsonAssert::from($changePassword->fromJson(true))
            ->assertJsonPathPresent("$.error.type")
            ->assertJsonPathPresent("$.error.message")
        ;
        JsonAssert::from($changePassword->fromJson(true))
            ->assertJsonPathEquals("$.error.type", AccountPage::BAD_REQUEST_ERROR_TYPE)
            ->assertJsonPathEquals("$.error.message", AccountPage::BAD_REQUEST_ERROR_MESSAGE )
        ;
    }

}