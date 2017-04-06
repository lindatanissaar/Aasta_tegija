Feature: Search
  In order to find information about Estonia
  As a website user
  I need to be able to search for phrase "Eesti"

  @javascript
  Scenario: Search for a word that exists
    Given I am on "/"
    When I fill in "sb_form_q" with "Eesti"
    And I press "go"
    Then I should see "Avaleht"

#    When I fill in "sb_form_q" with "Eesti"
#    And I press "go"
#    Then I should see "Avaleht"