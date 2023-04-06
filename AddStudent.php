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
        <h1>Add Students</h1>
      <div>
            <br>
      <form method="post" action="AddStudent.php">
    			<label for="studentname">Student Name:</label>
    			<input type="text" name="studentname">
          <br>
          <label for="studentdob">Student DOB:</label>
          <br>
    			<input type="date" name="studentdob" pattern="\d{4}-\d{2}-\d{2}" min="1950-01-01" max="2023-12-31">
          <br>
          <label for="classname">Student class:</label>
          <br>
    			<input type="text" name="classname">
          <br>
          <label>Select Father:</label>
           <select name="parentid">
           <?php
                $link = mysqli_connect("localhost", "root", "root", "school");
                // Check connection
                if ($link === false) {
                    die("Connection failed: ");
                 }
                $sql = mysqli_query($link, "SELECT parentid, fathersname FROM parent");
                while ($row = $sql->fetch_assoc()){
                echo "<option value='" . $row['parentid'] . "'>" . $row['fathersname'] . "</option>";
                }
				      ?>
             <br>
           </select>

           <label>Select Mother:</label>
           <select name="parentid">
           <?php
                
                $sql = mysqli_query($link, "SELECT parentid, mothersname FROM parent");
                while ($row = $sql->fetch_assoc()){
                echo "<option value='" . $row['parentid'] . "'>" . $row['mothersname'] . "</option>";
                }
				      ?>
             <br>
           </select>


             <input type="submit" name="submit">
      </form>
        <?php



         if (isset($_POST['submit'])) {
		
           $studentname = $_POST['studentname'];
           $studentdob= $_POST['studentdob'];
           $classname= $_POST['classname'];
           $parentid= $_POST['parentid'];
    
            $sql = "INSERT INTO student (studentname, studentdob, classname, parentid) VALUES ('$studentname','$studentdob', '$classname','$parentid')";
            if (mysqli_query($link, $sql)) {
              echo "New record created successfully";
            } else {
              echo "Error adding record ";
            }
          
          }
  
            $link->close();
        ?>

  
        

       </div>
    </body>
</html>
