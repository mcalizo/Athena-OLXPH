<?php

/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 03/10/2016
 * Time: 3:43 PM
 */

namespace Tests\Api\tests\account;

use Athena\Test\AthenaAPITestCase;
use Tests\Api\pages\AccountPage;

class ProfileTest extends AthenaAPITestCase
{

    public function testAccountProfile_validAndHasKeysWithCorrectTypes_ReturnHttpCode200()
    {

        // arrange
        $accPage = new AccountPage();

        //act
        $profileJson = $accPage->getProfile(AccountPage::PROFILE_ID);

        // assert
        $this->assertAttributeEquals(AccountPage::PROFILE_ID, 'id', $profileJson->fromJson(false));
        $this->assertEquals(200, $profileJson->getResponse()->getStatusCode());
        $this->assertTrue(is_array($profileJson->fromJson(true)));
        $this->assertArrayHasKey('email', $profileJson->fromJson(true));
        $accPage->assertArrayHasKeysWithCorrectTypes(AccountPage::ACCT_PROFILE_KEYS_AND_TYPES, $profileJson->fromJson(true));
    }

    /**
     * @expectedExceptionCode 401
     */
    public function testAccountProfile_UserIsNotLoggedAndDataIsCorrect_ReturnHttpCode401()
    {
        // act
        $page = new AccountPage();
        $page->getProfile(null);

    }

}