@VasRefresh
Feature: Refresh
Story: A user wants to use the Refresh Feature. As a user, I want to access the manage ads page, So that, I can start using Refresh Feature.

  #@parallel-scenario
  #Scenario: Verify that i am able to access the manage ads page
  #Given I am in the home page
  #When I click the login button at home page
  #Then I should be in the login page
  #And  I enter a registered mobile number
  #And I enter a valid password
  #And I click the login button
  #Then I should be able to log in
  #And I should be redirected to the manage ad page
  #And I click the user profile button
  #Then I should be in the Manage Ads page

  @parallel-scenario
  Scenario: Verify that i am able to use the express refresh feature using OLX Gold
    Given I am in Manage ads page
    When I click the Refresh Button
    Then I should able to see the modal with refresh options
    And I click the Refresh Button in Modal
    Then I should be redirected to Refresh page
    And I check the terms and conditions
    And I click the Confirm Refresh for this ad and process the payment Button
    Then I should be redirected to the Payment page
    And I click OLX Gold for payments
    Then I should be redirected to success payment page

  #add skip scenario due to removal of bdocc payment
  @parallel-scenario @skipScenario
  Scenario: Verify that i am able to use the express refresh feature using Credit Card
    Given I am in Manage ads page
    When I click the Refresh Button
    Then I should able to see the modal with refresh options
    And I click the Refresh Button in Modal
    Then I should be redirected to Refresh page
    And I check the terms and conditions
    And I click the Confirm Refresh for this ad and process the payment Button
    Then I should be redirected to the Payment page
    And I click Credit Card
    Then I should redirected to the BDO page

  @parallel-scenario @test01
  Scenario: Verify that i am able to use the express refresh feature using Paypal
    Given I am in Manage ads page
    When I click the Refresh Button
    Then I should able to see the modal with refresh options
    And I click the Refresh Button in Modal
    Then I should be redirected to Refresh page
    And I check the terms and conditions
    And I click the Confirm Refresh for this ad and process the payment Button
    Then I should be redirected to the Payment page
    And I click Paypal
    Then I should redirected to the Paypal page


  @parallel-scenario @refresher
  Scenario Outline: Verify that i am able to use the express refresh feature using Credit Card via Paypal
    Given I am in Manage ads page
    When I select <options> in drop-down
    Then I should able to see the modal with refresh options
    And I click the Refresh Button in Modal
    Then I should be redirected to Refresh page
    And I check the terms and conditions
    And I click the Confirm Refresh for this ad and process the payment Button
    Then I should be redirected to the Payment page
    And I click Credit Card via Paypal
    Then I should redirected to the Paypal page

  Examples:
  |options      |
  |Refresh      |

  @parallel-scenario
  Scenario: Verify that i am able to use the express refresh feature using ATM/ Debit Card
    Given I am in Manage ads page
    When I click the Refresh Button
    Then I should able to see the modal with refresh options
    And I click the Refresh Button in Modal
    Then I should be redirected to Refresh page
    And I check the terms and conditions
    And I click the Confirm Refresh for this ad and process the payment Button
    Then I should be redirected to the Payment page
    And I click ATM Debit Card
    Then I should redirected to the Pesopay page

  #add skip scenario because gcash is temporarily disabled
  @parallel-scenario @skipScenario
  Scenario: Verify that i am able to use the express refresh feature using GCash
    Given I am in Manage ads page
    When I click the Refresh Button
    Then I should able to see the modal with refresh options
    And I click the Refresh Button in Modal
    Then I should be redirected to Refresh page
    And I check the terms and conditions
    And I click the Confirm Refresh for this ad and process the payment Button
    Then I should be redirected to the Payment page
    And I click GCash
    Then I should be redirected to the dragonpay page

  @parallel-scenario @skipScenario
  Scenario Outline: Verify that I am not able to use refresh when OLX gold is insufficient
    Given I am in Manage ads page
    When I select <option> in drop-down
    Then I should able to see the modal with refresh options
    And I click the Refresh Button in Modal
    Then I should able to see the modal with refresh options
    And I click the Refresh Button in Modal
    Then I should be redirected to Refresh page
    And I check the terms and conditions
    And I click the Confirm Refresh for this ad and process the payment Button
    Then I should be redirected to the Payment page
    And I click OLX Gold for payments
    Then I should notify by the systems that i have insufficient OLX gold credits

  Examples:
  |option       |
  |Refresh      |

  @parallel-scenario @skipScenario
  Scenario: Verify that i am able to use the Promo code in express refresh feature
    Given I am in Manage ads page
    When I click the Refresh Button
    Then I should able to see the modal with refresh options
    And I click the Refresh Button in Modal
    Then I should be redirected to Refresh page
    And I check the terms and conditions
    And I click the Confirm Refresh for this ad and process the payment Button
    Then I should be redirected to the Payment page
    And I input valid promo code and click the apply button
    Then I should be notified by the system that the promo is valid
    But I input invalid promo code and click the apply button
    Then I should be notified by the system that the promo is invalid

