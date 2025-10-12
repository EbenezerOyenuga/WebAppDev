<?php
// Safely read counts from query string with defaults
$A = isset($_GET['A']) ? (int)$_GET['A'] : 0;
$B = isset($_GET['B']) ? (int)$_GET['B'] : 0;
$C = isset($_GET['C']) ? (int)$_GET['C'] : 0;
$D = isset($_GET['D']) ? (int)$_GET['D'] : 0;
$E = isset($_GET['E']) ? (int)$_GET['E'] : 0;
$F = isset($_GET['F']) ? (int)$_GET['F'] : 0;
// getStudentGrades.php sends the key 'Invalid'
$Invalid = isset($_GET['Invalid']) ? (int)$_GET['Invalid'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Stats</title>
</head>
<body>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <td>A</td>
            <td><?php echo $A; ?></td>
        </tr>
        <tr>
            <td>B</td>
            <td><?php echo $B; ?></td>
        </tr>
        <tr>
            <td>C</td>
            <td><?php echo $C; ?></td>
        </tr>
        <tr>
            <td>D</td>
            <td><?php echo $D; ?></td>
        </tr>
        <tr>
            <td>E</td>
            <td><?php echo $E; ?></td>
        </tr>
        <tr>
            <td>F</td>
            <td><?php echo $F; ?></td>
        </tr>
        <tr>
            <td>Invalid Score</td>
            <td><?php echo $Invalid; ?></td>
        </tr>
    </table>
</body>
</html>
