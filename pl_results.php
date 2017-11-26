<?php  
    include'team.class.php';

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
    foreach ($fixtures as $f) {
      //Check to see if teams exist as class instances
      if (!in_array($f->homeTeamName, $teams)) {
        $home_team_name = $f->homeTeamName;
        $$team_name = new Team();
        array_push($teams, $home_team_name);
      }
      if (!in_array($f->awayTeamName, $teams)) {
        $away_team_name = $f->awayTeamName;
        $$team_name = new Team();
        array_push($teams, $away_team_name);
      }
      $$team_name->add_result($f->)
    }


?>