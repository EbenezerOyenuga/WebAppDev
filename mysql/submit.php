<?php

  include_once 'connection.php';


 try
 {
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstname = validate_input('firstname',$_POST['firstname']);
    $lastname = validate_input('lastname',$_POST['lastname']);
    $email = validate_input('email',$_POST['email']);
    $gender = validate_input('gender',$_POST['gender']);
   

    $sql = "INSERT INTO students (firstname, lastname, email, gender) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $firstname, $lastname, $email, $gender);

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


  