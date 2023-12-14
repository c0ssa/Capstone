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
<body> 
    <form action="fanLoginServer.php" method="post"> 
        <label for="username">Username:</label> 
        <input type="text" id="username" name="username" required> 
        <br> 
        <label for="password">Password:</label> 
        <input type="password" id="password" name="password" required> 
        <br> 
        <label for="favoriteTeam">Favorite Team:</label> 
        <input type="text" id="favoriteTeam" name="favoriteTeam" required> 
        <br> 
        <input type="submit" value="Submit"> 
        <a href="signup.html"><input type="button" value="Sign Up"></a>
    </form> 
</body> 
</html> 