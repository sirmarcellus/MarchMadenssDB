<html>
    <?php
        include 'dbm.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <title><?php> echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
    </head>
    <body>
        <div id="wrapper">
            <div id="banner">
                
            </div>
            
            <nav id="navigation"> 
                <ul id="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="search.php">Search</a></li>
      
                </ul>
            </nav>
           
            <h4>WELCOME TO THE MADNESS</h4>
    <p>
    Here you will find the search bar for finding and looking up data related to the teams.
    The format of the data below is for example 1, Arizona ST, Bobby Hurley, 11 where 1 is the 
    team id, Arizona St is the team name, Bobby Hurley is the coach and 11 is the seed for the tournament. 
    The way the search works is it searches through all the team table and finds the value or similar values your looking for.
    Ex: search "Bobby" and you

    </p>


<form action="search1.php" method="POST">
    <input type="text" name="Search" placeholder="Search Team">
    <button type="Submit" name="Submit"> Search</button>
</form>

<div class="search-container">
    <?php
        $sql = " SELECT team_name, coach, seed FROM team";
        $result = mysqli_query($conn, $sql);
        $queryRes = mysqli_num_rows($result);
    ?>
</div>

<form action="search2.php" method="POST">
    <input type="text" name="Search" placeholder="Search Player">
    <button type="Submit" name="Submit"> Search</button>
</form>

<div class="search-player-container">
    <?php
        $sql = " SELECT player_name,position, team_name FROM player join  team on player_id = team_id";
        $result = mysqli_query($conn, $sql);
        $queryRes = mysqli_num_rows($result);
    ?>
</div>


<form action="search3.php" method="POST">
    <input type="text" name="Search" placeholder="Search Team Game">
    <button type="Submit" name="Submit"> Search</button>
</form>

<div class="search-stats-container">
    <?php
        $sql = "SELECT teamOne_name, teamTwo_name, score from game";
        $result = mysqli_query($conn, $sql);
        $queryRes = mysqli_num_rows($result);
    ?>
</div>


<form action="search4.php" method="POST">
    <input type="text" name="Search" placeholder="Search Coach Names">
    <button type="Submit" name="Submit"> Search</button>
</form>

<div class="search-coach-container">
    <?php
        $sql = "SELECT coach FROM team ";
        $result = mysqli_query($conn, $sql);
        $queryRes = mysqli_num_rows($result);
    ?>
</div>



<form action="search5.php" method="POST">
    <input type="text" name="Search" placeholder="Search position">
    <button type="Submit" name="Submit"> Search</button>
</form>

<div class="search-xplayer-container">
    <?php
        $sql = "SELECT position FROM player ";
        $result = mysqli_query($conn, $sql);
        $queryRes = mysqli_num_rows($result);
    ?>
</div>



<form action="search6.php" method="POST">
    <input type="text" name="Search" placeholder="Search Team Stats">
    <button type="Submit" name="Submit"> Search</button>
</form>

<div class="search-xteam-container">
    <?php
        $sql = "SELECT team_name FROM team ";
        $result = mysqli_query($conn, $sql);
        $queryRes = mysqli_num_rows($result);
    ?>
</div>



<form action="search7.php" method="POST">
    <input type="text" name="Search" placeholder="Search Roster">
    <button type="Submit" name="Submit"> Search</button>
</form>

<div class="search-rooster-container">
    <?php
        $sql = "SELECT team_name,player_name,position FROM team JOIN player ON team_id = school_id ";
        $result = mysqli_query($conn, $sql);
        $queryRes = mysqli_num_rows($result);
    ?>
</div>



<form action="search8.php" method="POST">
    <input type="text" name="Search" placeholder="Search Seed">
    <button type="Submit" name="Submit"> Search</button>
</form>

<div class="search-seed-container">
    <?php
        $sql = "SELECT seed FROM team ";
        $result = mysqli_query($conn, $sql);
        $queryRes = mysqli_num_rows($result);
    ?>
</div>
    
    <h1> Search Result</h1>

    <div class="search-xteam-container">
<?php
    if(isset($_POST['Submit'])){
        $search = mysqli_real_escape_string($conn, $_POST['Search']);
        $sql = "SELECT teamOne_name, teamTwo_name, score , fg, fga, 2p, 2pa, 3p, 3pa, ft, fta, rb, ast, stl, blk, tov, pf from game join stats on match_id = game_id where teamOne_name LIKE '%$search%' OR teamTwo_name LIKE '%$search%'";
        
        $result = mysqli_query($conn, $sql);
        $queryRes = mysqli_num_rows($result);
        
        if($queryRes > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<div class='search-box'> 
                    
                    <p>".$row['teamOne_name']." vs  ".$row['teamTwo_name']."</p> <p>Final Score[".$row['score']."]</p>
                    <p>Field Goals Made:".$row['fg']."</p><p>Field Goals Attempted:".$row['fga']."</p><p> Two Pointers Made:".$row['2p']."</p><p>Two Pointers Attempted:".$row['2pa']." </p><p>Three Pointers Made:".$row['3p']."</p><p>Three Pointers Attempted:".$row['3pa']."</p><p> Free Throws Made:".$row['ft']."</p><p>Free Throws Attempted:".$row['fta']."</p><p> Total Rebounds:".$row['rb']."</p><p>Total Assists:".$row['ast']." </p><p>Total Steals:".$row['stl']."</p><p>Total Blocks:".$row['blk']." </p><p>Total Turnovers:".$row['tov']."</p><p>Total Personal Fouls:".$row['pf']."</p>
                       
                </div>";
            }
        } else {
            echo "There are no results from search";
        }
    }


?>
</div>

            <footer> 
                <p></p>
        </div>
        
    </body>
</html>

