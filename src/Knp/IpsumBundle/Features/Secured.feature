Feature: Security
  In order to hide admin tools from anonymous users
  As a Symfony2 developer
  I need to be able to use security component

  Scenario: User clicks "Security" link on home page
    Given I am on homepage
    When I follow "Security"
    Then I should see "Simple page only for authenticated users"

  Scenario Outline: User logins
    Given I am not logged in
    And I am on Secured page
    When I follow "Secured page for admins only"
    And I fill in "Username" with "<username>"
    And fill in "Password" with "<password>"
    And press "LOGIN"
    Then I should see "<response>"

    Examples:
      | username | password  | response                          |
      | user     | userpass  | Access Denied                     |
      | admin    | adminpass | This page only viewable by Admins |
