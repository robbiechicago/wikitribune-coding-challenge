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
    foreach ($fixtures as $f) {
      if (!in_array($f->homeTeamName, $teams)) {
        array_push($teams, $f->homeTeamName);
      }
    }


?>