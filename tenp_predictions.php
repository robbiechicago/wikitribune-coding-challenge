<?php 

//get predictions
$url = 'http://custom-env-1.dxh4j28kg4.eu-west-1.elasticbeanstalk.com/api/api.php/predictions/season/1718';
$response = file_get_contents($url);
$predictions = json_decode($response);

// Create an array of user IDs for the select input, with the value = number of predictions.  
$pre_users = array();
foreach ($predictions as $p) {
  if (!array_key_exists($p->user_id, $pre_users)) {
    $pre_users[$p->user_id] = 1;
  } else {
    $pre_users[$p->user_id]++;
  }
}

// For the purposes of this we'll only use users with 160 predictions (ie a full set)
$users = array();
foreach ($pre_users as $k => $v) {
  if ($v == 160) {
    $users[$k] = $k;
  }
}
asort($users);


if (isset($_GET['selected_user'])) {

  include 'tenpredict_pl_teams.php';

  // get games
  $url = 'http://custom-env-1.dxh4j28kg4.eu-west-1.elasticbeanstalk.com/api/api.php/games/season/1718';
  $response = file_get_contents($url);
  $games = json_decode($response);

  //Create a teams array
  $teams = array();

  // loop through predictions and create/update team object
  foreach ($predictions as $pred) {
    
    // get game info
    // only look at the selected user, and only from the 1718 season
    if ($pred->user_id == $_GET['selected_user'] && $pred->season == '1718') {
      foreach ($games as $game) {
        // only PL games
        if ($game->week == $pred->week && $game->game_number == $pred->game && in_array($game->home_team, $tenpredict_pl_teams) && in_array($game->away_team, $tenpredict_pl_teams)) {
          //Check to see if teams exist as class instances
          //conditions should only be met once for each team in league. Creates a class instance for each team
          $home_team = $game->home_team;
          if (!in_array($home_team, $teams)) {
            $$home_team = new Team();
            $$home_team->team_name = $home_team;
            array_push($teams, $home_team);
          }
          $away_team = $game->away_team;
          if (!in_array($away_team, $teams)) {
            $$away_team = new Team();
            $$away_team->team_name = $away_team;
            array_push($teams, $away_team);
          }

          //add the score to the team class instances
          $$home_team->add_result($pred->home_goals, $pred->away_goals);
          $$away_team->add_result($pred->away_goals, $pred->home_goals);
          
        }
      }
    }
  }

  //loop through teams and create league array
  $predicted_league = array();
  foreach ($teams as $team) {
    $predicted_league[] = $$team;
  }
  usort($predicted_league, 'sort_league_by_points');

}

?>