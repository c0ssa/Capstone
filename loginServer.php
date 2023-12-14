<!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page page</title>
</head>
 
<body>

        <?php
 

        $conn = mysqli_connect("localhost", "root", "Daniel27", "login_details");
         
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        $username =  $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $favTeam =  $_REQUEST['favoriteTeam'];

        $sql = "INSERT INTO logins VALUES ('$username', 
            '$password','$favTeam')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h2>Welcome, $username!<h2>"; 
            echo nl2br("\n$username\n $password\n "
                . "$favTeam");
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<a href='homePage.php'><button>Home</button></a>";

                
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        ?>
        

</body>
 
</html>