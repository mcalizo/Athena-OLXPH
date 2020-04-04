@Orders
Feature: Orders Page
Story: A user can monitor his orders. As a user, I want to access the Orders page. So that I can monitor my Orders.

  @parallel-scenario @Orders
  Scenario: Verify that I am able to access Orders buyers side page
    Given I am in Manage ads page
    When I click Orders button
    Then I should able see Switch to Selling Orders
    Then I should able to see Pending orders
    And I click the view button
    Then I should able see pop up window about buyer information

  @parallel-scenario @Orders
  Scenario: Verify that I am able to access need payment orders section
    Given I am in Orders page
    When I click the Need payment button
    Then I should see submit proof of payment button
    And I should click the submit proof of payment button
    Then I should able see pop up window with choose file button
    And I click
    Then I should see submit proof of payment button
