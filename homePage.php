<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MLB Live Updates</title>
  <link rel="stylesheet" href="homePageLayout.css">
</head>
<body>
  <header>
    <h1>Major League Baseball Live Updates</h1>
    <nav>
      <ul>
        <li><a href="homePage.php">Home</a></li>
        <li><a href="teams.php">Team Rosters</a></li>
        <li><a href="standings.php">Standings</a></li>
        <li><a href="login.php">Login to MLB</a></li>
      </ul>
    </nav>
  </header>
  <br>
  <br>
  <br>
  <br>
  <form method="GET">
    <label for="date">Select Date:</label>
    <select name="date" id="date">
    <?php
      $currentDate = date("Y/m/d");
      $startDate = date("Y/01/01");
      $date = new DateTime($currentDate);
      $start = new DateTime($startDate);
      $interval = new DateInterval('P1D');
      $dateRange = new DatePeriod($start, $interval, $date);

      foreach ($dateRange as $date) {
        echo "<option value=\"" . $date->format("Y/m/d") . "\">" . $date->format("Y/m/d") . "</option>";
      }
      ?>
    </select>
    <input type="submit" value="Show Game">
  </form>

  <?php
    if (isset($_GET['date'])) {
        $selectedDate = $_GET['date'];
  
          $api_url = "http://api.sportradar.us/mlb/trial/v7/en/games/{$selectedDate}/schedule.json?api_key=cm4garusc6vybbj8k635bd24";
          echo "<br>";
         $ch = curl_init($api_url);
         
         curl_setopt($ch, CURLOPT_HTTPGET, true);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $response_json = curl_exec($ch);
         curl_close($ch);
         $response=json_decode($response_json, true);
         $data = $response['response']['data'][0];
         // var_dump($response['games']);
         foreach($response['games'] as $game){
        //  var_dump($game['home']['name']);
        //  var_dump($game['away']['name']);
        //  echo "<br>------------------------------------------------------------------<br>";
        }

        if (isset($response['games'])) {
          echo "<h2>Games on {$selectedDate}</h2>";
          echo "<table border='1'>";
          echo "<tr><th>Home Team</th><th>Away Team</th><th>Venue</th><th>Box Score</th></tr>";
          foreach ($response['games'] as $game) {
              echo "<tr>";
              echo "<td>" . $game['home']['name'] . "</td>";
              echo "<td>" . $game['away']['name'] . "</td>";
              echo "<td>" . $game['venue']['name'] . "</td>";
              // Add a column with a button linking to the 'boxScore.php' page for each game
              echo "<td><a href='boxScore.php?game_id=" . $game['id'] . "'><button>Box Score</button></a></td>";
              echo "</tr>";
          }
          echo "</table>";
      } else {
          echo "<p>No games found for {$selectedDate}</p>";
      }
  }
  ?>
<br>
<br>

<br>
<br>
<br>
  <footer>
    <p>&copy; 2023 MLB Live Updates</p>
  </footer>
</body>
</html>
