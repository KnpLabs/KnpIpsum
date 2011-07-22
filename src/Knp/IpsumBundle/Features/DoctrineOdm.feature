Feature: Doctrine ODM
  In order to persist information in OOP-way using MongoDB
  As a Symfony2 developer
  I need to be able to use Doctrine2 ODM

  Background:
    Given there is no things in database

  Scenario: There is a "Doctrine ODM [MongoDB]" link on home page
    Given I am on "/"
    Then I should see "Doctrine ODM [MongoDB]"

  Scenario: User clicks "Doctrine ODM [MongoDB]" link on home page
    Given I am on "/"
    When I follow "Doctrine ODM [MongoDB]"
    Then I should see "List of things"
    And should see "List all \"things\" in your database"
    And should see "Create a new \"thing\" entry in your database"

  Scenario: User sees empty list by default
    Given I am on "/doctrine-odm"
    When I follow "List all \"things\" in your database"
    Then I should see "There are no things yet!"

  Scenario: User creates a new "thing" entry
    Given I am on "/doctrine-odm"
    When I follow "Create a new \"thing\" entry in your database"
    Then I should see "You have created a new Thing called \"Lorem"
    And I should see "in a new category called \"Category"
