@adsenselisting
Feature: Ad Sense in Ad Listing
Story: A user wants to verify if the Adsense in Ad listing page exists. As a user, I want to access the ad listing page, So that I can verify if the Adsense was display.

  @parallel-scenario
  Scenario: Verify that i am able to see an adsense in ad listing page
    Given I am in HomePage
    When I click the view all categories button
    Then I should be able to see all results
    And the landing page is the ad listings page
    And I should be able to see the adsense in the middle part of the ad listing
    And I should be able to see the adsense in the Right part of the ad listing
    And I should be able to see the adsense in the Bottom part of the ad listing

  @parallel-scenario
  Scenario Outline: Verify that i am able to see an AFS when searching using specific keywords
    Given I am in HomePage
    When I input <searchKeyword> in the search bar in home page
    And I input <locationKeyword> in the location search bar in home page
    And I select <locationKeyword> from the location dropdown in home page
    And I click the search button in home page
    Then I should be redirected to results page
    And I should be able to see the AFS in the Upper part of the Ad listings
    And I shoule be able to see the AFS in the Bottom part of the Ad listings

  Examples:
  | searchKeyword | locationKeyword   |
  | Flower        | Manila            |

  @parallel-scenario
  Scenario Outline: Verify that i am able to see an adsense in ad listing page using search keywords in homepage
    Given I am in HomePage
    When I input <searchKeyword> in the search bar in home page
    And I input <locationKeyword> in the location search bar in home page
    And I select <locationKeyword> from the location dropdown in home page
    And I click the search button in home page
    Then I should be redirected to results page
    And I should be able to see the adsense in the middle part of the ad listing
    And I should be able to see the adsense in the Right part of the ad listing
    And I should be able to see the adsense in the Bottom part of the ad listing

  Examples:
  | searchKeyword   | locationKeyword   |
  | Ipad            | Manila            |
  | House and Lot   | Imus              |
  | Toyota          | Pasig             |

  @parallel-scenario
  Scenario Outline: Verify that i am able to see an adsense in ad listing page using search keywords in ad listing page
    Given I am in the ad listings page
    When I input <searchKeyword> in the search bar in ad listings page
    And I click location bar in ad listing page
    And I select <locationKeyword> in the location dropdown in ad listings page
    And I select <locationKeyword2> in the location dropdown in ad listings page
    And I click the search button in ad listings page
    Then I should be able to see the adsense in the middle part of the ad listing
    And I should be able to see the adsense in the Right part of the ad listing
    And I should be able to see the adsense in the Bottom part of the ad listing

  Examples:
  | searchKeyword | locationKeyword | locationKeyword2               |
  | Iphone        | Metro Manila    | Entire Metro Manila            |