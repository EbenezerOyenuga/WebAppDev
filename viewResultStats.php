
<?php
    //Input Sanitization
    //Casting
    $A = $_GET['A'];
    $A = (int) $A;

    $B = $_GET['B'];
    $B = (int) $B;

    $C = $_GET['C'];
    $C = (int) $C;

    $D = $_GET['D'];
    $D = (int) $D;

    $E = $_GET['E'];
    $E = (int) $E;

    $F = $_GET['F'];
    $F = (int) $F;

    $Invalid_Score = $_GET['Invalid'];
    $Invalid_Score = (int) $Invalid_Score;

    // var_dump($Invalid_Score);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1px">
        <tr>
            <td>
                A
            </td>
            <td>
                <?php echo $A; ?>
            </td>
        </tr>
        <tr>
            <td>
                B
            </td>
            <td>
                <?php echo $B; ?>
            </td>
        </tr>
        <tr>
            <td>
                C
            </td>
            <td>
                <?php echo $C; ?>
            </td>
        </tr>
        <tr>
            <td>
                D
            </td>
            <td>
                <?php echo $D; ?>
            </td>
        </tr>
        <tr>
            <td>
                E
            </td>
            <td>
                <?php echo $E; ?>
            </td>
        </tr>
        <tr>
            <td>
                F
            </td>
            <td>
                <?php echo $F; ?>
            </td>
        </tr>
        <tr>
            <td>
                Invalid Score
            </td>
            <td>
                <?php echo $Invalid_Score; ?>
            </td>
        </tr>
    </table>
</body>

</html>