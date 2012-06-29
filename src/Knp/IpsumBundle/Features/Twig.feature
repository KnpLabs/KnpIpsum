Feature: Twig templates
  In order to maintain a sexy view layer
  As a Symfony2 developer
  I need to be able to use Twig

  Scenario: User clicks "Template" link on home page
    Given I am on homepage
    When I follow "Template"
    Then I should see "Hello World, how are you today"

  Scenario: User loads /twig/Edgar page
    When I go to "/twig/Edgar"
    Then I should see "Hello Edgar, how are you today"