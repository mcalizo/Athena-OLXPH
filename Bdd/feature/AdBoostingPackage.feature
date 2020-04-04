@AdBoostingPackage
Feature: Ad Boosting Package
Story: As a OLX user I want to Boost my Ad. As a user, I want to access the manage ads page, So that, I can start using Boost Ad feature

  @parallel-scenario
  Scenario: Verify that i am able to access the manage ads page
    Given I am in HomePage
    When I click the login button at home page
    Then I should be in the login page
    And  I enter a registered mobile number
    And I enter a valid password
    And I click the login button
    Then I should be able to log in
    And I click the user profile button
    Then I should be in the Manage Ads page

  @parallel-scenario
  Scenario Outline: Verify OLX user should be able to boost ad using basic package
  Given I am in Manage ads page
    When I select <options> in drop-down
    Then I see ad boosting modal on screen
    Then I see Boost ad page
    When I click Recommended boosting package
    Then I see Confirmation boosting package page
    And I select Basic Package
    Then I should see correct price from summary section
    And I should see correct Package name on summary section
    And I check the terms and conditions
    Then I should see the Confirm button should be available to click
    And I click Confirm ad-boosting to confirm payment
    Then I should see payment page with total summary for <packageName> package
    And I should see payment option selection
    When I click OLX Gold for payment
    Then I should see success message with posting date and ad validity

    Examples:
      |options      | packageName  |
      |Boost        | Basic      |

  @starterPackage
  Scenario Outline: Verify OLX user should be able to boost ad using starter package
    Given I am in Manage ads page
    When I select <options> in drop-down
    Then I see ad boosting modal on screen
    Then I see Boost ad page
    When I click Recommended boosting package
    Then I see Confirmation boosting package page
    And I select Starter Package
    Then I should see correct price from summary section
    And I should see correct Package name for <packageName> on summary section
    And I check the terms and conditions
    Then I should see the Confirm button should be available to click
    And I click Confirm ad-boosting to confirm payment
    Then I should see payment page with total summary for <packageName> package
    And I should see payment option selection
    When I click OLX Gold for payment
    Then I should see success message with posting date and ad validity

  Examples:
  |options      | packageName  |
  |Boost        | Starter      |

  @parallel-scenario @skipScenario
  Scenario: Verify OLX user should be able to boost my ad using Premium package
    Given I am in Manage ads page
    And I click Boost ad button on an ad
    Then I see ad modal on screen
    And I click Ad Boost Package Button
    Then I see Boost ad page
    And I select Premium Package
    Then I should see correct price from summary section
    And I should see correct Package name on summary section
    And I tick the agreement checkbox
    Then I should see the Confirm button should be available to click
    And I click Confirm ad-boosting to confirm payment
    Then I should see payment page with total summary
    And I should see payment option selection
    When I click OLX Gold for payment
    Then I should see success message with posting date and ad validity

  @parallel-scenario @skipScenario
  Scenario: Verify OLX user should be able to boost my ad using VIP package
    Given I am in Manage ads page
    And I click Boost ad button on an ad
    Then I see ad modal on screen
    And I click Ad Boost Package Button
    Then I see Boost ad page
    And I select VIP Package
    Then I should see correct price from summary section
    And I should see correct Package name on summary section
    And I tick the agreement checkbox
    Then I should see the Confirm button should be available to click
    And I click Confirm ad-boosting to confirm payment
    Then I should see payment page with total summary
    And I should see payment option selection
    When I click OLX Gold for payment
    Then I should see success message with posting date and ad validity