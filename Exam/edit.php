<?php
include "db_conn.php";
$id = $_GET['id'];


if(isset($_POST['submit'])){
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Middleinitial = $_POST['Middleinitial'];
    $Birthday = $_POST['Birthday'];
    $Gender = $_POST['Gender'];
    $Date_registered = $_POST['Date_registered'];


    $sql = "UPDATE `exam` SET `Firstname`='$Firstname'
    ,`Lastname`='$Lastname',`Middleinitial`='$Middleinitial',`Birthday`='$Birthday'
    ,`Gender`='$Gender',`Date_registered`='$Date_registered' WHERE id=$id";


    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php?msg=Information is successfully updated!");

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


       
        .container {
            text-align: center;
            margin-top: 20px;
            padding: 20px; /* Added padding */
            background-color: #f5f5f5; /* Added background color */
            border-radius: 10px; /* Added border radius */
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
    </style>
     

    <title>Registration</title>



</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
    <span class="navbar-text">Entry Level Php Exam</span>
        
    </nav>



    <div class="container">
        <div class="text-center mb-4">
            <h3>Update Information</h3>
            <p class="text-muted">Click Update after changing any information</p>
        </div>

        <?php
        $sql = "SELECT * FROM `exam` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row">

                    <div class="col">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="Lastname"
                        value="<?php echo $row['Lastname']?>">
                    </div>

                    <div class="col">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="Firstname"
                        value="<?php echo $row['Firstname']?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Middle Initial:</label>
                        <input type="text" class="form-control" name="Middleinitial"
                        value="<?php echo $row['Middleinitial']?>">
                    </div>

                </div>
                <br>
                <div>
                    <label class="form-label">Birthdate:</label>
                    <input type="date" class="form-control" name="Birthday"
                    value="<?php echo $row['Birthday']?>">
                </div>
                <br>
                <div>
                    <label for="Gender">Gender:</label><br><center>
                    <input type="radio" style="margin:15px" name="Gender" value="1" <?php echo ($row['Gender']=='Male')?"checked":"";?>> Male                                   
                    <input type="radio" style="margin:15px" name="Gender" value="2"> <?php echo ($row['Gender']=='Female')?"checked":"";?> Female
                    <input type="radio" style="margin:15px" name="Gender" value="3"> <?php echo ($row['Gender']=='Others')?"checked":"";?> Others
                    </center>
                </div>

                <div class="col">
                        <label class="form-label">Date Registered:</label>
                        <input type="date" class="form-control" name="Date_registered"
                        placeholder="Registration Date">
                    </div><br>

                <div><center>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
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