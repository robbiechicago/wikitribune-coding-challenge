# wikitribune-coding-challenge
##Coding challenge for WikiTribune job application

For the coding challenge I have taken inspiration from one of the examples given in the brief, and added an extra twist.  

###Sources

####football-data.org

[football-data.org](http://api.football-data.org/index) is a restful football API aimed at developers building football data based apps.  It's data is exhaustive, with game data for a large selection of leagues and competitions.

####tenpredict.com

[tenpredict.com](http://www.tenpredict.com) is my own website, a football predictions game.  Each weekend, players are given ten games to predict the result and score on, as well as allocating up to ten points against each prediction in order to maximise returns.  

###Coding challenge

####API element

My app extracts result data from the football-data.org API and calculates the current Premier League table.  It then gets games and predictions data from tenpredict.com and performs a similar caluclation on predicted results and scores, thus showing what the Premier League table would look like had each prediction come true.  _(Since tenpredict.com only uses weekend fixtures, there are fewer predictions for each team than actual games)_.

####Object Oriented element

I created a simple Team class that was used to retain key properies for each club ($team\_name, $total\_games\_played, $total\_points, $total\_goals\_for and $total\_goals\_against), and a method to take the home and away points for each game and update these properties accordingly.  After looping through all the results, each instance of the Team object contained the appropritate totals for the season so far.

####Unit tests

Unfortunatley I have very little experience of setting up and and running unit tests, and while I spent a considerable time attempting to integrate tests within this project I have been unsuccessful.  Having installed PHPUnit onto my computer, it then became apparent that the version of PHP installed (5.6) is not sufficiently advanced to work.  Attempts to upgrade the PHP version failed, so I was unable to run tests.  Similarly, as my Team class does not return anything, just maintains properties, I did not find examples of tests that asses the value of these properties after the test.  As such, the provided test may well be quite wide of the mark.  With more time I would have spent time working through an online course to get up to speed (and indeed plan to do this), but the need to submit this challenge reasonably promptly made me abandon my attempts before this was posssible.

###File structure

The app can be run by extracting the files and using a PHP server environment such as MAMP.  

* index.php is the HTML structure and top-level PHP.
* pl_results.php gets the football-data.org data, loops through it and runs the results through the Team class.
* tenp_predictions.php does the same for tenpredict.com data.
* team.class.php is the Team class.
* team.test.php is my attempt at unit testing.
* there is a tiny amount of styling in style.css

(NB - on uploading this .md README file it seems unable to render properly - apologies!)
