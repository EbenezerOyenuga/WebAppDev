<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
</head>
<body>
    <h1>Add New Students Record</h1>
    <hr>
    <?php 
       if(isset($_GET['message']) && !empty($_GET['message'])){
          echo "<em><strong>".$_GET['message']."</strong></em>";
       }
     ?>
     <hr>
    <form action="submit.php" method="POST">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required><br><br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value ="">Select Gender </option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>
        <input type="submit" value="Add Student">
    </form>
    <hr>
    <h3>View Student Records</h3>
    <hr>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            <?php
               include_once 'connection.php';
               $sql = "SELECT * FROM students"; //or "SELECT id, firstname, lastname, email, gender FROM students" //we can select specific columns from the database table
               $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                     while($row = $result->fetch_assoc()) {
                          echo "<tr>
                                 <td>".$row["id"]."</td>
                                 <td>".$row["firstname"]."</td>
                                 <td>".$row["lastname"]."</td>
                                 <td>".$row["email"]."</td>
                                 <td>".$row["gender"]."</td>
                             </tr>";
                     }
                 } else {
                     echo "<tr><td colspan='5'>No records found</td></tr>";
                 }
            ?>
        </tbody>
    </table>
</body>
</html>