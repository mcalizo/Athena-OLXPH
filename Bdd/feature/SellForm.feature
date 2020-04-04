@sellform
Feature: Sell Form
Story: A new user Post ad in OLX, As a new user, I want to access Sell Form, So that I can start posting ad on OLX

  @parallel-scenario @sellCiStag @sellCiProd
  Scenario: Verify that I should not be able to post an Ad with missing required fields
    Given I am in HomePage
    When I click the login button at home page
    Then I should be in the login page
    When I enter a registered mobile number
    And I enter a valid password
    And I click the login button
    When I click Sell Your Item button
    Then I should see Sell Form page
    When I upload Ad Photo
    And I click Sell Your Item now button in Sell Form Page
    Then I should be notify to enter Ad Title
    And I should be notify to select Category
    And I should be notify to enter Ad Description

  @parallel-scenario @sellCiStag @sellCiProd
  Scenario Outline: Verify that I should not be able to post an Ad with missing uploaded Ad photo
    Given I am in HomePage
    When I click the login button at home page
    Then I should be in the login page
    When I enter a registered mobile number
    And I enter a valid password
    And I click the login button
    When I click Sell Your Item button
    Then I should see Sell Form page
    When I enter Ad Title
    And I click Choose a category button
    And I select category <category>
    And I select subcategory <subCategory>
    And I select another subcategory <moreSubCategory>
    And I enter price of Ad
    And I enter ad description
    And I click Sell Your Item now button in Sell Form Page
    Then I should be nofify to upload Ad Photo

  Examples:
  | category                  | subCategory                   | moreSubCategory           |
  | Consumer Electronics      | Video Games and Consoles      | Game Systems (Consoles)   |

  @parallel-scenario @sellCiProd @sellCiStag @sellTest
  Scenario Outline: Verify that I should be able to post an Ad
    Given I am in HomePage
    When I click the login button at home page
    Then I should be in the login page
    When I enter a registered mobile number
    And I enter a valid password
    And I click the login button
    When I click Sell Your Item button
    Then I should see Sell Form page
    When I upload Ad Photo
    And I upload another Photo
    And I enter Ad Title
    And I click Choose a category button
    And I select category <category>
    And I select subcategory <subCategory>
    And I select another subcategory <moreSubCategory>
    And I enter price of Ad
    And I enter ad description
    And I click Sell Your Item now button in Sell Form Page
    Then I should notify that my ad has been submitted

  Examples:
  | category                  | subCategory                   | moreSubCategory           |
  | Consumer Electronics      | Video Games and Consoles      | Game Systems (Consoles)   |

  @parallel-scenario @parallel-wait @sellCiProd
  Scenario Outline: Verify that I should be able to permanently delete an Ad
    Given I am in HomePage
    When I click the login button at home page
    Then I should be in the login page
    When I enter a registered mobile number
    And I enter a valid password
    And I click the login button
    When I click the manage ad button
    And I click on Moderated Tab
    When I select <options> in moderated ad drop-down
    Then I should be notify to Delete this ad permanently
    When I click Delete button to confirm ad delete
    Then I should be notify that Ad has been permanently deleted
    When I close the lightbox
    Then the previously ad posted should be deleted

  Examples:
  |options      |
  |Delete       |

  @parallel-scenario @parallel-wait @sellCiStag @sellTest
  Scenario Outline: Verify that I should be able to permanently delete an Ad
    Given I am in HomePage
    When I click the login button at home page
    Then I should be in the login page
    When I enter a registered mobile number
    And I enter a valid password
    And I click the login button
    When I click the manage ad button
    And I click on pending tab
    When I select <options> in moderated ad drop-down
    Then I should be notify to Delete this ad permanently
    When I click Delete button to confirm ad delete
    Then I should be notify that Ad has been permanently deleted
    When I close the lightbox
    Then the previously ad posted should be deleted

  Examples:
  |options      |
  |Delete       |

  @parallel-scenario @sellValidation @sellCiProd @sellCiStag
  Scenario Outline: Verify that I should verify the unique fields for Cars and Automotive category
    Given I am in HomePage
    When I click the login button at home page
    Then I should be in the login page
    When I enter a registered mobile number
    And I enter a valid password
    And I click the login button
    When I click Sell Your Item button
    Then I should see Sell Form page
    When I enter Ad Title
    And I click Choose a category button
    And I select category <category>
    And I select subcategory <subCategory>
    And I select another subcategory <moreSubCategory>
    Then I should verify that condition field is present
    And I should verify that warranty field is present
    And I should verify that year field is present
    And I should verify that brand field is present
    And I should verify that model field is present
    And I should verify that transmission field is present
    And I should verify that mileage fied is present
    And I should verify that fuel type field is present
    Then I should verify that plate number field is present

  Examples:
  | category                  | subCategory                         | moreSubCategory           |
  | Cars and Automotives      | Cars, SUVs, AUVs, and Pick-ups      | Cars and Sedan            |

  @parallel-scenario @sellValidation @sellCiProd @sellCiStag
  Scenario Outline: Verify that I should verify the unique fields for Real Estate For Sale category
  Given I am in HomePage
    When I click the login button at home page
    Then I should be in the login page
    When I enter a registered mobile number
    And I enter a valid password
    And I click the login button
    When I click Sell Your Item button
    Then I should see Sell Form page
    When I enter Ad Title
    And I click Choose a category button
    And I select category <category>
    And I select subcategory <subCategory>
    And I select another subcategory <moreSubCategory>
    Then I should verify that real estate condition field is present
    And I should verify that bedrooms field is present
    And I should verify that bathrooms field is present
    And I should verify that floor area field is present
    Then I should verify that lot area field is not present

  Examples:
  | category                  | subCategory                         | moreSubCategory           |
  | Real Estate               | Real Estate For Sale                | Apartment and Condominium |

  @parallel-scenario @sellValidation @sellCiProd @sellCiStag
  Scenario Outline: Verify that I should verify the unique fields for Real Estate For Sale category
    Given I am in HomePage
    When I click the login button at home page
    Then I should be in the login page
    When I enter a registered mobile number
    And I enter a valid password
    And I click the login button
    When I click Sell Your Item button
    Then I should see Sell Form page
    When I enter Ad Title
    And I click Choose a category button
    And I select category <category>
    And I select subcategory <subCategory>
    And I select another subcategory <moreSubCategory>
    Then I should verify that real estate condition field is present
    And I should verify that bedrooms field is present
    And I should verify that bathrooms field is present
    And I should verify that floor area field is present
    Then I should verify that lot area field is present

  Examples:
  | category                  | subCategory                         | moreSubCategory                            |
  | Real Estate               | Real Estate For Sale                | House and Lot, Townhouses and Subdivisions|

  @parallel-scenario @sellValidation @sellCiProd @sellCiStag
  Scenario Outline: Verify that I should verify the unique fields for Jobs category
    Given I am in HomePage
    When I click the login button at home page
    Then I should be in the login page
    When I enter a registered mobile number
    And I enter a valid password
    And I click the login button
    When I click Sell Your Item button
    Then I should see Sell Form page
    When I enter Ad Title
    And I click Choose a category button
    And I select category <category>
    And I select subcategory <subCategory>
    Then I should verify that address field is present
    And I should verify that job type field is present
    And I should verify that experience field is present
    And I should verify that job title field is present
    Then I shuold verify that education field is present

  Examples:
  | category                  | subCategory                         |
  | Jobs                      | Accounting and Auditing             |

  @parallel-scenario @sellValidation @sellCiProd @sellCiStag
  Scenario Outline: Verify that I should verify the unique fields for Pets and Animals For Sale category
    Given I am in HomePage
    When I click the login button at home page
    Then I should be in the login page
    When I enter a registered mobile number
    And I enter a valid password
    And I click the login button
    When I click Sell Your Item button
    Then I should see Sell Form page
    When I enter Ad Title
    And I click Choose a category button
    And I select category <category>
    And I select subcategory <subCategory>
    Then I should verify that condition field is not present

  Examples:
  | category                  | subCategory                         |
  | Pets and Animals          | Cats                                |