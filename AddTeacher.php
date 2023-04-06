<?php

//mysqli_connect() function establishes a connection with MySQL server and returns the connection as an object.
/*
   $host = "localhost";
   $username  = "root";
   $passwd = " ";
   $dbname = "school";
*/
$servername = "localhost";
   $username  = "root";
   $password = "root";
   $dbname = "school";
$link = mysqli_connect("localhost", "root", "root", "school");
// Check connection
if ($link === false) {
    die("Connection failed: ");
}

/*
The isset() function checks whether a variable
 is set, which means that it has to be declared 
 and is not NULL. 
 This function returns true if the variable
  exists and is not NULL, 
  otherwise it returns false.
*/
if (isset($_POST['submit'])) {

    $teachername = $_POST['teachername'];
    $teacheremail = $_POST['teacheremail'];
    $teacherphone = $_POST['teacherphone'];
    $teachersalary = $_POST['teachersalary'];
   
/*
mysqli_query() function accepts a string value
representing a query as one of the parameters
and, executes/performs the given query 
on the database
*/
    $sql = "INSERT INTO teacher (teachername, teacheremail, teacherphone, teachersalary) VALUES ('$teachername', '$teacheremail', '$teacherphone', '$teachersalary')";
    if (mysqli_query($link, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error adding record ";
    }

}
?>