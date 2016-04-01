
<?php require "dbconnect.php";?>
<?php
   if($_POST) {
       if ($_POST["name_department"]) {
        $name_department = $_POST['name_department'];
        $sql = "INSERT INTO departments ". "(name)".
         "VALUES('$name_department')";
        $retval = mysqli_query($conn, $sql);
         if(! $retval ) {
               die('Could not enter data: ' . mysqli_error($conn));
            }
         header("Location: departments_all.php");
       }
   }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New department</title>
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
                                <label class="control-label col-md-2" for="name_department">Name</label>
                                <div class="col-md-10">
                                    <input id="name_department" class="form-control" type="text" name="name_department">
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