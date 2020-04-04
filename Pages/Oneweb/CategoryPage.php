<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 01/10/2016
 * Time: 11:56 AM
 */

namespace Tests\Pages\Oneweb;


class CategoryPage extends OneWeb
{
  /*  const ELEMENT_CATEGORY_MOBILE_PHONES_AND_TABLETS_ID = 'category-1';
    const ELEMENT_CATEGORY_MOBILE_PHONES_SMARTPHONES_ID = 'category-2';
    const ELEMENT_CATEGORY_COMPUTERS_ID = 'Computers';
    const ELEMENT_CATEGORY_CONSUMER_ELECTRONICS_ID = 'Consumer Electronics';
    const ELEMENT_CATEGORY_PETS_AND_ANIMALS_ID = 'Pets and Animals';
    const ELEMENT_CATEGORY_HOME_AND_FURNITURE_ID = 'Home and Furniture';
    const ELEMENT_CATEGORY_BEAUTY_HEALTH_AND_GROCERY_ID = 'Beauty, Health, and Grocery';
    const ELEMENT_CATEGORY_CLOTHING_AND_ACCESSORIES_ID = 'Clothing and Accessories';
    const ELEMENT_CATEGORY_BOOKS_SPORTS_AND_HOBBIES_ID = 'Books, Sports and Hobbies';
    const ELEMENT_CATEGORY_BABY_STUFF_AND_TOYS_ID = 'Baby Stuff and Toys';
    const ELEMENT_CATEGORY_REAL_ESTATE_ID = 'Real Estate';
    const ELEMENT_CATEGORY_CARS_AND_AUTOMOTIVES_ID = 'Cars and Automotives';
    const ELEMENT_CATEGORY_SERVICES_ID = 'Services';
    const ELEMENT_CATEGORY_JOBS_ID = 'Jobs';
    const ELEMENT_CATEGORY_BUSINESS_AND_EARNING_OPPORTUNITIES_ID = 'Business and Earning Opportunities';
    const ELEMENT_CATEGORY_MOTORCYCLES_ID = 'Motorcycles and Scooters';
   */
    const ELEMENT_CATEGORY_OPTION_CSS = 'div.off-canvas-content div.show-for-xlarge div.categories a.aux.filter-link.categoryFilter';
    const ELEMENT_CATEGORY_MODAL_ID = 'categoryModal';
    const ELEMENT_CATEGORY_TEXT_CSS = 'span.category-title';
    


    public function clickOtherCategory()
    {
        $this->page()->find()->elementWithCss(self::ELEMENT_CATEGORY_OPTION_CSS)->click();
        $this->page()->wait(10);
        
    }

    public function verifyCategoryModal()
    {
        $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementWithId(self::ELEMENT_CATEGORY_MODAL_ID);
    }

    public function clickCategory_byVisibleText_in_categoryModal($categoryName)
    {
        $categories = $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithCss(self::ELEMENT_CATEGORY_TEXT_CSS);
        foreach ($categories as $data)
        {
            $objectData = $data->getText();
            //var_dump($objectData);

            if ((strtoupper(trim($objectData)) == strtoupper(trim($categoryName))) AND
                (stristr(strtoupper(trim($objectData)),strtoupper(trim($categoryName))) == true))
            {
                sleep(1);
                $data->click();
                break;
            }
        }
    }

  




}