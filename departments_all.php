<?php require "dbconnect.php";?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
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
                        <a id="add-department" class="btn btn-primary" href="department_add.php">Add</a>
                    </p>
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Name of department</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php 
                                $conn = connect();
                            $sql="select * from departments";
                            $retval = mysqli_query($conn, $sql);
                                    if(! $retval ) {
                                        die('Could not enter data: ' . mysqli_error($conn));
                                    }
                            foreach ($retval as $key => $value) {
                                echo "<tr>";
                                echo "<td>" . $value["ID"] . "</td>";
                                echo "<td>$value[name]</td>";
                                echo "<td><a class=\"btn btn-primary\" href=\"/project/department_update.php?id_department=" . $value["ID"] . "\">UPDATE</a></td>";
                                echo "<td><a class=\"btn btn-danger\" href=\"/project/department_delete.php?id_department=" . $value["ID"] . "\">DELETE</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        
                    </table>
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