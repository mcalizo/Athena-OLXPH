@login
Feature: Login page
Story: A user wants to login to OLX. As a user, I want to login to OLX, So that I can start buying and selling on OLX

  @parallel-scenario
  Scenario: Verify that the login page is accessible
    Given I am in HomePage
    When I click the login button at home page
    Then I should be in the login page

  @parallel-scenario
  Scenario: Verify that I am redirected to manage ads page upon login
    Given I am in HomePage
    When I click the login button at home page
    Then I should be in the login page
    And  I enter a registered mobile number
    And I enter a valid password
    And I click the login button
    Then I should be able to log in
    And I should be redirected to the manage ad page

  @parallel-scenario
  Scenario: Verify that a user is able to log in using a registered mobile number
    Given I am in the login page
    When I enter a registered mobile number at login page
    And I enter a valid password
    And I click the login button
    Then I should be able to log in
    And I should be redirected to the manage ad page

  @parallel-scenario
  Scenario: Verify that a user is able to log in using a registered email address
    Given I am in the login page
    When I enter a registered email address
    And I enter a valid password
    And I click the login button
    Then I should be able to log in
    And I should be redirected to the manage ad page

  @parallel-scenario @login1
  Scenario: Verify that a user is unable to log in using a registered mobile number with incorrect password
  Given I am in the login page
  When I enter a registered mobile number
  And I enter an invalid password
  And I click the login button
  Then I should not be able to log in
  And an error message is displayed for invalid username and password

  @parallel-scenario @login1
  Scenario: Verify that a user is unable to log in using a registered email address with incorrect password
  Given I am in the login page
  When I enter a registered email address
  And I enter an invalid password
  And I click the login button
  Then I should not be able to log in
  And an error message is displayed for invalid username and password

  @parallel-scenario @login1
  Scenario: Verify that a user is unable to log in using an unregistered mobile number
  Given I am in the login page
  When I enter an unregistered mobile number
  And I enter an password
  And I click the login button
  Then I should not be able to log in
  And an error message is displayed for invalid username and password

  @parallel-scenario @login1
  Scenario: Verify that a user is unable to log in using an unregistered email address
  Given I am in the login page
  When I enter an unregistered email address
  And I enter an password
  And I click the login button
  Then I should not be able to log in
  And an error message is displayed for invalid username and password

  @parallel-scenario @skipScenario
  Scenario: Verify that a user is able to log in via facebook
  Given I am in the login page
  When I click the login via facebook button
  And I enter email at facebook login page
  And I enter password at facebook login page
  And I click login button at facebook login page
  Then I should be able to log in
  And I should be redirected to the manage ad page

  @parallel-scenario @skipScenario
  Scenario: Verify that a user is able to log in via google
  # Take note that permissions are only granted once;
  Given I am in the login page
  When I click the login via google button
  And I enter registered google email
  And I click next button
  And I enter google email password
  And I click google login button
  Then I should be able to log in
  And I should be redirected to the manage ad page





