Feature: Browse the Hello World page
  In order to get simple message from application
  As a Symfony2 site user
  I need to be able to get to hello pages through links

  Scenario: User goes through "Hello World" link
    Given I am on "/ipsum"
    When I follow "Template"
    Then the response status code should be 200
    And I should see "Hello World, how are you today"

  Scenario: User opens twigged hello page
    Given I am on "/ipsum/twig/Edgar"
    Then the response status code should be 200
    And I should see "Hello Edgar, how are you today"
