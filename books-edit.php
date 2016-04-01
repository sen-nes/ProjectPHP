<?php
    require "dbconnect.php";
    $conn = connect();
    
    if($_POST) {
        $ID = $_POST["ID"];
        $sql = "UPDATE books SET title='" . $_POST['title'] . "',
                                     author='" . $_POST['author'] . "',
                                     year='" . $_POST['year'] . "',
                                     genre='" . $_POST['genre'] . "',
                                     pages='" . $_POST['pages'] . "',
                                     id_library='" . $_POST['library'] . "',
                                     id_department='" . $_POST['department'] . "'
                                 WHERE ID=$ID";
            
        if (!$conn ->query($sql) === TRUE) {
            echo "Error: " . $sql . "<br>" . $conn -> error;
        }
        
        $conn -> close();
            
        if ($_POST['title']) {
            header("Location: http://localhost/project/books.php");
            exit;
        }
    }
    
    if ($_GET) {
        $ID = $_GET["ID"];
        $sql = "SELECT * FROM books WHERE ID=$ID";
        $results = $conn -> query($sql);
        
        if ($results -> num_rows > 0) {
            $present = TRUE;
            $result = $results -> fetch_assoc();
            $library_selected = $result['id_library'];
            $department_selected = $result['id_department'];
            $title = $result['title'];
            $author = $result['author'];
            $year = $result['year'];
            $genre = $result['genre'];
            $pages = $result['pages'];
            
            $libraries_q = "SELECT * FROM libraries";
            $libraries = $conn -> query($libraries_q);
            $departments_q = "SELECT * FROM departments";
            $departments = $conn -> query($departments_q);
        } else {
            $present = FALSE;
        }
    }
    
  $conn -> close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit book</title>
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
                            <li><a id="books" href="/project/books-new.php">BOOKS</a></li>
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
                    <?php if ($present) : ?>
                        <form action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="form-horizontal centermeh">
                                <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="title">Title</label>
                                    <div class="col-md-10">
                                        <input id="title" class="form-control" type="text" name="title" value="<?php echo $title ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="author">Author</label>
                                    <div class="col-md-10">
                                        <input id="author" class="form-control" type="text" name="author" value="<?php echo $author ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="year">Year</label>
                                    <div class="col-md-10">
                                        <input id="year" class="form-control" type="number" name="year" value="<?php echo $year ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="genre">Genre</label>
                                    <div class="col-md-10">
                                        <input id="genre" class="form-control" type="text" name="genre" value="<?php echo $genre ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="pages">Pages</label>
                                    <div class="col-md-10">
                                        <input id="pages" class="form-control" type="number" name="pages" value="<?php echo $pages ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="library">Library</label>
                                    <div class="col-md-10">
                                        <select id="library" class="form-control" name="library">
                                            <?php 
                                                while ($library = $libraries -> fetch_assoc()) {
                                                    if ($library["ID"] == $library_selected) {
                                                        echo "<option value=\"" . $library["ID"] . "\" selected>" . $library["name"] . "</option>";
                                                    } else {
                                                        echo "<option value=\"" . $library["ID"] . "\">" . $library["name"] . "</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="department">Department</label>
                                    <div class="col-md-10">
                                        <select id="department" class="form-control" name="department">
                                            <?php 
                                                while ($department = $departments -> fetch_assoc()) {
                                                    if ($department["ID"] == $department_selected) {
                                                        echo "<option value=\"" . $department["ID"] . "\" selected>" . $department["name"] . "</option>";
                                                    } else {
                                                        echo "<option value=\"" . $department["ID"] . "\">" . $department["name"] . "</option>";
                                                    }
                                                }
                                            ?>
                                    </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <button type="submit" class="btn btn-primary">SAVE</button>
                                </div>
                            </div>
                            </div>
                        </form>
                    <?php else : {
                        echo "<div class=\"alert alert-warning\">No book with such ID.</div>";
                    } endif; ?>
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