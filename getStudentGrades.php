<?php

$grade1 = $_POST['grade1'];
$grade2 = $_POST['grade2'];
$grade3 = $_POST['grade3'];
$grade4 = $_POST['grade4'];
$grade5 = $_POST['grade5'];

function getGrade($score)
{
    switch(true)
    {
        case ($score>=80 && $score<=100):
            return 'A';
            break;
        case ($score>=60 && $score<=79):
            return 'B';
            break;
        case ($score>=50 && $score<=59):
            return 'C';
            break;
        case ($score>=45 && $score<=49):
            return 'D';
            break;
        case ($score>=40 && $score<=44):
            return 'F';
            break;
        case ($score>=0 && $score<=39):
            return 'F';
            break;
        default:
            return 'Invalid Score';
    }
}

$grades=['A'=>0,'B'=>0,'C'=>0,'D'=>0,'F'=>0,'Invalid Score'=>0];

if(is_numeric($grade1) && ($grade1>=0 && $grade1<=100))
{
    getGrade($grade1);
    //associate the grade with the count
    $grades[getGrade($grade1)]+=1;
}

if(is_numeric($grade2) && ($grade2>=0 && $grade2<=100))
{
    getGrade($grade2);
    //associate the grade with the count
    $grades[getGrade($grade2)]+=1;
}

if(is_numeric($grade3) && ($grade3>=0 && $grade3<=100))
{
    getGrade($grade3);
    //associate the grade with the count
    $grades[getGrade($grade3)]+=1;
}

if(is_numeric($grade4) && ($grade4>=0 && $grade4<=100))
{
    getGrade($grade4);
    //associate the grade with the count
    $grades[getGrade($grade4)]+=1;
}

if(is_numeric($grade5) && ($grade5>=0 && $grade5<=100))
{
    getGrade($grade5);
    //associate the grade with the count
    $grades[getGrade($grade5)]+=1;
}

print_r($grades);

//redirect to from page with grade query strings
//header('location:form.php?A='.$grades['A'].'&B='.$grades['B'].'&C='.$grades['C'].'&D='.$grades['D'].'&F='.$grades['F'].'&Invalid='.$grades['Invalid Score']);
exit();