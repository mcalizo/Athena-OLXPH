@addetails
Feature: Ad Details Page
Story: A user wants to examine a specific item in ad details page. As a user, I want to access the ad details page, So that I can get more information about the specific item on OLX.

  @parallel-scenario @searching
  Scenario Outline: Verify that the ad details page is accessible and ad information is displayed
  Given I am in HomePage
    When I input <searchKeyword> in the search bar in home page
    And I input <locationKeyword> in the location search bar in home page
    And I select <locationKeyword> from the location dropdown in home page
    And I click the search button in home page
    Then I should see results about <searchKeyword> in <locationKeyword>
    And the landing page is the ad listings page
    When I click first item on the listing
    Then the landing page should be the ad details page of that item
    And I should see the ad title
    And I should see the ad price
    And I should see the ad description
    And I should see the condition field
    And I should see the location field
    And I should see the date posted field
    And I should see the category field
    And I should see the seller user card avatar
    And I should see the name of the seller
    And I should see the avatar of the seller
    And I should see the location of the seller
    And I should see the member since field
    And I should see the last login field
    And I should see the last access from field
    And I should see the view more ads from this user link

  Examples:
  | searchKeyword | locationKeyword |
  | Iphone | Muntinlupa |

  @parallel-scenario
  Scenario Outline: Verify that I can see photos in ad details page
    Given I am in HomePage
    When I input <searchKeyword> in the search bar in home page
    And I input <locationKeyword> in the location search bar in home page
    And I select <locationKeyword> from the location dropdown in home page
    And I click the search button in home page
    Then I should see results about <searchKeyword> in <locationKeyword>
    And the landing page is the ad listings page
    When I click first item on the listing
    Then the landing page should be the ad details page of that item
    When I click photo
    Then I should see a photo being displayed
    And I should see the exit button at the top right side of the screen
    And I should see the photo navigation bullets below the photo
    When I click photo navigation arrows
    Then the photo should change
    And if I click the photo navigation bullet
    Then the photo should change
    And if I click the exit button
    Then the landing page should be the ad details page

  Examples:
  | searchKeyword | locationKeyword |
  | Iphone        | Muntinlupa      |

  @parallel-scenario
  Scenario: Verify that I cannot send a chat to the seller if I am logged out
    Given I am in the ad details page
    And I am a logged out user
    When I click chat seller button
    Then I should see the login modal
    And I should be asked to log in

  @parallel-scenario
  Scenario: Verify that I cannot see the complete mobile number of the seller if I am logged out
    Given I am in the ad details page
    And I am a logged out user
    When I click mobile number button
    Then I should see the login modal
    And I should be asked to log in

  @parallel-scenario @chatmodal
  Scenario Outline: Verify that I can log in via the modal when I am logged out
    Given I am in HomePage
    When I input <searchKeyword> in the search bar in home page
    And I click the search button in home page
    Then the landing page is the ad listings page
    When I click an ad in listing page
    Then I should be redirected to the ad details page
    When I click chat seller button
    Then the login modal is displayed
    When I enter a buyer mobile number in login modal
    And I enter a buyer password in login modal
    And I click the login button in login modal
    And the send message modal is displayed
   Then I should be able to send message to seller

  Examples:
  | searchKeyword |
  | Breast pump slightly use used only for 3 months by OLX |

  @parallel-scenario
  Scenario: Verify that I can log in via the modal when I am logged out
    Given I am in the ad details page
    And I am a logged out user
    When I click mobile number button
    Then the login modal is displayed
    When I enter a registered mobile number in login modal
    And I enter a valid password in login modal
    And I click the login button in login modal
    Then I should be able to log in
    And the landing page is the ad details page
    And I should be able to see the complete mobile number of the seller

  @parallel-scenario @addetailsShowChat
  Scenario Outline: Verify that chat modal to the seller is displayed if I am logged in
    Given I am in HomePage
    And I click the login button at home page
    When I enter a registered email address
    And I enter a valid password
    And I click the login button
    When I click the OLX logo
    Then I should be redirected to the home page
    When I input <searchKeyword> in the search bar in home page
    And I click the search button in home page
    Then I should see results
    When I click an ad in listing page
    Then I should be redirected to the ad details page
    When I click chat seller button
    And the send message modal is displayed

    Examples:
    | searchKeyword |
    | iphone        |

  @parallel-scenario @addetailsShowNumber
  Scenario Outline: Verify that complete number of the seller is displayed if I am logged in
    Given I am in HomePage
    And I am logged in
    When I click the OLX logo
    Then I should be redirected to the home page
    When I input <searchKeyword> in the search bar in home page
    And I click the search button in home page
    Then I should see results
    When I click an ad in listing page
    Then I should be redirected to the ad details page
    When I click mobile number button when logged in
    Then the landing page should be the ad details page
    And the complete mobile number of the seller is displayed

    Examples:
    | searchKeyword |
    | iphone        |

  @parallel-scenario
  Scenario: Verify that the seller profile page is accessible via seller avatar
    Given I am in the ad details page
    And I click avatar of the seller
    Then the landing page should be the seller profile ads page

  @parallel-scenario
  Scenario: Verify that the seller profile page is accessible via seller name
    Given I am in the ad details page
    And I click name of the seller
    Then the landing page should be the seller profile ads page

  @parallel-scenario
  Scenario: Verify that the seller profile page is accessible via seller view more ads
    Given I am in the ad details page
    And I click view more ads from this user link
    Then the landing page should be the seller profile ads page

  @parallel-scenario @skipScenario
  Scenario: Verify that the suggestion to browse more is displayed
    Given I am in the ad details page
    Then the browse more section is displayed
    And the keywords are displayed

  @parallel-scenario
  Scenario: Verify that the breadcrumbs is accessible
    Given I am in the ad details page
    Then the breadcrumbs should be displayed
    And the links are properly redirected to its pages

  @parallel-scenario
  Scenario: Verify that the back to results button is accessible
    Given I am in the ad details page
    And I click back to results button
    Then the landing page should be the corresponding ad listing page

  @parallel-scenario @skipScenario
  Scenario Outline: Verify that the next ad button is accessible
    Given I am in HomePage
    When I input <searchKeyword> in the search bar in home page
    And I click the search button in home page
    Then I should see results
    When I click an ad in listing page
    Then I should be redirected to the ad details page
    And I click next ad button
    Then the landing page should be the next ad from the list

    Examples:
    | searchKeyword |
    | iphone        |

