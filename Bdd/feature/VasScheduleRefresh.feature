@VasScheduleRefresh
Feature: Schedule Refresh
Story:A user wants to use the Schedule Refresh Feature. As a user, I want to access the manage ads page, So that, I can start using Schedule Refresh Feature.

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
  Scenario Outline: Verify that i am able to use the schedule refresh feature using OLX Gold
  Given I am in Manage ads page
    When I click the Refresh Button
    Then I should able to see the modal with refresh options
    And I click Schedule ad refresh date Button
    Then I should be redirected to Scheduled Refresh page
    And I choose Refresh Ad every <refreshAdEvery> in dropdown
    And I choose Do this <doThis> in dropdown
    And I check the Terms and Conditions
    And I click Confirm refresh schedule for this ad and proceed with payment button
    Then I should redirected to the Payment page
    And I click OLX Gold for payments
    Then I should be redirected to success payment page

  Examples:
  |refreshAdEvery | doThis   |
  | 3 days        | 7 times  |

  @parallel-scenario
  Scenario Outline: Verify that i am able to use the schedule refresh feature using Credit Card
    Given I am in Manage ads page
    When I click the Refresh Button
    Then I should able to see the modal with refresh options
    And I click Schedule ad refresh date Button
    Then I should be redirected to Scheduled Refresh page
    And I choose Refresh Ad every <refreshAdEvery> in dropdown
    And I choose Do this <doThis> in dropdown
    And I check the Terms and Conditions
    And I click Confirm refresh schedule for this ad and proceed with payment button
    Then I should redirected to the Payment page
    And I click Credit Card
    Then I should redirected to the BDO page

  Examples:
    |refreshAdEvery | doThis |
    | 4 days        | 2 times|

  @parallel-scenario
  Scenario Outline: Verify that i am able to use the schedule refresh feature using Paypal
    Given I am in Manage ads page
    When I click the Refresh Button
    Then I should able to see the modal with refresh options
    And I click Schedule ad refresh date Button
    Then I should be redirected to Scheduled Refresh page
    And I choose Refresh Ad every <refreshAdEvery> in dropdown
    And I choose Do this <doThis> in dropdown
    And I check the Terms and Conditions
    And I click Confirm refresh schedule for this ad and proceed with payment button
    Then I should redirected to the Payment page
    And I click Paypal
    Then I should redirected to the Paypal page

  Examples:
    |refreshAdEvery | doThis  |
    | 1 day         | 4 times |

  @parallel-scenario @schedule
  Scenario Outline: Verify that i am able to use the schedule refresh feature using Credit card via Paypal
    Given I am in Manage ads page
    When I click the Refresh Button
    Then I should able to see the modal with refresh options
    And I click Schedule ad refresh date Button
    Then I should be redirected to Scheduled Refresh page
    And I choose Refresh Ad every <refreshAdEvery> in dropdown
    And I choose Do this <doThis> in dropdown
    And I check the Terms and Conditions
    And I click Confirm refresh schedule for this ad and proceed with payment button
    Then I should redirected to the Payment page
    And I click Credit Card via Paypal
    Then I should redirected to the Paypal page

  Examples:
    |refreshAdEvery | doThis  |
    | 5 days        | 5 times |

  @parallel-scenario
  Scenario Outline: Verify that i am able to use the schedule refresh feature using ATM /Debit Card
    Given I am in Manage ads page
    When I click the Refresh Button
    Then I should able to see the modal with refresh options
    And I click Schedule ad refresh date Button
    Then I should be redirected to Scheduled Refresh page
    And I choose Refresh Ad every <refreshAdEvery> in dropdown
    And I choose Do this <doThis> in dropdown
    And I check the Terms and Conditions
    And I click Confirm refresh schedule for this ad and proceed with payment button
    Then I should redirected to the Payment page
    And I click ATM Debit Card
    Then I should redirected to the Pesopay page

  Examples:
    |refreshAdEvery |  doThis |
    | 3 days        | 7 times |

  @parallel-scenario
  Scenario Outline: Verify that i am able to use the schedule refresh feature using GCash
    Given I am in Manage ads page
    When I click the Refresh Button
    Then I should able to see the modal with refresh options
    And I click Schedule ad refresh date Button
    Then I should be redirected to Scheduled Refresh page
    And I choose Refresh Ad every <refreshAdEvery> in dropdown
    And I choose Do this <doThis> in dropdown
    And I check the Terms and Conditions
    And I click Confirm refresh schedule for this ad and proceed with payment button
    Then I should redirected to the Payment page
    And I click GCash
    Then I should be redirected to the dragonpay page

  Examples:
    |refreshAdEvery |  doThis |
    | 7 days        | 4 times |


