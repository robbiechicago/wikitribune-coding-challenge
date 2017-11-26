<?php  

    //get fixture data from football-data.org
    $uri = 'http://api.football-data.org/v1/competitions/445/fixtures';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 831c6c170fcd413583d65582484c660d';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $fixtures_full = json_decode($response);
    $fixtures = $fixtures_full->fixtures;

    //Create a teams array
    $teams = array();

    //loop through football-data API data.  Create Team class for each team, and process result for each fixture
    foreach ($fixtures as $f) {

      //Only run if the fixture's status is FINISHED
      if ($f->status == 'FINISHED') {
        //Check to see if teams exist as class instances
        //conditions should only be met once for each team in league. Creates a class instance for each team
        $home_team_name = $f->homeTeamName;
        if (!in_array($home_team_name, $teams)) {
          $$home_team_name = new Team();
          $$home_team_name->team_name = $home_team_name;
          array_push($teams, $home_team_name);
        }
        $away_team_name = $f->awayTeamName;
        if (!in_array($away_team_name, $teams)) {
          $$away_team_name = new Team();
          $$away_team_name->team_name = $away_team_name;
          array_push($teams, $away_team_name);
        }

        //add the score to the team class instances
        $$home_team_name->add_result($f->result->goalsHomeTeam, $f->result->goalsAwayTeam);
        $$away_team_name->add_result($f->result->goalsAwayTeam, $f->result->goalsHomeTeam);
      }
    }

    //loop through teams and create league array
    $actual_league = array();
    foreach ($teams as $team) {
      $actual_league[] = $$team;
    }
    usort($actual_league, 'sort_league_by_points');



    function sort_league_by_points($a, $b) {
      // returns total points sorted in descending order
      if ($a->total_points == $b->total_points) { 
        return 0; 
      }
      return ($a->total_points > $b->total_points) ? -1 : 1;
    }
?>