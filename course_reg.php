<?php

$student_name = 'John Doe';
$numberOfCourses = 5;

function calculateRegistrationFee($name, $numCourses){
    $costPerUnit = 10000;
    $units = 2;
    $weeks = 13;
    $discount = 10/100;
    if($name != '' || $name != null){
        $totalFee = $costPerUnit * $units * $weeks * $numCourses;
        // Calculate the total fee based on the number of courses
         // If more than 5 courses, apply a discount
        if($numCourses > 5){
            $totalFee -= $totalFee*$discount; // $totalFee = $totalFee * discount
        }
        $displayMessage = sprintf("The registration fee for %s taking %d courses is: N%.2f", $name, $numCourses, $totalFee);
        return $displayMessage;
    }
    else
    {
        return "Name is required";
    }

}

echo calculateRegistrationFee($student_name, $numberOfCourses);
?>
