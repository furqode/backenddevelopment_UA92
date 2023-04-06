<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
          * {
            margin: 0px;
            padding: 0px;
          }
        body {
          font-family: Arial, Helvetica, sans-serif;
          background-color: rgb(75, 121, 176);
        }

        .navbar {
          overflow: hidden;
          background-color: #333;
        }

        .navbar a {
          float: left;
          font-size: 16px;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
        }

        .dropdown {
          float: left;
          overflow: hidden;
        }

        .dropdown .dropbtn {
          font-size: 16px;
          border: none;
          outline: none;
          color: white;
          padding: 14px 16px;
          background-color: inherit;
          font-family: inherit;
          margin: 0;
        }

        .navbar a:hover, .dropdown:hover .dropbtn {
          background-color: red;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          float: none;
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
          text-align: left;
        }

        .dropdown-content a:hover {
          background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
          display: block;
        }
        </style>
    </head>
    <body>
      <div class="navbar">
        <a href="index.html">Home</a>
        <div class="dropdown">
            <button class="dropbtn">View
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="ViewStudent.php">Student</a>
                <a href="ViewParent.php">Parent</a>
                <a href="ViewTeacher.php">Teacher</a>
                <a href="ViewClass.php">Class</a>
                <a href="ViewDepartment.php">Department</a>
                <a href="ViewCleaner.php">Cleaner</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Add
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="AddStudent.php">Student</a>
                <a href="AddParent.html">Parent</a>
                <a href="AddTeacher.html">Teacher</a>
                <a href="AddClass.php">Class</a>
                <a href="AddDepartment.php">Department</a>
                <a href="AddCleaner.php">Cleaner</a>
            </div>
        </div>

        <div class="dropdown">
          <button class="dropbtn">Delete
              <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
              <a href="DeleteStudent.php">Student</a>
              <a href="DeleteParent.php">Parent</a>
              <a href="DeleteTeacher.php">Teacher</a>
              <a href="DeleteClass.php">Class</a>
              <a href="DeleteDepartment.php">Department</a>
              <a href="DeleteCleaner.php">Cleaner</a>
          </div>
      </div>

      <div class="dropdown">
        <button class="dropbtn">Edit
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="EditStudent.php">Student</a>
            <a href="EditParent.php">Parent</a>
            <a href="EditTeacher.php">Teacher</a>
            <a href="EditClass.php">Class</a>
            <a href="EditDepartment.php">Department</a>
            <a href="EditCleaner.php">Cleaner</a>
        </div>
    </div>
        
    </div>
<h1>Add Classes</h1>
        <div>
            <br>
            <form method="post" action="AddClass.php">

    			<label for="classname">Class Name:</label>
          <select name="classname">
            <option name="classname">Reception Year</option>
            <option name="classname">Year One</option>
            <option name="classname">Year Two</option>
            <option name="classname">Year Three</option>
            <option name="classname">Year Four</option>
            <option name="classname">Year Five</option>
            <option name="classname">Year Six</option>
          </select>

          <label for="classcapacity">Class capacity:</label>
    			<input type="text" name="classcapacity">

          <label for="classroom">Room Number:</label>
    			<input type="text" name="classroom">
          
          <label>Teacher Name:</label>
          <select name="teacherid">
            <?php
                 $link = mysqli_connect("localhost", "root", "root", "school");
                 // Check connection
                 if ($link === false) {
                     die("Connection failed: ");
                  }
                 $sql = mysqli_query($link, "SELECT teacherid, teachername FROM teacher");
                 while ($row = $sql->fetch_assoc()){
                 echo "<option value='" . $row['teacherid'] . "'>" . $row['teachername'] . "</option>";
                 }
               ?>
              <br>
            </select>

            
            
            
    			<br><br>

    			<input type="submit" name="submit">

    		</form>
        </div>

        <?php



        if (isset($_POST['submit'])) {
   
          $classname = $_POST['classname'];
          $classcapacity= $_POST['classcapacity'];
          $classroom= $_POST['classroom'];
          $teacherid= $_POST['teacherid'];
   
           $sql = "INSERT INTO class (classname, classcapacity, room, teacherid) VALUES ('$classname','$classcapacity', '$classroom', '$teacherid')";
           if (mysqli_query($link, $sql)) {
             echo "New record created successfully";
           } else {
             echo "Error adding record ";
           }
         
         }
 
           $link->close();
       ?>
       
    </body>
</html>
