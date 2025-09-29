<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Student Fee</title>
</head>
<body>
    <h1>Display Student Fees</h1>
    <hr>
    <div>
        <p><strong>Student Name</strong>:<?php echo $_GET['name']; ?></p>
        <p><strong>Number of Courses</strong>:<?php echo $_GET['numCourses']; ?></p>
        <p><strong>Total Fee</strong>:<?php echo $_GET['totalFee']; ?></p>
    </div>
</body>
</html>