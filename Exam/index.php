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
    /* Internal CSS rules */

    /* Navbar styles */
    body {
        background: #EBF3E8;
        color: #fff;
    }

    .navbar {
        background-color: #86A789;
        text-align: center;
        font-size: 24px;
        padding: 20px;
    }

    /* Table styles */
    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #9BBEC8;
    }

    th, td {
        padding: 10px;
        border: 1px solid #9BBEC8;
    }

    th {
        background-color: #D2E3C8;
        color: #fff;
    }

    .btn-success {
        background-color: #B2C8BA;
        color: #fff;
        padding: 10px 20px;
        border: none;
        text-align: center;
        font-size: 18px;
        text-decoration: none;
    }

    .navbar {
        background-color: #86A789;
        text-align: center;
        font-size: 50px;
        padding: 20px;
        color: white; /* Text color */
    }

    .custom-thead {
        background-color: #86A789;
        color: white; /* Text color */
    }

    .navbar-text {
    font-size: 45px;
    font-weight: bold; 
    color: #333; 
    }


    
</style>



    <title>PHP EXAM</title>

    </head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-1 mb-3">
    <span class="navbar-text">REGISTRATION</span>
        
    </nav>

    <div class="container">
        <?php
        if(isset($_GET['msg'])){
            $msg=$_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
            <br>
            <br>
            
        
        <table class="table table-hover text-center">
             <thead class="custom-thead">
                <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Birthday</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Registered At</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>


            <?php
            include "db_conn.php";
            $sql="SELECT * FROM `exam`";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $firstName = $row['Firstname'];
                $middleInitial = $row['Middleinitial'];
                $lastName = $row['Lastname'];
                $birthDay = $row['Birthday'];
                $gender = $row['Gender'];
                $dateRegistered = $row['Date_registered'];


                $birthdate = new DateTime($birthDay);
                $currentDate = new DateTime();
                $age = $currentDate->diff($birthdate)->y;

                // Create a DateTime object from the date
                $dateTime = new DateTime($dateRegistered);

                // Format the date in "M jS Y" format (RegisteredDate)
                $formattedDateRegistered = $dateTime->format("M jS, Y");


                // Format the date in "M jS Y" format  (Birthday)
                $formattedDate = $birthdate->format("M jS, Y");
                
               
                ?>
                        <tr>
                        <td><?php echo $firstName, " ", $middleInitial, " ", $lastName ?></td>
                        <td><?php echo $formattedDate ?></td>
                        <td><?php echo $age ?></td> <!-- Display the age -->
                        <td>
                            <?php
                            if ($gender == 1) {
                                echo 'Male';
                            } elseif ($gender == 2) {
                                echo 'Female';
                            } else {
                                echo 'Others';
                            }
                            ?>
                        </td>

                        <td><?php echo  $formattedDateRegistered ?></td>

                            
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']?>"
                            class="link-dark"><i class="fa-solid fa-pen-to-square fs-5
                             me-3"></i></a>
                            <a href="delete.php?id=<?php echo $row['id']?>"
                             class="link-dark"><i class="fa-solid fa-trash fs-5 
                             me-3"></i></a>
                        </td>
                        </tr>
                <?php


            }


            ?>
            </tbody>
            </table>
            <br>
            <center>
            <a href="form.php" class="btn btn-success">Register New Person</a>
            </center>
    </div>
 






<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
 crossorigin="anonymous"></script>
   
</body>
</html>
