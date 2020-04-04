@adUnits
Feature: Ad Units Checker
Story: As a Tester, I want to create ad units checker. As a tester, I want create ad units checker, So that i can verify which ad units will used

  @parallel-scenario
  Scenario Outline: Verify the specific ad units in ad details page
    Given I am in HomePage
    When I click the view all categories button
    Then I should be redirected to results page
    And I click an ad in listing page
    And I should verify that this <adUnits> was exist

  Examples:
  |adUnits                   |
  | AdDetails_Skyscraper     |
  | AdDetails_TopMrec        |
  | AdDetails_ImageGallery   |

  @parallel-scenario
  Scenario Outline: VVerify the specific ad units in ad listings page
    Given I am in HomePage
    When I click the view all categories button
    Then I should be redirected to results page
    And I should verify that this <adUnits> was exist

  Examples:
  |adUnits                   |
  | Listing_SkyRight         |
  | Listing_TopMrec          |
  | Listing_BottomMrec       |

  @parallel-scenario
  Scenario Outline: VVerify the specific ad units in ad listings page
    Given I am in the ad details page
    And I click name of the seller
    Then the landing page should be the seller profile ads page
    And I should verify that this <adUnits> was exist

  Examples:
  |adUnits                                              |
  | OLXPH-WEB/Seller/None/Seller/Leaderboard1           |