@audienceSegments
Feature: Audience Segments for Results page
Story: A user wants to verify if the Audience segments was implemented in specific search criteria, As a user, I want to access the ad listings page, So that, I can verify if the audience segments was implemented in specific search critera

  @parallel-scenario
  Scenario Outline: Verify that I am able to check the audience segments in some categories with P20,000 price filter.
    Given I am in HomePage
    When I click <categoryName> category in homepage
    Then I should be redirected to results page
    And I input <amount> in price range min
    And I click Go Button
    Then the landing page is the ad listings page
    And I should able to check the audience pixel value <audiencePixel>

  Examples:
  |categoryName                |amount   |audiencePixel|
  |Cars and Automotives        |20000    |492030007    |
  |Real Estate                 |20000    |495191784    |
  |Mobile Phones and Tablets   |20000    |495192243    |
  |Computers                   |20000    |491981243    |
  |Home and Furniture          |20000    |495192618    |

  @parallel-scenario
  Scenario Outline: Verify that I am able to check the audience segments in result page with specific keywords related on men products
    Given I am in HomePage
    When I input <searchKeyword> in the search bar in home page
    And I click the search button in home page
    And the landing page is the ad listings page
    And I should able to check the audience pixel value <audiencePixel>

  Examples:
  |searchKeyword     | audiencePixel|
  |bike              | 485197855    |

  @parallel-scenario
  Scenario Outline: Verify that I am able to check the audience segments in cars category
    Given I am in HomePage
    When I click the view all categories button
    Then I should be redirected to results page
    And I click Choose other category link
    And I click category <categoryName> in Modal
    And I click subcategory <subCategory> in Modal page
    And I click another subcategory <subCategory2> in Modal page
    Then I should able to check the audience pixel value <audiencePixel>

  Examples:
  | categoryName           | subCategory                      |subCategory2     | audiencePixel  |
  | Cars and Automotives   | Cars, SUVs, AUVs, and Pick-ups   | Cars and Sedan  | 484459162      |

