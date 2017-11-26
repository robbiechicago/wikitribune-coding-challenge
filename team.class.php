<?php  

class Team {
  public $total_points = 0;
  public $total_goals_for = 0;
  public $total_goals_against = 0;

  public function add_result($goals_for, $goals_against) {
    if ($goals_for > $goals_against) {
      $total_points ++3;
      $total_goals_for ++$goals_for;
      $total_goals_against ++$goals_against;
    }
  }
  
}

?>