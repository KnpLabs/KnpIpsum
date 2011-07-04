Feature: Templating layer
  In order to maintain sexy view layer
  As a Symfony2 user
  I need to be able to use Twig

  Scenario: There is a "Template" link on home page
    Given I am on "/ipsum"
    Then I should see "Template"

  Scenario: User clicks "Template" link on home page
    Given I am on "/ipsum"
    When I follow "Template"
    Then the response status code should be 200
    And I should see "Hello World, how are you today"

  Scenario: User opens /ipsum/twig/Edgar
    When I go to "/ipsum/twig/Edgar"
    Then the response status code should be 200
    And I should see "Hello Edgar, how are you today"
