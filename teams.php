<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MLB League Depth Chart</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>

  <meta charset="UTF-8">
  <title>MLB Live Updates</title>
  <link rel="stylesheet" href="homePageLayout.css">
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
<body>

<?php

$api_key = 'cm4garusc6vybbj8k635bd24';

$api_url = "http://api.sportradar.us/mlb/trial/v7/en/league/depth_charts.json?api_key={$api_key}";

$ch = curl_init($api_url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response_json = curl_exec($ch);

if ($response_json === false) {
    echo "Error occurred: " . curl_error($ch);
} else {
    $depthChartData = json_decode($response_json, true);

    if ($depthChartData !== null && isset($depthChartData['teams'])) {
        foreach ($depthChartData['teams'] as $team) {
            echo "<h2>" . $team['name'] . "</h2>";
            
            if (isset($team['positions'])) {
                echo "<table>";
                echo "<tr><th>Name</th><th>Position</th></tr>";
                foreach ($team['positions'] as $position) {
                    if (isset($position['players'])) {
                        foreach ($position['players'] as $player) {
                            echo "<tr><td>{$player['preferred_name']} {$player['last_name']}</td><td>{$player['position']}</td></tr>";
                        }
                    }
                }
                echo "</table>";
            } else {
                echo "<p>No player information available for this team.</p>";
            }
        }
    } else {
        echo "<p>No team information available.</p>";
    }
}

curl_close($ch);

?>

</body>
</html>
