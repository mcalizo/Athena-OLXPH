@registration
Feature: Registration page
Story: A new user wants to register on OLX. As a new user, I want to create an account, So that I can start buying and selling on OLX

  @parallel-scenario
  Scenario: Verify that the registration page is accessible
    Given I am in HomePage
    When I click the login button at home page
    Then I should be in the login page
    And the register text link is present
    When I click the register text link
    Then I should be able to access the registration page

  @parallel-scenario @skipScenario
  Scenario: Verify that an account is created using an unregistered mobile number
    Given I am in the registration page
    When I enter a name
    And I enter a not register valid mobile number
    #And I tick the terms of use
    And I click the register button
    Then the system should create a new account
    And the landing page is the registration-confirmation page

  @parallel-scenario
  Scenario: Verify that an account is not created using a registered mobile number
    Given I am in the registration page
    When I enter a name
    And I enter a registered mobile number
    #And I tick the terms of use
    And I click the register button
    Then the system should not create a new account for registered mobile number
    And the landing page is the registration page
    And an error message is displayed

  @parallel-scenario
  Scenario: Verify that an account is not created using an invalid mobile number
    Given I am in the registration page
    When I enter a name
    And I enter an invalid mobile number
    And I enter disired password
    And I repeat enter disred password to confirm
    And I click the register button
    Then the system should not create a new account for invalid mobile number
    And the landing page is the registration page
    And an error message is displayed for invalid mobile number
