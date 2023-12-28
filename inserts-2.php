<?php

$conn = mysqli_connect('localhost', 'root', '', 'study_group');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `students_and_subjects` (`ID студента`, `Предмет`) VALUES (1, 'PHP');
INSERT INTO `students_and_subjects` (`ID студента`, `Предмет`) VALUES (1, 'Англійська мова');
INSERT INTO `students_and_subjects` (`ID студента`, `Предмет`) VALUES (1, 'JavaScript');
INSERT INTO `students_and_subjects` (`ID студента`, `Предмет`) VALUES (2, 'PHP');
INSERT INTO `students_and_subjects` (`ID студента`, `Предмет`) VALUES (2, 'JavaScript');
INSERT INTO `students_and_subjects` (`ID студента`, `Предмет`) VALUES (3, 'Англійська мова');
INSERT INTO `students_and_subjects` (`ID студента`, `Предмет`) VALUES (3, 'JavaScript');";

if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>\n" . mysqli_error($conn);
}
mysqli_close($conn);
