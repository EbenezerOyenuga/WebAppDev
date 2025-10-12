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
    <form action="getStudentGrades.php" method="POST" novalidate>
        <p>
            <label for="grade1">Student 1 Grade</label>
            <input type="number" name="grade1" id="grade1" min="0" max="100" required inputmode="numeric" />
        </p>
        <p>
            <label for="grade2">Student 2 Grade</label>
            <input type="number" name="grade2" id="grade2" min="0" max="100" required inputmode="numeric" />
        </p>
        <p>
            <label for="grade3">Student 3 Grade</label>
            <input type="number" name="grade3" id="grade3" min="0" max="100" required inputmode="numeric" />
        </p>
        <p>
            <label for="grade4">Student 4 Grade</label>
            <input type="number" name="grade4" id="grade4" min="0" max="100" required inputmode="numeric" />
        </p>
        <p>
            <label for="grade5">Student 5 Grade</label>
            <input type="number" name="grade5" id="grade5" min="0" max="100" required inputmode="numeric" />
        </p>

        <input type="submit" value="Submit Grades" />
    </form>
    <hr>
</body>
</html>