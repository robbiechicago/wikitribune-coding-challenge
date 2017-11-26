<?php  

class Team {

  //create variables
  public $team_name;
  public $total_games_played;
  public $total_points;
  public $total_goals_for;
  public $total_goals_against;

  //set the variable starting values
  public function __construct() {
    $team_name = '';
    $total_games_played = 0;
    $total_points = 0;
    $total_goals_for = 0;
    $total_goals_against = 0;
  }

  //process results
  public function add_result($goals_for, $goals_against) {
    $this->total_games_played ++;
    $this->total_goals_for += $goals_for;
    $this->total_goals_against += $goals_against;
    if ($goals_for > $goals_against) {
      $this->total_points += 3;
    } elseif ($goals_for == $goals_against) {
      $this->total_points ++;
    }
  }

}

?>