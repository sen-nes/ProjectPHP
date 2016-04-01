<?php
    require "dbconnect.php";
    $conn = connect();
    if($_GET) {
        $ID = $_GET['delete'];
        $sql = "SELECT * FROM libraries WHERE id=$ID";
        $results = $conn -> query($sql);
        
        if($results -> num_rows > 0) {
            $sql = "DELETE FROM libraries WHERE ID=$ID";
        
            if ($conn ->query($sql) === TRUE) {
                header("Location: http://localhost/project/libraries.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn -> error . "<br>";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libraries</title>
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
                    <p> 
                        <a class="btn btn-primary" href="/project/libraries-new.php">+ new library</a>
                    </p>
                    
                    <?php
                        $sql = "SELECT * FROM libraries";
                        $results = $conn -> query($sql);
                        
                        if ($results -> num_rows > 0) {
                            echo "<table class=\"table table-hover\">
                                    <tr>
                                        <th>LIBRARY</th>
                                        <th>MANAGER</th>
                                        <th>CITY</th>
                                        <th>ADDRESS</th>
                                        <th>PHONE</th>
                                        <th></th>
                                        <th></th>
                                    </tr>";
                            while ($row = $results -> fetch_assoc()) {
                                echo "<tr>
                                        <td>
                                            " . $row["name"] . "
                                        </td>
                                        <td>
                                            " . $row["name_manager"] . "
                                        </td>
                                        <td>
                                            " . $row["city"] . "
                                        </td>
                                        <td>
                                            " . $row["address"] . "
                                        </td>
                                        <td>
                                            " . $row["phone"] . "
                                        </td>
                                        <td>
                                            <a class=\"btn btn-primary\" href=\"/project/libraries-edit.php?ID=" . $row['ID'] . "\">EDIT</a>
                                        </td>
                                        <td>
                                            <a class=\"btn btn-danger\" href=\"/project/libraries.php?delete=" . $row['ID'] . "\">DELETE</a>
                                        </td>
                                    </tr>";
                            }
                            echo "</table>";
                        } else {
                             echo "<div class=\"alert alert-warning\">No libraries.</div>";
                        }
                        
                        $conn -> close();
                    ?>
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