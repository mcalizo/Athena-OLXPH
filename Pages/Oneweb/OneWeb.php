<?php
/**
 * Created by PhpStorm.
 * User: mcgagan
 * Date: 23/09/2016
 * Time: 12:59 PM
 */

namespace Tests\Pages\Oneweb;

use Athena\Athena;
use Athena\Page\AbstractPage;

class OneWeb extends AbstractPage
{

    public function __construct()
    {
        parent::__construct(Athena::browser(), '/');
    }

    public function getAttributeBodyPage(){
        return  $this->getElementBodyPage()->thenFind()->asHtmlElement()->getAttribute('class');
    }

    private function getElementBodyPage(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withCss('div[class="home"] div[class="home"]');
    }

    public function getAttributeBodyPage2(){
        $bodyPageAttr = explode(" ", $this->getElementBodyPage2()->thenFind()->asHtmlElement()->getAttribute('class'));
        return  $bodyPageAttr[0];
    }

    private function getElementBodyPage2(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withXpath('//body');
    }

    public function getElementWithOther($attribute, $value){
        return $this->getBrowser()->getCurrentPage()->getElement()
            ->withXpath("//*[@".$attribute."='".$value."']");
    }

    public function getElementAttributes ($element,$attribute)
    {
        $string = $this->getBrowser()->getCurrentPage()->getElement()->withId($element);
        $stringAttr = explode(';',$string->thenFind()->asHtmlElement()->getAttribute($attribute));
        $stringAttr = array_shift($stringAttr);
        return $stringAttr;
    }

    public function getElementAttributes2 ($type,$element,$attribute)
    {
        $type = strtolower($type);
        switch ($type)
        {
            case "xpath":
                $string = $this->getBrowser()->getCurrentPage()->getElement()->withXpath($element);
                break;
            case "name":
                $string = $this->getBrowser()->getCurrentPage()->getElement()->withName($element);
                break;
            case "id":
                $string = $this->getBrowser()->getCurrentPage()->getElement()->withId($element);
                break;
            case "css":
                $string = $this->getBrowser()->getCurrentPage()->getElement()->withCss($element);
                break;
        }
        
        $stringAttr = explode(';',$string->thenFind()->asHtmlElement()->getAttribute($attribute));
        $stringAttr = array_shift($stringAttr);
        return $stringAttr;
    }

    public function getElementText ($type,$element)
    {
        $type = strtolower($type);
        switch ($type)
        {
            case "xpath":
                $string = $this->getBrowser()->getCurrentPage()->getElement()->withXpath($element);
                break;
            case "name":
                $string = $this->getBrowser()->getCurrentPage()->getElement()->withName($element);
                break;
            case "id":
                $string = $this->getBrowser()->getCurrentPage()->getElement()->withId($element);
                break;
            case "css":
                $string = $this->getBrowser()->getCurrentPage()->getElement()->withCss($element);
                break;
        }

        return $string->thenFind()->asHtmlElement()->getText();
    }



    /*
     * Method to open a page
     */
    public function openPage($url)
    {

        $this->getBrowser()->get($url);
        $this->cookieSet();
        $this->refresh();
        //$this->getBrowser()->deleteAllCookies();
        //$this->getBrowser()->get($url);
        $this->getBrowser()->manage()->window()->maximize();
        sleep(5);
    }

    /*
     * Method to check the url status
     */
    public function checkUrl($url){
        $status = $this->getUrlStatus($url);
        if(substr($status,0,1)!=2){
            \PHPUnit_Framework_Assert::fail($url.' is broken. status : '.$this->getUrlStatus($url));
        }
    }

    /*
     * Method to click an element
     */
    public function clickCssElement($element = '')
    {
        $this->page()->find()->elementWithCss($element)->click();
    }

    /*
     * Method to get text
     * @return string
     */
    public function getText($element = '')
    {
        $string = $this->getBrowser()->getCurrentPage()->getElement()->withCss($element);
        return $string->thenFind()->asHtmlElement()->getText();
    }

