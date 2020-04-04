@TopUp
Feature: Top up
Story: A user wants to purchase OLX gold. As a user, I want to access the manage ads page, So that, I can purchase OLX Gold.

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

  #add skip scenario due to removal of bdocc payment
  @parallel-scenario @skipScenario
  Scenario Outline: Verify that i am able to purchase OLX Gold using Credit card options
    Given I am in Manage ads page
    When I click Payments
    Then I should be in the Payment Logs page
    And I click Buy OLX gold credits button
    And I input <amount> credits to buy
    And I input <Address> in the address text field
    And I check the Terms and condition
    And I click Proceed with payment button
    Then I should redirected to the Payment page
    And I click Credit Card
    Then I should redirected to the BDO page

  Examples:
  | amount | Address |
  | 500    |         |

  @parallel-scenario
  Scenario Outline: Verify that i am able to purchase OLX Gold using Paypal options
    Given I am in Manage ads page
    When I click Payment page
    Then I should be in the Payment Logs page
    And I click Buy OLX gold credits button
    And I input <amount> credits to buy
    And I input <Address> in the address text field
    And I check the Terms and condition
    And I click Proceed with payment button
    Then I should redirected to the Payment page
    And I click Paypal
    Then I should redirected to the Paypal page

  Examples:
  | amount | Address |
  | 600 |   |

  @parallel-scenario
  Scenario Outline: Verify that i am able to purchase OLX Gold using Paypal Credit Card options
    Given I am in Manage ads page
    When I click Payment page
    Then I should be in the Payment Logs page
    And I click Buy OLX gold credits button
    And I input <amount> credits to buy
    And I input <Address> in the address text field
    And I check the Terms and condition
    And I click Proceed with payment button
    Then I should redirected to the Payment page
    And I click Credit Card via Paypal
    Then I should redirected to the Paypal page

  Examples:
  | amount | Address |
  | 400    |         |

  @parallel-scenario
  Scenario Outline: Verify that i am able to purchase OLX Gold using ATM/ Debit Card options
    Given I am in Manage ads page
    When I click Payment page
    Then I should be in the Payment Logs page
    And I click Buy OLX gold credits button
    And I input <amount> credits to buy
    And I input <Address> in the address text field
    And I check the Terms and condition
    And I click Proceed with payment button
    Then I should redirected to the Payment page
    And I click ATM Debit Card
    Then I should redirected to the Pesopay page

  Examples:
  | amount | Address |
  | 400    |         |

  #add skip scenario because gcash is temporarily disabled
  @parallel-scenario @skipScenario
  Scenario Outline: Verify that i am able to purchase OLX Gold using GCash options
    Given I am in Manage ads page
    When I click Payment page
    Then I should be in the Payment Logs page
    And I click Buy OLX gold credits button
    And I input <amount> credits to buy
    And I input <Address> in the address text field
    And I check the Terms and condition
    And I click Proceed with payment button
    Then I should redirected to the Payment page
    And I click GCash
    Then I should be redirected to the dragonpay page

  Examples:
  | amount | Address |
  | 700    |         |

  @parallel-scenario
  Scenario Outline: Verify that i am able to purchase OLX Gold using BDO options
    Given I am in Manage ads page
    When I click Payment page
    Then I should be in the Payment Logs page
    And I click Buy OLX gold credits button
    And I input <amount> credits to buy
    And I input <Address> in the address text field
    And I check the Terms and condition
    And I click Proceed with payment button
    Then I should redirected to the Payment page
    And I click BDO
    Then I should redirected to the Pesopay page

  Examples:
  | amount | Address |
  | 700    |         |

  @parallel-scenario
  Scenario Outline: Verify that i am able to purchase OLX Gold using Cebuana options
    Given I am in Manage ads page
    When I click Payment page
    Then I should be in the Payment Logs page
    And I click Buy OLX gold credits button
    And I input <amount> credits to buy
    And I input <Address> in the address text field
    And I check the Terms and condition
    And I click Proceed with payment button
    Then I should redirected to the Payment page
    And I click Cebuana
    Then I should see a modal that contains the Payment instructions for Cebuana

  Examples:
  | amount | Address |
  | 700    |         |

  @parallel-scenario
  Scenario Outline: Verify that i am able to purchase OLX Gold using LBC Dragonpay options
    Given I am in Manage ads page
    When I click Payment page
    Then I should be in the Payment Logs page
    And I click Buy OLX gold credits button
    And I input <amount> credits to buy
    And I input <Address> in the address text field
    And I check the Terms and condition
    And I click Proceed with payment button
    Then I should redirected to the Payment page
    And I click LBC Dragonpay
    Then I should redirect to lbc Dragonpay page

  Examples:
  | amount | Address |
  | 700    |         |

  @parallel-scenario
  Scenario Outline: Verify that i am able to purchase OLX Gold using 7-Eleven options
    Given I am in Manage ads page
    When I click Payment page
    Then I should be in the Payment Logs page
    And I click Buy OLX gold credits button
    And I input <amount> credits to buy
    And I input <Address> in the address text field
    And I check the Terms and condition
    And I click Proceed with payment button
    Then I should redirected to the Payment page
    And I click 7-Eleven
    Then I should see a modal that contains the Payment instructions for 7-Eleven

  Examples:
  | amount | Address |
  | 700    |         |

  @parallel-scenario
  Scenario Outline: Verify that i am able to purchase OLX Gold using other payment centers option
    Given I am in Manage ads page
    When I click Payment page
    Then I should be in the Payment Logs page
    And I click Buy OLX gold credits button
    And I input <amount> credits to buy
    And I input <Address> in the address text field
    And I check the Terms and condition
    And I click Proceed with payment button
    Then I should redirected to the Payment page
    And I click Other payment centers
    Then I should redirect to lbc Dragonpay page

  Examples:
  | amount | Address |
  | 700    |         |