<!DOCTYPE html>
<html lang="en">
<head>
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
    <title>Team Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <link rel="stylesheet" href="homePageLayout.css">
</head>
<body>

    <main>
        <br>
        <table>
            <tr>
                
                <th>City</th>
                <th>Name</th>
                <th>Wins</th>
                <th>Losses</th>
                <th>Games Back</th>
                <th>Divisional Rank</th>
            </tr>
            <?php
            $jsonData = file_get_contents('teams.json');
            $teamsData = json_decode($jsonData, true);

            if (json_last_error() === JSON_ERROR_NONE && isset($teamsData['teams'])) {
                $teams = $teamsData['teams'];

                foreach ($teams as $team) {
                    if (isset($team['id'], $team['name'], $team['market'], $team['win'], $team['loss'], $team['games_back'], $team['rank']['division'])) {
                        $name = $team['name'];
                        $city = $team['market'];
                        $wins = $team['win'];
                        $losses = $team['loss'];
                        $games_back = $team['games_back'];
                        $divisionrank = $team['rank']['division'];
                        

                        // Output team data in table rows
                                echo "<tr>
                                <td>$city</td>
                                <td>$name</td>
                                <td>$wins</td>
                                <td>$losses</td>
                                <td>$games_back Games Back</td>
                                <td>$divisionrank</td>
                            </tr>";
                    } else {
                        echo "<tr><td colspan='5'>Error: Invalid team data format.</td></tr>";
                    }
                }
            } else {
                echo "<tr><td colspan='5'>Error: Unable to decode JSON or missing 'teams' data.</td></tr>";
            }
            ?>
        </table>
    </main>
<br>
<br>
    <footer>
        <p>&copy; 2023 MLB Live Updates</p>
    </footer>
</body>
</html>



