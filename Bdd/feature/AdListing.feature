@adlisting
Feature: Ad Listing Page
Story: A user wants to browse items in listing page. As a user, I want to access the ad listing page, So that I can start choosing items on OLX.

  @parallel-scenario @searching @adlistingcitest @adlistingProdReg @adlistingCiStag
  Scenario Outline: Verify that the ad listing page is accessible
    Given I am in HomePage
    When I input <searchKeyword> in the search bar in home page
    And I input <locationKeyword> in the location search bar in home page
    And I select <locationKeyword> from the location dropdown in home page
    And I click the search button in home page
    Then I should see results about <searchKeyword> in <locationKeyword>
    And the landing page is the ad listings page

  Examples:
  | searchKeyword | locationKeyword |
  | Iphone        | Manila          |

  @parallel-scenario @adlistingcitest @adlistingProdReg @adlistingCiStag
  Scenario: Verify that the home page is accessible
    Given I am in the ad listings page
    When I click the OLX logo in the ad listings page
    Then I should be redirected to the home page

  @parallel-scenario @searching @adlistingcitest @adlistingProdReg @adlistingCiStag
  Scenario Outline: Verify that I can search an item in ad listings page
    Given I am in the ad listings page
    When I input <searchKeyword> in the search bar in ad listings page
    And I click location bar in ad listing page
    And I select <locationKeyword> in the location dropdown in ad listings page
    And I select <locationKeyword2> in the location dropdown in ad listings page
    And I click the search button in ad listings page
    Then I should see results about <searchKeyword> in <locationKeyword2>
    And the landing page is the ad listings page

  Examples:
  | searchKeyword | locationKeyword | locationKeyword2 |
  | Rolex | Metro Manila | Makati |

  @parallel-scenario @adlistingProdReg @adlistingCiStag
  Scenario: Verify that I can browse items in ad listings page via next page
    Given I am in the ad listings page
    And I have search results
    When I click the next button
    Then I should be redirected to the next page of ad listings page
    And I get the same results as the previous search item

  @parallel-scenario @adlistingProdReg @adlistingCiStag
  Scenario Outline: Verify that I can sort items in ad listings page
    Given I am in the ad listings page
    And I have search results
    When I click the sort by dropdown
    And I select <sortBy> in dropdown
    Then I should see results sorted by <sortBy>

  Examples:
  | sortBy          |
  | Cheapest First  |
  | Expensive First |
  | Date Posted     |
  | Relevance       |

  @parallel-scenario @adlistingProdReg @adlistingCiStag
  Scenario Outline: Verify that I can filter items by date posted in ad listings page
    Given I am in the ad listings page
    And I have search results
    And I click <subCategory> option
    Then it should display ads posted <subCategory> ago

  Examples:
  | subCategory |
  | Last 2 days |

  @parallel-scenario @adlistingProdReg @adlistingCiStag
  Scenario Outline: Verify that I can select sub categories in ad listings page
    Given I am in HomePage
    When I input <searchKeyword> in the search bar in home page
    And I input <locationKeyword> in the location search bar in home page
    And I select <locationKeyword> in the location dropdown in home page
    And I select <locationKeyword2> in the location dropdown in home page
    And I click the search button in home page
    Then I should see results about <searchKeyword> in <locationKeyword2>
    And the landing page is the ad listings page
    When I select <categoryFilter> in the left side widget of ad listings page
    Then the landing page is the ad listings page
    And I should see results about <categoryFilter> in <locationKeyword>

  Examples:
  | searchKeyword | locationKeyword | locationKeyword2 | categoryFilter |
  | Iphone        | Cebu            | Cebu City        | Mobile Phones and Tablets |

  @parallel-scenario @searching @adlistingProdReg
  Scenario Outline: Verify that additional filters is displayed in ad listings page
  Given I am in the ad listings page
  And I have search results
  When I selected the <subCatetory> sub category
  Then I should see filters of condition
  And I should see filters of price range
  And I should see filters of date posted

  Examples:
  | subCatetory         |
  | Computers           |

  @parallel-scenario @searching @adlistingCiStag
  Scenario Outline: Verify that additional filters is displayed in ad listings page
    Given I am in the ad listings page
    And I have search results
    When I selected the <subCatetory> sub category
    Then I should see filters of condition
    And I should see filters of price range
    And I should see filters of date posted

    Examples:
    | subCatetory         |
    | Mobile Phones and Tablets |

  @parallel-scenario @adlistingProdReg @adlistingCiStag
  Scenario: Verify that breadcrumbs is displayed in ad listings page
    Given I am in the ad listings page
    And I have search results
    When I click the home in breadcrumbs
    Then I should be redirected to the home page

  @parallel-scenario @catfilter @adlistingProdReg @adlistingCiStag
  Scenario Outline: Verify that I can remove the Active category in ad listing page
    Given I am in HomePage
    When I click <categoryName> category in homepage
    Then I should be redirected to results page
    And I should see that <categoryName> filter is active
    When I removed the active category filter
    Then the active category should be removed

  Examples:
  |categoryName                         |
  | Mobile Phones and Tablets           |
  | Computers                           |
  | Consumer Electronics                |
  | Pets and Animals                    |

  @parallel-scenario @catfilter @adlistingProdReg @adlistingCiStag
  Scenario Outline: Verify that I can remove the Active category in ad listing page
    Given I am in HomePage
    When I click <categoryName> category in homepage
    Then I should be redirected to results page
    And I should see that <categoryName> filter is active
    When I removed the active category filter
    Then the active category should be removed

  Examples:
  |categoryName                         |
  | Home and Furniture                  |
  | Beauty, Health, and Grocery         |
  | Clothing and Accessories            |
  | Books, Sports and Hobbies           |

  @parallel-scenario @catfilter1 @adlistingProdReg @adlistingCiStag
  Scenario Outline: Verify that I can remove the Active category in ad listing page
    Given I am in HomePage
    When I click <categoryName> category in homepage
    Then I should be redirected to results page
    And I should see that <categoryName> filter is active
    When I removed the active category filter
    Then the active category should be removed

  Examples:
  |categoryName                         |
  | Baby Stuff and Toys                 |
  | Real Estate                         |
  | Cars and Automotives                |
  | Services                            |

  @parallel-scenario @catfilter2 @adlistingProdReg @adlistingCiStag
  Scenario Outline: Verify that I can remove the Active category in ad listing page
    Given I am in HomePage
    When I click <categoryName> category in homepage
    Then I should be redirected to results page
    And I should see that <categoryName> filter is active
    When I removed the active category filter
    Then the active category should be removed

  Examples:
  |categoryName                         |
  | Jobs                                |
  | Business and Earning Opportunities  |
  | Motorcycles                         |


