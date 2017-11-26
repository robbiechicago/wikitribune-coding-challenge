<!DOCTYPE html>
<html>
<head>
  <title>tenpredict PL Tables</title>
  <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <?php 
  include 'team.class.php';
  ?>

  <div id="container">
    <h1>tenpredict.com League Comparison</h1>
    <p>This mini site compares the real Premier League table with one compiled by users' predictions at tenpredict.com.</p>    

    <div style="width:48%; display: inline-block; float: left">
      <h2>Actual Premier League Table</h2>
      <table>
        <tr>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>Played</th>
          <th>Goals For</th>
          <th>Goals Against</th>
          <th>Points</th>
        </tr>
        <?php  
        include 'pl_results.php';
        $n = 1;
        foreach ($actual_league as $team) {
          echo "<tr>";
            echo "<td>".$n."</td>";
            echo "<td>".$team->team_name."</td>";
            echo "<td>".$team->total_games_played."</td>";
            echo "<td>".$team->total_goals_for."</td>";
            echo "<td>".$team->total_goals_against."</td>";
            echo "<td>".$team->total_points."</td>";
          echo "</tr>";
          $n++;
        }
        ?>
      </table>
    </div>

    <div style="width:48%; display: inline-block; float: left">
      <h2>tenpredict predictions</h2>
      <?php  
      include 'tenp_predictions.php';
      ?>
      <form method="GET" action="">
        <select name="selected_user" id="selected_user">
          <option value="">Select a user</option>
          <?php
          foreach ($users as $user) {
            echo '<option value="'.$user.'">'.$user.'</option>';
          }
          ?>
        </select>
        <input type="submit" name="submit">
      </form>

      <?php
      if (isset($_GET['selected_user'])) {
        echo "<table>";
          echo "<tr>";
            echo "<th>&nbsp;</th>";
            echo "<th>&nbsp;</th>";
            echo "<th>Played</th>";
            echo "<th>Goals For</th>";
            echo "<th>Goals Against</th>";
            echo "<th>Points</th>";
          echo "</tr>";

          $n = 1;
          foreach ($predicted_league as $team) {
            echo "<tr>";
              echo "<td>".$n."</td>";
              echo "<td>".$team->team_name."</td>";
              echo "<td>".$team->total_games_played."</td>";
              echo "<td>".$team->total_goals_for."</td>";
              echo "<td>".$team->total_goals_against."</td>";
              echo "<td>".$team->total_points."</td>";
            echo "</tr>";
            $n++;
          }
      }
      ?>
    </div>
  </div>

</body>
</html>