@homepage
Feature: Home Page
Story: A user wants to access the home page to browse items. As a user, I want to access the home page, So that I can start browsing on OLX.

  @parallel-scenario
  Scenario: Verify that the home page is accessible
  Given I am in HomePage
  Then I should be able to access the home page

  @parallel-scenario @searching @homepagecitest
  Scenario Outline: Verify that I am able to search valid items on OLX
    Given I am in HomePage
    When I input <searchKeyword> in the search bar in home page
    And I input <locationKeyword> in the location search bar in home page
    And I select <locationKeyword> from the location dropdown in home page
    And I click the search button in home page
    Then I should see results for Computer in Manila
    And the landing page is the ad listings page

  Examples:
  | searchKeyword | locationKeyword |
  | Computer      | Manila          |


  @parallel-scenario @searching1 @homepagecitest
  Scenario Outline: Verify that I am informed when my search keyword is not available
    Given I am in HomePage
    When I input <searchKeyword> in the search bar in home page
    And I input <locationKeyword> in the location search bar in home page
    And I select <locationKeyword> from the location dropdown in home page
    And I click the search button in home page
    Then I should see no results for <searchKeyword> in <locationKeyword>
    And the landing page is the no results page

  Examples:
  | searchKeyword   | locationKeyword |
  | Marijuana       | Manila          |

  @parallel-scenario @searching @homepagecitest
  Scenario Outline: Verify that I am informed when my search keyword is invalid
    Given I am in HomePage
    When I input <searchKeyword> in the search bar in home page
    And I input <locationKeyword> in the location search bar in home page
    And I select <locationKeyword> from the location dropdown in home page
    And I click the search button in home page
    Then I should see no results for <searchKeyword> in <locationKeyword>
    And the landing page is the no results page

  Examples:
  | searchKeyword | locationKeyword |
  | qwertyasdfgh  | Baguio          |


  @parallel-scenario @searching
  Scenario Outline: Verify that I am able to search valid items on OLX without location
    Given I am in HomePage
    When I input <searchKeyword> in the search bar in home page
    And I click the search button in home page
    Then I should see results for cars without location
    And the landing page is the ad listings page

  Examples:
  | searchKeyword |
  | cars          |

  @parallel-scenario
  Scenario: Verify that I am  able to search valid items on OLX using the categories
    Given I am in HomePage
    When I click on clothing and accessories category in home page
    Then I should be able to see results under clothing and accessories category
    And the landing page is the ad listings page

  @parallel-scenario
  Scenario: Verify that I am able to search valid items on OLX using all categories
    Given I am in HomePage
    When I click the view all categories button
    Then I should be able to see all results
    And the landing page is the ad listings page

  @parallel-scenario
  Scenario: Verify that I am able to log in from home page
    Given I am in HomePage
    When I click the login button at home page
    Then I should be redirected to the login page

  @parallel-scenario
  Scenario: Verify that I am able to access the sell form from home page
    Given I am in HomePage
    But I am not yet logged in
    When I click the sell your item now button when not logged in
    Then I should be redirected to the ad posting login page

  @parallel-scenario
  Scenario: Verify that I am able to access Sell Form from home page
    Given I am in HomePage
    And I am logged in
    Then I should be able to log in
    When I click the OLX logo
    Then I should be redirected to the home page
    When I click the sell your item now button when logged in
    Then I should be able to see the sell form page

  @parallel-scenario @logout
  Scenario: Verify that I am able to log out my account in home page
    Given I am in HomePage
    And I am logged in
    Then I should be redirected to the manage ad page
    When I click the OLX logo
    Then I should be redirected to the home page
    When I click the logout button
    Then I should not see the manage ad button
    And the landing page is the home page

  @parallel-scenario
  Scenario: Verify that I am able to access the manage ad page from home page
    Given I am in HomePage
    And I am logged in
    When I click the manage ad button
    Then I should be redirected to the manage ad page

  @parallel-scenario
  Scenario: Verify that I am able to access my messages from home page
    Given I am in HomePage
    And I am logged in
    When I click the message button
    Then I should be redirected to the messages page






