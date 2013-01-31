Feature: Doctrine ORM
  In order to persist information in OOP-way
  As a Symfony2 developer
  I need to be able to use Doctrine2 ORM

  Background:
    Given there are no things in database

  Scenario: There is a "Doctrine ORM" link on home page
    Given I am on homepage
    Then I should see "Doctrine ORM"

  Scenario: User clicks "Doctrine ORM" link on home page
    Given I am on homepage
    When I follow "Doctrine ORM"
    Then I should see "List of things"
    And should see "List all \"things\" in your database"
    And should see "Create a new \"thing\" entry in your database"
    And should see "Use a custom repository class with custom query methods"

  Scenario: User sees empty list by default
    Given I am on Doctrine ORM page
    When I follow "List all \"things\" in your database"
    Then I should see "There are no things yet!"

  Scenario: User creates a new "thing" entry
    Given I am on Doctrine ORM page
    When I follow "Create a new \"thing\" entry in your database"
    Then I should see "You have created a new Thing called \"Lorem"
    And I should see "in a new category called \"Category"

  Scenario: User uses custom query
    Given I am on Doctrine ORM page
    When I follow "Create a new \"thing\" entry in your database"
    And follow "Use a custom repository class with custom query methods"
    And I fill in "I want the things whose name contains:" with "Lorem"
    And press "Search"
    Then I should see "Lorem"
    And I should see "in category Category"
