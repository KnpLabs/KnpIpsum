Feature: Knp menu
  In order to add a sexy menus to site
  As a Symfony2 developer
  I need to be able to use KnpMenuBundle

  Scenario: There is a "KnpMenuBundle" link on home page
    Given I am on "/ipsum"
    Then I should see "KnpMenuBundle"

  Scenario: User clicks "KnpMenuBundle" link on home page
    Given I am on "/ipsum"
    When I follow "KnpMenuBundle"
    Then I should see "This is the demo page of Knp"
    And should see "KnpMenuBundle"
    And should see "KnpMenuBundle with John"
    And should see "KnpMenuBundle with Bob"
    And should see "KnpMenuBundle with Bill"

  Scenario: User clicks on ... with Bob link
    Given I am on "/ipsum"
    When I follow "KnpMenuBundle"
    And I follow "KnpMenuBundle with Bob"
    Then I should see "This is the demo page of Bob"
