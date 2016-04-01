<?php
    if($_POST) {
        require "dbconnect.php";
        $conn = connect();
        $sql = "INSERT INTO libraries (name, name_manager, city, address, phone)
                    VALUES ('" . $_POST["name_library"] . "', " .
                    "'" . $_POST["name_manager"] . "', " .
                    "'" . $_POST["city"] . "', " .
                    "'" . $_POST["address"] . "', " .
                    "'" . $_POST["phone"] . "')";
            
        if (!$conn ->query($sql) === TRUE) {
             echo "<div class=\"alert alert-warning text-center\">Error: " . $sql . "<br>" . $conn -> error . "</div>";
        } else {
            header("Location: http://localhost/project/libraries.php");
            exit;
        }
        $conn -> close();
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New library</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="someCSS.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="container">
        <div id="header">

            <nav class="navbar navbar-default navbar-fixed-top navbar-border-bottom navbar-font">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/project/books.php"><img src="http://www.vectortemplates.com/raster/batman-logo-big.gif" width="40" height="22" /></a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            	<li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">QUERIES
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/project/q1.php">QUERY 1</a></li>
                                        <li><a href="/project/q2.php">QUERY 2</a></li>
                                        <li><a href="/project/q3.php">QUERY 3</a></li>
                                    </ul>
                                </li>
                            <li><a id="books" href="/project/books.php">BOOKS</a></li>
                            <li><a id="departments" href="/project/departments_all.php">DEPARTMENTS</a></li>
                            <li><a id="libraries" href="/project/libraries.php">LIBRARIES</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>

        <div id="body">

            <div class="container body-content">
                <div class="center">
                    <form action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="form-horizontal centermeh">
                            <div class="form-group">
                                <label class="control-label col-md-2" for="name_library">Name</label>
                                <div class="col-md-10">
                                    <input id="name_library" class="form-control" type="text" name="name_library" placeholder="Library name">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-2" for="name_manager">Manager</label>
                                <div class="col-md-10">
                                    <input id="name_manager" class="form-control" type="text" name="name_manager" placeholder="Manager name">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-2" for="city">City</label>
                                <div class="col-md-10">
                                    <input id="city" class="form-control" type="text" name="city" placeholder="City">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-2" for="address">Address</label>
                                <div class="col-md-10">
                                    <input id="address" class="form-control" type="text" name="address" placeholder="Address">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-2" for="phone">Phone</label>
                                <div class="col-md-10">
                                    <input id="phone" class="form-control" type="text" name="phone" placeholder="08XXXXXXXX">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div id="footer">

            <footer class="container text-center">
                <div class="center">
                    <p>&copy; 2016 - Mihail Stanchev & Stiliyan Angelov</p>
                </div>
            </footer>

        </div>
    </div>
</body>
</html>