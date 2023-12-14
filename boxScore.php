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
  
  <?php
   
// Replace 'YOUR_API_KEY' and 'GAME_ID' with your actual API key and the specific game ID
// Assuming you have fetched the game ID from the URL parameter
if (isset($_GET['game_id'])) {
    $gameId = $_GET['game_id'];

    // Replace 'YOUR_API_KEY' with your actual API key
    $api_key = 'cm4garusc6vybbj8k635bd24';
    $api_url = "http://api.sportradar.us/mlb/trial/v7/en/games/{$gameId}/summary.json?api_key={$api_key}";

    // Initialize cURL session
    $ch = curl_init($api_url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session and fetch response data
    $response_json = curl_exec($ch);

    // Check if request was successful
    if ($response_json === false) {
        echo "Error occurred: " . curl_error($ch);
    } else {
        // Decode the JSON response
        $boxScoreData = json_decode($response_json, true);

        if ($boxScoreData !== null && isset($boxScoreData['game']['away']['players']) && isset($boxScoreData['game']['home']['players'])) {

            echo "<h2>" . $boxScoreData['game']['away']['name'] . " Runs: " . $boxScoreData['game']['away']['runs'] . "</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Name</th><th>At Bats</th><th>Hits</th><th>Singles</th><th>Doubles</th><th>Triples</th><th>Home Runs</th><th>Runs Batted In</th><th>Walks</th><th>Strikeouts</th><th>Pitches</th><th>Innings</th><th>Runs Allowed</th><th>Earned Runs</th><th>Pitching Strikeouts</th><th>ERA</th></tr>";

            foreach ($boxScoreData['game']['away']['players'] as $player) {
                echo "<tr>";
                echo "<td>" . $player['preferred_name'] . " " . $player['last_name'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['ab'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['onbase']['h'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['onbase']['s'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['onbase']['d'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['onbase']['t'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['onbase']['hr'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['rbi'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['onbase']['bb'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['outs']['ktotal'] . "</td>";
                echo "<td>" . $player['statistics']['pitching']['overall']['pitch_count'] . "</td>";
                echo "<td>" . $player['statistics']['pitching']['overall']['ip_2'] . "</td>";
                echo "<td>" . $player['statistics']['pitching']['overall']['runs']['total'] . "</td>";
                echo "<td>" . $player['statistics']['pitching']['overall']['runs']['earned'] . "</td>";
                echo "<td>" . $player['statistics']['pitching']['overall']['outs']['ktotal'] . "</td>";
                echo "<td>" . $player['statistics']['pitching']['overall']['era'] . "</td>";
                echo "</tr>";

                echo "</tr>";
            }
            echo "</table>";

            echo "<h2>" . $boxScoreData['game']['home']['name'] . " Runs: " . $boxScoreData['game']['home']['runs'] . "</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Name</th><th>At Bats</th><th>Hits</th><th>Singles</th><th>Doubles</th><th>Triples</th><th>Home Runs</th><th>Runs Batted In</th><th>Walks</th><th>Strikeouts</th><th>Pitches</th><th>Innings</th><th>Runs Allowed</th><th>Earned Runs</th><th>Pitching Strikeouts</th><th>ERA</th></tr>";

            foreach ($boxScoreData['game']['home']['players'] as $player) {
                echo "<tr>";
                echo "<td>" . $player['preferred_name'] . " " . $player['last_name'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['ab'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['onbase']['h'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['onbase']['s'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['onbase']['d'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['onbase']['t'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['onbase']['hr'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['rbi'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['onbase']['bb'] . "</td>";
                echo "<td>" . $player['statistics']['hitting']['overall']['outs']['ktotal'] . "</td>";
                echo "<td>" . $player['statistics']['pitching']['overall']['pitch_count'] . "</td>";
                echo "<td>" . $player['statistics']['pitching']['overall']['ip_2'] . "</td>";
                echo "<td>" . $player['statistics']['pitching']['overall']['runs']['total'] . "</td>";
                echo "<td>" . $player['statistics']['pitching']['overall']['runs']['earned'] . "</td>";
                echo "<td>" . $player['statistics']['pitching']['overall']['outs']['ktotal'] . "</td>";
                echo "<td>" . $player['statistics']['pitching']['overall']['era'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<a href='homePage.php'><button>Home</button></a>";

        } else {
            echo "Error decoding JSON data.";
        }
    }

    // Close cURL session
    curl_close($ch);
} else {
    echo "No game ID specified.";
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
