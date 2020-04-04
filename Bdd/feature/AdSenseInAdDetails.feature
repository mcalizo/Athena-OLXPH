@adsensedetails
Feature: Ad Sense in Ad Details
Story: A user wants to verify if the Adsense in Ad details page exists. As a user, I want to access the ad details page, So that I can verify if the Adsense was display.

@parallel-scenario
Scenario: Verify that I can see adsense in ad details page image gallery
  Given I am in the ad details page
  When I click photo
  Then I should see a photo being displayed
  And I should able to see the adsense in the bottom part of the image

@parallel-scenario
Scenario: Verify that I can see adsense in ad details page
  Given I am in the ad details page
  Then I should able to see the adsense in the right part of the description
  And I should able to see the adsense in the bottom part of the description






