@SponsorAds
Feature: Sponsor Ads
Story: As a OLX user I want to Sponsor my Ad. As a user, I want to access the manage ads page, So that, I can start using Sponsor Ad feature.

  @parallel-scenario
  Scenario: Verify that i am able to access the manage ads page
    Given I am in HomePage
    When I click the login button at home page
    Then I should be in the login page
    And  I enter a registered mobile number
    And I enter a valid password
    And I click the login button
    Then I should be able to log in
    And the landing page is the home page
    And I click the user profile button
    Then I should be in the Manage Ads page

  @parallel-scenario
  Scenario Outline: Verify OLX user should be able to sponsor an ad
    Given I am in ad manage page
    And I click ellipsis button
    Then I should see Item window modal
    And I click Boost ad button on an ad
    Then I see ad boosting modal on screen
    And I click Sponsor Ad
    Then I should see sponsor ad page
    And I input <amount> in the step 2 number field
    And I click Place bid button
    And I choose <duration> on how long my ad will be sponsored on step 3 selection menu
    And I click Set Sponsor Ad Duration
    Then I should see correct price from summary section
    And I should see correct Keywords from summary section
    And I should see correct bid amount from summary section
    And I should see correct duration from summary section
    And I tick the agreement checkbox
    Then I should see the Proceed with payment button should be available to click
    And I click Proceed  with payment
    Then I should see payment page with total summary
    And I should see payment option selection
    When I click OLX Gold for payment
    Then I should see success message with posting date and ad validity

  Examples:
    | amount| duration |
    |150    |7         |





