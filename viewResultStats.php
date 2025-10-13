<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <thead>
            <th>Grade</th>
            <th>Count</th>
        </thead>
        <tr>
            <td>
                A
            </td>
            <td>
                <?php echo $_GET['A']; ?>
            </td>
        </tr>
        <tr>
            <td>
                B
            </td>
            <td>
                <?php echo $_GET['B']; ?>
            </td>
        </tr>
        <tr>
            <td>
                C
            </td>
            <td>
                <?php echo $_GET['C']; ?>
            </td>
        </tr>
        <tr>
            <td>
                D
            </td>
            <td>
                <?php echo $_GET['D']; ?>
            </td>
        </tr>
        <tr>
            <td>
                E
            </td>
            <td>
                <?php echo $_GET['E']; ?>
            </td>
        </tr>
        <tr>
            <td>
                F
            </td>
            <td>
                <?php echo $_GET['F']; ?>
            </td>
        </tr>
        <tr>
            <td>
                Invalid Score
            </td>
            <td>
                <?php echo $_GET['Invalid']; ?>
            </td>
        </tr>
    </table>
</body>

</html>