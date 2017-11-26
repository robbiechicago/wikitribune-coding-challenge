<!DOCTYPE html>
<html>
<head>
  <title>tenpredict PL Tables</title>
</head>
<body>

  <div id="container">
    <h1>Hello world!</h1>
  </div>

  <table>
    <tr>
      <th>&nbsp;</th>
      <th>Played</th>
      <th>Goals For</th>
      <th>Goals Against</th>
      <th>Points</th>
    </tr>
    <?php  
    include 'pl_results.php';
    foreach ($actual_league as $team) {
      echo "<tr>";
        echo "<td>".$team->team_name."</td>";
        echo "<td>".$team->total_games_played."</td>";
        echo "<td>".$team->total_goals_for."</td>";
        echo "<td>".$team->total_goals_against."</td>";
        echo "<td>".$team->total_points."</td>";
      echo "</tr>";
    }
    ?>
  </table>

</body>
</html>