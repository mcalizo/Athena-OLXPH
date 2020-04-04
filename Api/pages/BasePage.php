<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 9/28/16
 * Time: 3:54 PM
 */

namespace Tests\Api\pages;

use Athena\Athena;
use Athena\Test\AthenaAPITestCase;


class BasePage extends AthenaAPITestCase
{

    //private $module = "api_v1";
    private $accessToken;
    private $user;
    private $oauthData;
    private $apiClient;

    const ACCESS_TOKEN = '';

    public function __construct() {
        parent::__construct();

    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function getUserData()
    {
        return $this->user;
    }

    public function getOauthData()
    {
        return $this->oauthData;
    }

    public function getModule()
    {
        //return $this->module;
    }

    public function getOpenApiAccessToken()
    {
        $data = [
            'client_id' => 9,
            'client_secret' => 'PhTbP3wTEP3MaHRsJZir',
            'grant_type' => 'partner',
            'partner_code' => 'qa_auto',
            'partner_secret' => 'PhTbP3wTEP3MaHRsJZir'
        ];

        $urls = Athena::settings()->get('urls')->orFail();
        $urls = json_encode($urls);
        $urls = json_decode($urls);


        $json = Athena::api()->post($urls->home . "/api/open/oauth/token")
            ->withBody($data,'application/json')
            ->then()
            ->retrieve();

        $data = json_decode($json);

        //print_r($data); exit;

        return $data->access_token;
    }

    public function getOpenApiUserAccessToken($username, $password)
    {
        $data = [
            'client_id' => 10,
            'client_secret' => 'a45hDsaAd2j1DN0',
            'grant_type' => 'password',
            'username' => $username,
            'password' => $password
        ];

        $urls = Athena::settings()->get('urls')->orFail();
        $urls = json_encode($urls);
        $urls = json_decode($urls);


        $json = Athena::api()->post($urls->home . "/api/open/oauth/token")
            ->withBody($data,'application/json')
            ->then()
            ->retrieve();

        $data = json_decode($json);

        //print_r($data); exit;

        return $data->access_token;
    }

    public function assertArrayHasKeysWithCorrectTypes($checkArray, $array)
    {
        foreach ($checkArray as $key => $type) {
                $this->assertArrayHasKey($key, $array);
                $function = 'is_' . $type;
                $this->assertTrue($function($array[$key]) || is_null($array[$key]));
        }
    }
}