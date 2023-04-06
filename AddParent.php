<?php


$link = mysqli_connect("localhost", "root", "root", "school");
// Check connection
if ($link === false) {
    die("Connection failed: ");
}



if (isset($_POST['submit'])) {

    $fathersname = $_POST['fathersname'];
    $mothersname = $_POST['mothersname'];
    $parentemail = $_POST['parentemail'];
    $parentphone = $_POST['parentphone'];
    $parentaddress = $_POST['parentaddress'];
   

    $sql = "INSERT INTO parent(fathersname, mothersname, parentemail, parentnumber, parentaddress) VALUES ('$fathersname', '$mothersname', '$parentemail', '$parentphone', '$parentaddress')";
    if (mysqli_query($link, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error adding record ";
    }

}

?>