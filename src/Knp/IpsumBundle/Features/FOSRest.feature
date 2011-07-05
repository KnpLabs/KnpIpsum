Feature: FOS Rest
  In order to support different outpus with single view
  As a Symfony2 developer
  I need to be able to use FOSRestBundle

  Background:
    Given there are 3 timed things in database

  Scenario: There is a "FOSRestBundle" link on home page
    Given I am on "/ipsum"
    Then I should see "FOSRestBundle"

  Scenario: User clicks "FOSRestBundle" link on home page
    Given I am on "/ipsum"
    When I follow "FOSRestBundle"
    Then I should see "Simple page using FOSRestBundle"

  Scenario: User sees 3 things in html format
    Given I am on "/ipsum"
    When I follow "FOSRestBundle"
    Then I should see "Lorem #0"
    And should see "Lorem #1"
    And should see "Lorem #2"

  Scenario: User sees 3 things in json format
    Given I am on "/ipsum"
    When I follow "FOSRestBundle"
    And follow "JSON"
    Then the response should contain "\"name\":\"Lorem #0\""
    And the response should contain "\"name\":\"Lorem #1\""
    And the response should contain "\"name\":\"Lorem #2\""
