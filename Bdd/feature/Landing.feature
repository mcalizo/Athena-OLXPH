@Landing
Feature: Landing Page
Story: A Unconfirmed User wants to activate his account on marketplace. As a user, I want to access the landing page, So that I can activate my account on marketplace

  @parallel-scenario @Landing
  Scenario: Verify that the unconfirmed user can activate his account
    Given I am in HomePage
    When I access the olx.ph/buynow
    Then I should be able see activate your account button
    And I click the activate your account button
    Then I should be able to see full name field
    And I should be able to filled out the name field
    Then I should be able to see email address field
    And I should be able to filled out the email address field
    Then I should be able to see address 1 field
    And I should be able to filled out the address 1 field
    Then I should be able to see address 2 field
    And I should be able to filled out the address 2 field
    Then I should be able to see province field
    And I should be able to choose a province in the drop down menu
    Then I should be able to see city/municipality field
    And I should be able to choose a city in the drop down menu
    Then I should be able to see zip code field
    And I should be able to filled out the zip code field
    Then I should be able to see bank name field
    And I should be able to filled out bank name field
    Then I should be able to see account number field
    And I should be able to filled out account number field
    And I check the terms and condition
    And I click the submit button
    Then I should be able to see congratulations

  @parallel-scenario @Landing
    Scenario: Verify user can access sell form after activation
    Given I am in landing page
    When I click the Ready to sell? link
    Then I should be able to redirect to sell form

  @parallel-scenario @Landing
  Scenario: Verify that unenrolled user can Sign up quick and friendly
    Given I am in HomePage
    When I access the olx.ph/buynow
    Then I should be able see sign up button
    And I click the sign up button
    Then I should be able to see what is your full name field
    And I should able to filled out what is your full name field
    Then I should be able to see what's your email field
    And I should be able to filled out what's your email field
    Then I should be able to see what's your contact number field
    And I should be able to filled out what's your contact number field
    Then I should be able to see submit button
    And I should be able to see Done! Your information was sent perfectly.


  @parallel-scenario @Landing
  Scenario: Verify that logout user need to login first to access the landing page
    Given I am in HomePage
    When I access the olx.ph/buynow
    Then I should be able to redirect to login page




