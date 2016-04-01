
<?php require "dbconnect.php";?>
<?php
   if($_GET){
       if($_GET["id_department"]) {
           $id_department = $_GET['id_department'];
        $sql = "delete from departments where id = $id_department";
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
<meta charset="UTF-8">
<title>Delete department</title>
</head>

<body>
</body>
</html>