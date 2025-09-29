<?php
    error_reporting(E_ALL); // Report all errors, warnings, and notices
    ini_set('display_errors', '1');
    $messages="";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(!empty($_POST)){
            if(!empty($_POST['student_name']) && !empty($_POST['numberOfCourses']) && is_numeric($_POST['numberOfCourses'])){
                if($_POST['numberOfCourses'] < 1){
                    die("Number of courses must be at least 1");
                }
            } else {
                die("Both fields are required and number of courses must be numeric");
                $messages.="Both fields are required and number of courses must be numeric";
            }
            $student_name = $_POST['student_name'];
            $numberOfCourses = $_POST['numberOfCourses'];

            //var_dump("Debugging..."); die();

            calculateRegistrationFee($student_name, $numberOfCourses, $messages);
        }
        
         if(!empty($messages))
            {
                header("location:".$_SERVER['PHP_SELF']."?messages=".$messages);
            }
    }


    function calculateRegistrationFee($name, $numCourses, $messages="")
        {
            $costPerUnit = 10000;
            $units = 2;
            $weeks = 13;
            $discount = 10 / 100;
            if ($name != '' || $name != null) {
                $totalFee = $costPerUnit * $units * $weeks * $numCourses;
                // Calculate the total fee based on the number of courses
                // If more than 5 courses, apply a discount
                if ($numCourses > 5) {
                    $totalFee -= $totalFee * $discount; // $totalFee = $totalFee * discount
                }

                //$displayMessage = sprintf("The registration fee for %s taking %d courses is: N%.2f", $name, $numCourses, $totalFee);
                //return $displayMessage;
                header("Location: displayStudentFee.php?name=$name&numCourses=$numCourses&totalFee=$totalFee");
            } else {
                //return "Name is required";
                $messages.="Name is required";
            }
        }

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php 
       if(isset($_GET['messages']) && !empty($_GET['messages'])){
          echo $_GET['messages'];
       }
     ?></p>
     <hr>
    <form action="" method="POST">
        <label for="">Student Name</label><input type="text" name="student_name">
        <label for="">Number of Courses</label><input type="number" name="numberOfCourses">
        <button type="submit">Calculate Registration Fee</button>
    </form>
</body>
</html>