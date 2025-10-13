<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>         
</head>
<body>
    <h1>Form Handling With PHP</h1>
    <h3>Grades for IFT301</h3>
    <hr>
    <form action="getStudentGrades.php" method="POST">
            <p><label for="">Student 1 Grade</label>
                <input type="number" name="grade1" id="">
            </p>
            <p><label for="">Student 2 Grade</label>
                <input type="number" name="grade2" id="">
            </p>
            <p><label for="">Student 3 Grade</label>
                <input type="number" name="grade3" id="">
            </p>
            <p><label for="">Student 4 Grade</label>
                <input type="number" name="grade4" id="">
            </p>
            <p><label for="">Student 5 Grade</label>
                <input type="text" name="grade5" id="">
            </p>

            <input type="submit" value="Submit Grades">
    </form>
    
    <hr>
    
</body>