    /*
     * Method to check if element is present by ID
     */
    public function assertElementPresent($element = '')
    {
        try{
            $this->page()->findAndAssertThat()->existsOnlyOnce()->elementsWithId($element);
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    /*
     * Method to check if element is present by ID
     */
    public function assertElementPresentAtLeastOnce($type = '', $element = '')
    {

        $type = strtolower($type);
        switch ($type)
        {
            case "xpath":
                try{
                    $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithXpath($element);
                    return true;
                }catch(\Exception $e){
                    return false;
                }
                break;

            case "name":
                try{
                    $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithName($element);
                    return true;
                }catch(\Exception $e){
                    return false;
                }
                break;
            case "id":
                try{
                    $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithId($element);
                    return true;
                }catch(\Exception $e){
                    return false;
                }
                break;
            case "css":
                try{
                    $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithCss($element);
                    return true;
                }catch(\Exception $e){
                    return false;
                }
                break;
        }
        


    }

    /*
     * Method to check if element is present by CSS
     */
    public function assertElementPresentCss($element = '')
    {
        try{
            $this->page()->findAndAssertThat()->existsOnlyOnce()->elementsWithCss($element);
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    /*
     * Method to check if element is present by CSS at least once
     */
    public function assertElementPresentCssAtLeastOnce($element = '')
    {
        try{
            $this->page()->findAndAssertThat()->existsAtLeastOnce()->elementsWithCss($element);
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    public function isURLBroken($url){
        $status = $this->getUrlStatus($url);
        $broken = false;

        if (($status != 200) && ($status != 301)) {
            $broken = true;
        }
        return $broken;
    }

    /**
     * Generic Method to input string at textbox
     * @param $type
     * @param $element
     * @param $string
     */
    public function enterString($type,$element,$string)
    {
        $type = strtolower($type);
        switch ($type)
        {
            case "xpath":
                $this->page()->find()->elementWithXpath($element)->click();
                sleep(2);
                $this->page()->find()->elementWithXpath($element)->sendKeys($string);
                break;
            case "name":
                $this->page()->find()->elementWithName($element)->click();
                sleep(2);
                $this->page()->find()->elementWithName($element)->sendKeys($string);
                break;
            case "id":
                $this->page()->find()->elementWithId($element)->click();
                sleep(2);
                $this->page()->find()->elementWithId($element)->sendKeys($string);
                break;
            case "css":
                $this->page()->find()->elementWithCss($element)->click();
                sleep(2);
                $this->page()->find()->elementWithCss($element)->sendKeys($string);
                break;
        }
    }

    /**
     * Genetic Method to select from dropdown selection
     * @param $type
     * @param $element
     * @param $string
     */
    public function selectInDropDownValue($type,$element,$string)
    {
        $type = strtolower($type);
        switch ($type)
        {
            case "xpath":
                $value = $this->getBrowser()->getCurrentPage()->getElement()->withXpath($element);
                $value->thenFind()->asDropDown()->selectByVisibleText($string);
                break;
            case "name":
                $value = $this->getBrowser()->getCurrentPage()->getElement()->withName($element);
                $value->thenFind()->asDropDown()->selectByVisibleText($string);
                break;
            case "id":
                $value = $this->getBrowser()->getCurrentPage()->getElement()->withId($element);
                $value->thenFind()->asDropDown()->selectByVisibleText($string);
                break;
            case "css":
                $value = $this->getBrowser()->getCurrentPage()->getElement()->withCss($element);
                $value->thenFind()->asDropDown()->selectByVisibleText($string);
                 break;
        }
        sleep(10);
    }

    /**
     * Generic Method to click element/s
     * @param $type
     * @param $element
     */
    public function clickElement($type,$element)
    {
        $type = strtolower($type);
        switch ($type)
        {
            case "xpath";
                //$this->page()->wait(10)->untilClickabilityOf()->elementWithXpath($element)->click();
                //$this->getBrowser()->getCurrentPage()->wait(10)->getPageFinder()->elementWithXpath($element)->click();
                //$this->page()->wait(10)->untilVisibilityOf()->elementWithXpath($element)->click();
                $this->page()->find()->elementWithXpath($element)->click();
                //$this->page()->wait(5)->elementWithXpath($element)->click();
                break;
            case "name":
                //$this->page()->wait(10)->untilClickabilityOf()->elementWithName($element)->click();
                //$this->getBrowser()->getCurrentPage()->wait(10)->getPageFinder()->elementWithName($element)->click();
                //$this->page()->wait(10)->untilVisibilityOf()->elementWithName($element)->click();
                $this->page()->find()->elementWithName($element)->click();
                //$this->page()->wait(5)->elementWithName($element)->click();
                break;
            case "id":
                //$this->page()->wait(10)->untilClickabilityOf()->elementWithId($element)->click();
                //$this->getBrowser()->getCurrentPage()->wait(10)->getPageFinder()->elementWithId($element)->click();
                //$this->page()->wait(10)->untilVisibilityOf()->elementWithId($element)->click();
                $this->page()->find()->elementWithId($element)->click();
                //$this->page()->wait(5)->elementWithId($element)->click();
                break;
            case "css":
                //$this->page()->wait(10)->untilClickabilityOf()->elementWithCss($element)->click();
                //$this->getBrowser()->getCurrentPage()->wait(10)->getPageFinder()->elementWithCss($element)->click();
                //$this->page()->wait(10)->untilVisibilityOf()->elementWithCss($element)->click();
                $this->page()->find()->elementWithCss($element)->click();
                //$this->page()->wait(5)->elementWithCss($element)->click();
                break;
        }

    }

    public function verifyElementNotPresent($type, $element){

        $type = strtolower($type);
        switch ($type)
        {
            case "xpath":
                return $this->page()->findAndAssertThat()->doesNotExist()->elementWithXpath($element);
                break;
            case "name":
                return $this->page()->findAndAssertThat()->doesNotExist()->elementWithName($element);
                break;
            case "id":
                return $this->page()->findAndAssertThat()->doesNotExist()->elementWithId($element);
                break;
            case "css":
                return $this->page()->findAndAssertThat()->doesNotExist()->elementWithCss($element);
                break;
        }
    }

    public function cookieSet()
    {
        sleep(3);
        $this->getBrowser()->manage()->addCookie(['domain' => '.olx.ph','name' => 'optimizelyOptOut','value' => 'true']);
        //$cookies = $this->getBrowser()->manage()->getCookies();
        //print_r($cookies);

    }

    public function cleanUpUrl()
    {
        $url = $this->getBrowser()->getCurrentURL();
        $url = str_replace(array('#','_','='), '',$url);
        return $url;
    }

    public function getUrlStatus($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_exec($ch);
        $returnCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $returnCode;
    }
}