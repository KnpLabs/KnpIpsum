Feature: Templating layer
  In order to get information from user
  As a Symfony2 developer
  I need to be able to use forms

  Scenario: There is a "Forms" link on home page
    Given I am on "/ipsum"
    Then I should see "Forms"

  Scenario: User clicks "Forms" link on home page
    Given I am on "/ipsum"
    When I follow "Forms"
    Then the response status code should be 200
    And I should see "A sample contact form"

  Scenario: User fills and submits contact form
    Given I am on "/ipsum/form"
    When I fill in "Your email:" with "konstantin.kudryashov@knplabs.com"
    And fill in "Your delightful message:" with "test message"
    And press "Send"
    Then the response status code should be 200
    And I should see "Notice: Here I could be sending your"
    And should see "test message"
    And should see "from konstantin.kudryashov@knplabs.com"
