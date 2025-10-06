<?php

  include_once 'connection.php';


    try
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $matric_no = validate_input('matric_no', $_POST['matric_no']);
            $firstname = validate_input('firstname',$_POST['firstname']);
            $lastname = validate_input('lastname',$_POST['lastname']);
            $email = validate_input('email',$_POST['email']);
            $gender = validate_input('gender',$_POST['gender'], false);

            $sql = "INSERT INTO students (matric_no, firstname, lastname, email, gender) VALUES (?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $matric_no, $firstname, $lastname, $email, $gender);
            //s for string, i for integer, d for double, b for blob
            if ($stmt->execute() === TRUE) {
                report("New student record added successfully");
            } else {
                report("Error: " . $stmt->error);
            }
            $stmt->close();
            $conn->close();
        }
    }
        catch(Exception $e)
    {
        report("Error: " . $e->getMessage());
    }


  