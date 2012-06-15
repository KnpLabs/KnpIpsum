Feature: Pagerfanta
  In order to split items to numbered pages
  As a Symfony2 developer
  I need to be able to use paginator library like Pagerfanta

  Background:
    Given there are 20 things in database

  Scenario: There is a "KnpPaginatorBundle" link on home page
    Given I am on "/"
    Then I should see "KnpPaginatorBundle"

  Scenario: User clicks "KnpPaginatorBundle" link on home page
    Given I am on "/"
    When I follow "KnpPaginatorBundle"
    Then I should see "Paginated list of things"

  Scenario: User sees pagination
    Given I am on "/"
    When I follow "KnpPaginatorBundle"
    Then I should see ">"
    And should see "Lorem #6"
    And should see ">>"

  Scenario: User opens second page
    Given I am on "/"
    When I follow "KnpPaginatorBundle"
    And follow "2"
    Then I should see "Lorem #10"
