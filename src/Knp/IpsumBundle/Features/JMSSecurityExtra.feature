Feature: JMS SecurityExtra
  In order to hide admin tools from anonymous users with RAD
  As a Symfony2 developer
  I need to be able to use security component with annotations

  Scenario: There is a "JMSSecurityExtraBundle" link on home page
    Given I am on "/"
    Then I should see "JMSSecurityExtraBundle"

  Scenario: User clicks "JMSSecurityExtraBundle" link on home page
    Given I am on "/"
    When I follow "JMSSecurityExtraBundle"
    Then I should see "Login"

  Scenario Outline: User logins
    Given I am not logged in
    And I am on "/"
    When I follow "JMSSecurityExtraBundle"
    And I fill in "Username" with "<username>"
    And fill in "Password" with "<password>"
    And press "LOGIN"
    And I follow "Secured page for admin only"
    Then I should see "<secured page content>"

    Examples:
      | username | password  | secured page content                           |
      | user     | userpass  | Access Denied                                  |
      | admin    | adminpass | If you see this, you are logged in as an admin |