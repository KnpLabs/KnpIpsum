Feature: Sensio FrameworkExtra
  In order to be more RAD
  As a Symfony2 developer
  I need to be able to use annotations to define routes

  Scenario: User clicks "SensioFrameworkExtraBundle" link on home page
    Given I am on homepage
    When I follow "SensioFrameworkExtraBundle"
    Then I should see "In the current controller you are using SensioFrameworkExtraBundle"
