<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 03/10/2016
 * Time: 3:41 PM
 */

namespace Tests\Api\pages;

use Athena\Athena;
use GuzzleHttp\Exception\ClientException;
use Tests\Api\src\JsonAssert;
use OLX\FluentHttpClient\Response\ResponseFormatter;

class AccountPage extends BasePage
{
    CONST URI_PROFILE = '/api/open/account/profile/';
    CONST URI_CHANGE_PASSWORD = '/api/open/account/password/';
    CONST URI_CREATE_AD = '';
    CONST PROFILE_ID = '14407997';
    CONST ACCT_MOB_NUMBER = '09218943165';
    CONST USER_PASSWORD = '#1234qwer';
    CONST USER_PASSWORD_MISMATCH = '#1234qwerty';
    CONST BAD_REQUEST_ERROR_TYPE = 'BadRequestException';
    CONST BAD_REQUEST_ERROR_MESSAGE = 'There are errors in your request: Passwords are not equal';
    CONST ACCT_PROFILE_KEYS_AND_TYPES = [
        'id' => 'int',
        'email' => 'string',
        'created_at' => 'string',
        'last_login_at' => 'string',
        'default_phone' => 'string',
        'default_map_address' => 'string',
        'default_person' => 'string',
        'default_region_id' => 'string',
        'default_subregion_id' => 'string',
        'default_city_id' => 'string',
        'credits' => 'string',
        'credits_formatted' => 'string',
        'sms_phone' => 'string',
        'newsletter' => 'string',
        'email_msg_notif' => 'string',
        'email_alarms_notif' => 'string',
        'paying_user' => 'int',
        'rating' => 'array',
        'location' => 'string',
        'facebook_link' => 'string',
        //'followers' => 'int',
        //'following' => 'int',
        'online_status' => 'array',
        'registration_date_label' => 'string',
        'chatname' => 'string'
    ];

    private $accessToken;
    private $userAccessToken;
    private $settings;

    public function __construct()
    {
        //parent::__construct();
        $this->accessToken = $this->getOpenApiAccessToken();
        $this->userAccessToken = $this->getOpenApiUserAccessToken(static::ACCT_MOB_NUMBER, static::USER_PASSWORD);
        $this->settings = Athena::settings()->get('urls')->orFail();
        $this->settings = json_encode($this->settings);
        $this->settings = json_decode($this->settings);
    }

    /**
     * Retrieve current authorized user profile data.
     *
     * @return ResponseFormatter
     * @throws ClientException
     */
    public function getProfile($profileId = '')
    {

        $profileData = Athena::api()
            ->get($this->settings->home . static::URI_PROFILE . $profileId)
            ->withQueryParameter('access_token', $this->accessToken)
            ->then()
            ->retrieve();


//        JsonAssert::from(
//            Athena::api()
//                ->get($this->settings->home . static::URI_PROFILE . $profileId)
//                ->then()
//                ->assertThat()
//                ->statusCodeIs(500)
//                ->responseIsJson()
//                ->retrieve()
//                ->fromJson())
//            ->assertJsonPathEquals("$.error.status", 500)
//            ->assertJsonPathPresent("$.error.title");

        return $profileData;
    }

    /**
     * Change user password.
     *
     * @param string $oldPassword Old password
     * @param string $newPassword New password
     *
     * @return ResponseFormatter
     * @throws ClientException
     */

    public function changePasswordAction($oldPassword = '', $newPassword = '')
    {
        $parameter = [
            'password' => $oldPassword,
            'password2' => $newPassword

        ];

        $data = Athena::api()
            ->post($this->settings->home . static::URI_CHANGE_PASSWORD)
            ->withQueryParameter('access_token', $this->userAccessToken)
            ->withBody($parameter, '')
            ->then()
            ->retrieve();

        return $data;

    }


    public function setAccessToken($token = '')
    {
        if(!empty($token))
        {
            $this->accessToken = $token;
        }
    }
}