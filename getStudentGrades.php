<?php

// Collect inputs safely (unset -> null)
$grade1 = isset($_POST['grade1']) ? $_POST['grade1'] : null;
$grade2 = isset($_POST['grade2']) ? $_POST['grade2'] : null;
$grade3 = isset($_POST['grade3']) ? $_POST['grade3'] : null;
$grade4 = isset($_POST['grade4']) ? $_POST['grade4'] : null;
$grade5 = isset($_POST['grade5']) ? $_POST['grade5'] : null;

function getGrade($score)
{
    switch (true) {
        case ($score >= 80 && $score <= 100):
            return 'A';
        case ($score >= 60 && $score <= 79):
            return 'B';
        case ($score >= 50 && $score <= 59):
            return 'C';
        case ($score >= 45 && $score <= 49):
            return 'D';
        case ($score >= 40 && $score <= 44):
            return 'E';
        case ($score >= 0 && $score <= 39):
            return 'F';
        default:
            return 'Invalid Score';
    }
}

$grades = ['A' => 0, 'B' => 0, 'C' => 0, 'D' => 0, 'E' => 0, 'F' => 0, 'Invalid Score' => 0];

// Helper to process one score
function process_score($score, &$grades)
{
    if ($score === null || $score === '') {
        $grades['Invalid Score'] += 1;
        return;
    }
    if (!is_numeric($score)) {
        $grades['Invalid Score'] += 1;
        return;
    }
    $num = 0 + $score; // cast numeric
    if ($num < 0 || $num > 100) {
        $grades['Invalid Score'] += 1;
        return;
    }
    $grades[getGrade((int)$num)] += 1;
}

process_score($grade1, $grades);
process_score($grade2, $grades);
process_score($grade3, $grades);
process_score($grade4, $grades);
process_score($grade5, $grades);

// Redirect to view with counts as query params (no output before header)
header('Location: viewResultStats.php?A=' . $grades['A'] . '&B=' . $grades['B'] . '&C=' . $grades['C'] . '&D=' . $grades['D'] . '&E=' . $grades['E'] . '&F=' . $grades['F'] . '&Invalid=' . $grades['Invalid Score']);
exit();
