Feature: Doctrine ODM
  In order to persist information in OOP-way using MongoDB
  As a Symfony2 developer
  I need to be able to use Doctrine2 ODM

  Background:
    Given there is no products in collection

  Scenario: There is a "Doctrine ODM [MongoDB]" link on home page
    Given I am on "/"
    Then I should see "Doctrine ODM [MongoDB]"

  Scenario: User clicks "Doctrine ODM [MongoDB]" link on home page
    Given I am on "/"
    When I follow "Doctrine ODM [MongoDB]"
    Then I should see "List of products"
    And should see "List all \"products\" in your collection"
    And should see "Create a new \"product\" entry in your collection"

  Scenario: User sees empty list by default
    Given I am on "/doctrine-odm"
    When I follow "List all \"products\" in your collection"
    Then I should see "There are no products yet!"

  Scenario: User creates a new "product" entry
    Given I am on "/doctrine-odm"
    When I follow "Create a new \"product\" entry in your collection"
    Then I should see "You have created a new Product called \"Lorem"
    And I should see "in a new category called \"Category"
