@AdManagement
Feature: Ad Manage page
Story: As a OLX user I want to Manage my Ads. As a user, I want to access the manage ads page,So that, I can start managing my ads.

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