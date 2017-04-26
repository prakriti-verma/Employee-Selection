# Employee Selection Api

Employee Selection Api is a demo application build on WAMP and jquery.
It has 3 parts

  - PHP script for sample data Creation
  - PHP backend for selection best team possible in given budget following the team composition input provided
  - Simple HTML form for providing Budget and team composition constraints

# Assumptions
  - I have assumed Best team possible is about getting maximum number of expierence years within the given budget
  - Length of Ranndom Name is 8 characters
  - Number of years of expierence of Junior(1 - 3 Years), Senior(3 - 10 Years)
  - Salary ranges are Junior (3 - 6 LPA), Senior(5 - 20 LPA)
  
# SetUp
  - Move Employee-selection directory in your localhost
  - Update Database credentials in insertRandom.php &  engineercalc.php
  - Execute insertRandom.php in browser to Create a sample database Table of 5000 employees
  - Execute employeeNum.php in browser to get the input form and on Submission get the best Team Members
