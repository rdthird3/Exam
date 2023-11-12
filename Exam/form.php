<?php
include "db_conn.php";

if(isset($_POST['submit'])){
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Middleinitial = $_POST['Middleinitial'];
    $Birthday = $_POST['Birthday'];
    $Gender = $_POST['Gender'];
    $Date_registered = $_POST['Date_registered'];


    $sql = "INSERT INTO `exam`(`Firstname`, `Lastname`, `Middleinitial`, `Birthday`, `Gender`, `Date_registered`)
     VALUES ('$Firstname','$Lastname','$Middleinitial','$Birthday','$Gender','$Date_registered')";


    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php?msg=New record created successfully");

    }
    else{
        echo "Failed" . mysqli_error($conn);
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
     crossorigin="anonymous">


     <!--Font Awesome-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
     integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />


     <style>
        body {
        background: #EBF3E8;
        color: #fff;
        }

       
        .container {
            text-align: center;
            margin-top: 20px;
            padding: 20px; 
            border-radius: 10px; 
            background-color: #D2E3C8;
            padding: 20px;
            border-radius: 10px;
        
        }
     
        .container h3 {
            font-size: 24px;
        }

    
        .form-control {
            margin: 5px 0;
            padding: 5px;
            
        }

       
        input[type="radio"] {
            margin: 15px;
        }

      
        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
        }


        .btn-center {
            text-align: center;
        }

        .navbar {
        background-color: #86A789;
        text-align: center;
        font-size: 50px;
        padding: 20px;
        color: white; /* Text color */
        }

        .navbar-text {
        font-size: 45px;
        font-weight: bold; 
        color: #333; 
        }

        .navbar {
        background-color: #86A789;
        text-align: center;
        font-size: 24px;
        padding: 20px;
        }

        .form-control {
            color: black;
        }

        
        
    </style>
     

    <title>PHP EXAM</title>


</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
    <span class="navbar-text">NEW REGISTER</span>
    </nav>



    <div class="container">
    <div class="text-center mb-4">
        <h3 class="text-dark">Registration</h3>
        <p class="text-muted">Fill up the Form</p>
    </div>

    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row">

                <div class="col">
                    <label class="form-label text-dark">Last Name:</label>
                    <input type="text" class="form-control" name="Lastname"
                        placeholder="Enter Last Name">
                </div>

                <div class="col">
                    <label class="form-label text-dark">First Name:</label>
                    <input type="text" class="form-control" name="Firstname"
                        placeholder="Enter First Name">
                </div>

                <div class="col">
                    <label class="form-label text-dark">Middle Initial:</label>
                    <input type="text" class="form-control" name="Middleinitial"
                        placeholder="Enter Middle Initial">
                </div>

            </div>
            <br>
            <div>
                <label class="form-label text-dark">Birthdate:</label>
                <input type="date" class="form-control" name="Birthday"
                    placeholder="MM/DD/YYYY">
            </div>
            <br>
            <div>
                <label class="text-dark">Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" name="Gender" value="1" class="form-check-input" id="male">
                    <label class="form-check-label text-dark" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="Gender" value="2" class="form-check-input" id="female">
                    <label class="form-check-label text-dark" for="female">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="Gender" value="3" class="form-check-input" id="others">
                    <label class="form-check-label text-dark" for="others">Others</label>
                </div>
            </div>

            <div class="col">
                <label class="form-label text-dark">Date Registered:</label>
                <input type="date" class="form-control" name="Date_registered"
                    placeholder="Registration Date">
            </div><br>

            <div><center>
                <button type="submit" class="btn btn-success" name="submit">Register</button>
                <a class="btn btn-danger" href="index.php" role="button">Back</a>
            </center>
            </div>

        </form>
    </div>
</div>



<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
 crossorigin="anonymous"></script>
    
</body>
</html>