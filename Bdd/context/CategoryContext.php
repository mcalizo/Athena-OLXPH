<?php
/**
 * Created by PhpStorm.
 * User: ralph
 * Date: 5/8/17
 * Time: 2:11 PM
 */
namespace Tests\Bdd\context;

use Athena\Athena;
use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\Pages\Oneweb\HomePage;
use Tests\Pages\Oneweb\ResultsPage;
use Tests\Pages\Oneweb\OneWeb;
use Tests\Pages\Oneweb\CategoryPage;
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 29/09/2016
 * Time: 12:06 PM
 */
class CategoryContext extends AthenaTestContext
{
    /**
     * @var HomePage
     */
    private $homepage;
    private $listingpage;
    private $categoryPage;
    private $oneweb;


    public function __construct()
    {
        $this->homepage = new HomePage();
        $this->listingpage = new ResultsPage();
        $this->categoryPage = new CategoryPage();
        $this->oneweb = new OneWeb();
    }

    /**
     * @Given /^The URL link in listing page should has (.*)$/
     */
    public function theURLLinkInListingPageShouldHas($categoryLink)
    {
        $url = Athena::settings()->get('urls')->orFail();
        \PHPUnit_Framework_Assert::assertContains($categoryLink,$this->categoryPage->getBrowser()->getCurrentURL());
    }

    /**
     * @Given /^I click Choose other category link$/
     */
    public function iClickChooseOtherCategoryLink()
    {
        $this->categoryPage->clickOtherCategory();
    }

    /**
     * @Then /^I should see a modal that contains categories$/
     */
    public function iShouldSeeAModalThatContainsCategories()
    {
        $this->categoryPage->verifyCategoryModal();
    }

    /**
     * @Given /^I click category (.*) in Modal$/
     */
    public function iClickCategoryInModal($categoryName)
    {
        $this->categoryPage->clickCategory_byVisibleText_in_categoryModal($categoryName);
    }

    /**
     * @Given /^I click subcategory (.*) in Modal page$/
     */
    public function iClickSubcategoryInModalPage($subCategory)
    {

        $this->categoryPage->clickCategory_byVisibleText_in_categoryModal($subCategory);

    }

    /**
     * @Given /^I click another subcategory (.*) in Modal page$/
     */
    public function iClickAnotherSubcategoryInModalPage($subCategory2)
    {
        $this->categoryPage->clickCategory_byVisibleText_in_categoryModal($subCategory2);
    }

}