
<html>
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
            
            <div id="content_area">
                <?php echo $content; ?>
          
            </div>

            <footer> 
                <p></p>
        </div>
        
    </body>
</html>


