@buynow
Feature: Buy Now
Story: As u buyer I should be able to see buy now ads, As a user, I want to see buy now ads, So that I can start choosing buy now ads in OLX

  @parallel-scenario
  Scenario Outline: Verify that I should able to see Buy Now ads from home page
    Given I am in HomePage
    When I click <categoryName> category in homepage
    Then I should be redirected to results page
    And I should see all buy now ads
    And I should see that <categoryName> filter is active
    And I should not see the View Buy Now items button in banner
    And I should not see sponsored ads

  Examples:
  | categoryName |
  | Buy Now      |

  @parallel-scenario
  Scenario: Verify that I should be able to removed Buy Now active filter in listing page
    Given I am in ad listing with active buy now filter
    When I removed the active buy now filter
    Then the buy now active filter should be removed
    And the View Buy Now items button should be in banner
    And I should see sponsored ads is displayed

  @parallel-scenario
  Scenario Outline: Verify that I should be able to filter Buy Now ads in listing page
    Given I am in ad listing results page
    When I click View Buy now items button
    Then I should see all buy now ads
    And I should see that <categoryName> filter is active
    And I should not see the View Buy Now items button in banner
    And I should not see sponsored ads

  Examples:
  | categoryName |
  | Buy Now      |

  @parallel-scenario
  Scenario: Verify that I should be redirected to login page when I click Buy Now in details page
    Given I am in ad listing with active buy now filter
    And I am not yet logged in
    When I click an ad in listing page
    Then I should be redirected to the ad details page
    When I click Buy Now button
    Then I should be redirected to the login page
    When I enter a registered email address
    And I enter a valid password
    And I click the login button
    Then I should be redirected to Buy Now Order Form page

  @parallel-scenario
  Scenario Outline: Verify that I should be redirected to Buy Now Order Form page when I click Buy Now in details page
    Given I am in HomePage
    When I click the login button at home page
    And I enter a registered email address
    And I enter a valid password
    And I click the login button
    When I click the OLX logo
    Then I should be redirected to the home page
    When I click <categoryName> category in homepage
    Then I should be redirected to results page
    When I click an ad in listing page
    Then I should be redirected to the ad details page
    When I click Buy Now button
    Then I should be redirected to Buy Now Order Form page

  Examples:
  | categoryName |
  | Buy Now     |



