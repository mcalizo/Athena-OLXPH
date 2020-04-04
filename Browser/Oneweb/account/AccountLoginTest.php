<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 27/09/2016
 * Time: 3:13 PM
 */

namespace Tests\Browser\Tests\desktop;

use Athena\Athena;
use Athena\Test\AthenaBrowserTestCase;
use Tests\Pages\Oneweb\HomePage;
use Tests\Pages\Oneweb\ResultsPage;
use Tests\Pages\Oneweb\DetailsPage;
use Tests\Pages\Oneweb\Sinon;

class AccountLoginTest extends AthenaBrowserTestCase
{

//    public function __construct()
//    {
//        parent::__construct(Athena::browser(), '/');
//    }

    public function testHomepage_shouldLoad()
    {
        $I = new HomePage();
        $I->openPage('/');
        $I->didLoad();

        /*$dummyUser = new Sinon();
        $userDetails = $dummyUser->createUserWithPassword();
        var_dump($userDetails);exit;*/
    }

    public function testAccountLoginValid()
    {
        Athena::settings()->getAll();
        $account = new Sinon();
        $account = $account->createUserWithPassword();
        echo "<pre>";
        print_r($account);
    }

}