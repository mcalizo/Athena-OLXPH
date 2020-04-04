<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 22/09/2016
 * Time: 11:39 AM
 */

namespace Tests\Pages\Oneweb;

use Athena\Athena;


class Sinon
{
    private $uris = [
        "api_v1" => "/api/v1/",
        "desktop" => "/"
    ];

    private $base_uri = "/";

    public function __construct($module = "desktop") {
        if(isset($this->uris[$module])){
            $this->base_uri = $this->uris[$module];
        }
    }

    /*+ Creates a new anonymous user and returns it's data */
    public function createUserWithoutPassword() {
        return Athena::api()->post($this->base_uri . "trojan/createuserwithoutpassword/")
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson()["user"];
    }

    /** Creates a new registered user and returns it's credentials */
    public function createUserWithPassword() {
        return Athena::api()->post($this->base_uri . "trojan/createuserwithpassword/")
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson()["user"];
    }

    /** Creates a new phone-registered user and returns it's credentials */
    public function createUserWithSmspassword() {
        return Athena::api()->post($this->base_uri . "trojan/createuserwithsmspassword/")
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson()["user"];
    }

    /** Creates a new registered user used crm and returns it's credentials */
    public function createUserUsedCrm() {
        return Athena::api()->post($this->base_uri . "trojan/createuserusedcrm/")
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson()["user"];
    }

    /**
     * given a user id, it creates a session for that user and returns the user information and the session id.
     * If no user id is specified, a new registered user is created automatically.
     *
     * @return Session
     */
    public function createUserSession($userId = null){
        return $this->createUserSessionWithParameters(['userid' => $userId]);
    }

    public function createUserSessionForDevice($deviceToken, $userId = null) {
        return $this->createUserSessionWithParameters(['userid' => $userId, 'mobile' => 'i2', 'token' => $deviceToken]);
    }

    /**
     * @return Session
     */
    private function createUserSessionWithParameters(array $parameters)
    {
        $get = Athena::api()->post($this->base_uri . "trojan/loginasuser/");

        if (!empty($parameters)) {
            $get = $get->withParameters($parameters);
        }
        return $get->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson();
    }

    public function createUserWithOAuthToken()
    {
        return Athena::api()->get($this->base_uri . "trojan/createuserwithoauthcredentials/")
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson();
    }

    public function createUserUseCrmWithOAuthToke()
    {
        return Athena::api()->get($this->base_uri . "trojan/createuserusecrmwithoauthcredentials/")
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson();
    }


    public function getEmails(){
        return Athena::api()->get("mailcatch")
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson();
    }

    public function getSMS($mobile){
        $get = Athena::api()->get($this->base_uri . "trojan/getsms/");

        if (!empty($mobile)) {
            $get = $get->withParameters(['mobile' => $mobile]);
        }
        return $get->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson();
    }

    public function createActiveAd($user_id = null, $category_id = null) {
        $params= [];
        if ($user_id)
        {
            $params['user_id'] = $user_id;
        }
        if ($category_id)
        {
            $params['category'] = $category_id;
        }

        return $this->createAd($params);
    }

    public function acceptMessagesToAd($ad_id) {
        return Athena::api()->post($this->base_uri . "trojan/acceptmessagestoad/")
            ->withParameters(['ad_id' => $ad_id])
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson();
    }

    public function createAd($bind)
    {
        $post = Athena::api()->post($this->base_uri . "trojan/createactivead/");
        if(!empty($bind))
        {
            $post->withParameters($bind);
        }

        return $post->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson();
    }

    public function createConversationForUser($userId)
    {
        $bind = [
            'user_id' => $userId,
        ];
        $lastAddedMessageIds = Athena::api()->post($this->base_uri . "trojan/createconversationfromotheruser/")
            ->withParameters($bind)
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson();
        return !(empty($lastAddedMessageIds)) ? array_pop($lastAddedMessageIds) : null;
    }


    public function randomCity()
    {
        return Athena::api()->post($this->base_uri . "trojan/randomcity/")
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson()['city'];
    }

    public function randomCategoryParametersData()
    {
        return Athena::api()->get($this->base_uri . "trojan/randomcategorywithparameters/")
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson()['category'];
    }

    public function allCategories()
    {
        $base = $this->base_uri . "trojan/allcategories/";
        return Athena::api()->get($base)
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson();
    }

    /**
     * @return Category[]
     */
    public function allRootCategories()
    {
        $categories = $this->allCategories();
        return array_filter($categories, function ($category) {

            return $category['depth'] === 1;
        });
    }

    /**
     * @return Category
     */
    public function randomCategory()
    {
        $parents = [];
        $categories = $this->allCategories();
        $category = null;

        while(empty($parents))
        {
            $category = array_pop($categories);
            $parents = $category['parents'];
        }

        return $category;
    }

    public function allRegions()
    {
        return Athena::api()->get($this->base_uri . "trojan/allregions/")
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromString();
    }


    public function createPayment($bind)
    {
        if ($bind['type'] == 'otc') {
            return Athena::api()->get($this->base_uri . "trojan/createotcpayment/")
                ->then()
                ->assertThat()
                ->responseIsJson()
                ->retrieve()
                ->fromString();
        }
        return null;
    }

    public function randomDistrict()
    {
        return Athena::api()->get($this->base_uri . "trojan/randomdistrict/")
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson()['district'];
    }

    public function randomRegion()
    {
        return Athena::api()->get($this->base_uri . "trojan/randomregion/")
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson()['region'];
    }

    public function allCities()
    {
        return Athena::api()->get($this->base_uri . "trojan/allcities/")
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromString();
    }

    public function allDistricts()
    {
        return Athena::api()->get($this->base_uri . "trojan/alldistrict/")
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromString();
    }

    public function oAuthClientData()
    {
        return Athena::api()->get($this->base_uri . "trojan/oauthclient/")
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson()["client"];
    }

    public function createApiPartner()
    {
        return Athena::api()->get($this->base_uri . "trojan/createapipartner/")
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson()["apiPartner"];
    }

    public function addUserPoint($bind)
    {
        return Athena::api()->post($this->base_uri . "trojan/addpointforuser/")
            ->withParameters($bind)
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson();
    }

    public function setUserPointsToExpire($bind)
    {
        return Athena::api()->post($this->base_uri . "trojan/expiringpoint/")
            ->withParameters($bind)
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson();
    }

    public function getSmsToken($phone, $userid = 0)
    {
        $data['phone'] = $phone;
        if($userid > 0)
        {
            $data['user_id'] = $userid;
        }

        return Athena::api()->get($this->base_uri . "trojan/smstoken/?".  http_build_query($data))
            ->then()
            ->assertThat()
            ->responseIsJson()
            ->retrieve()
            ->fromJson();
    }

    /**
     * The algorithm is the same as in Atlas Devicetokens class.
     *
     * @return string
     */
    public static function generateDeviceToken() {
        $random48 = substr(sha1(rand(1, 999999999) . time() . rand(1, 999999999)) . md5(rand(1, 10000000)), 0, 48);
        return $random48 . substr(sha1($random48), 0, 2);
    }

    public static function generateEmail() {
        $uniqeText = substr(md5(microtime(true)), 0, 6);
        return $uniqeText . '@test-troyan.com';
    }

    public static function generatePassword($length = 8) {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }
}