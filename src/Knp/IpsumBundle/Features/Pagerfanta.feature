Feature: Pagerfanta
  In order to split items to numbered pages
  As a Symfony2 developer
  I need to be able to use paginator library like Pagerfanta

  Background:
    Given there are 20 things in database

  Scenario: There is a "Pagerfanta" link on home page
    Given I am on "/ipsum"
    Then I should see "Pagerfanta"

  Scenario: User clicks "Pagerfanta" link on home page
    Given I am on "/ipsum"
    When I follow "Pagerfanta"
    Then I should see "Paginated list of things"

  Scenario: User sees pagination
    Given I am on "/ipsum"
    When I follow "Pagerfanta"
    Then I should see "Previous"
    And should see "Lorem #6"
    And should see "Next"

  Scenario: User opens second page
    Given I am on "/ipsum"
    When I follow "Pagerfanta"
    And follow "2"
    Then I should see "Lorem #10"
