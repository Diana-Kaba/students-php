<?php

$conn = mysqli_connect('localhost', 'root', '', 'study_group');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `students` (`Ім'я`, `Прізвище`, `Дата народження`) VALUES ('Іван', 'Іванов', '1986-04-28');
INSERT INTO `students` (`Ім'я`, `Прізвище`, `Дата народження`) VALUES ('Іван', 'Петров', '1987-01-14');
INSERT INTO `students` (`Ім'я`, `Прізвище`, `Дата народження`) VALUES ('Петро', 'Іванов', '1986-04-20');

INSERT INTO `training_part` (`ID студента`, `Середній бал`, `Відвідуваність`) VALUES (1, 5.0, '100%');
INSERT INTO `training_part` (`ID студента`, `Середній бал`, `Відвідуваність`) VALUES (3, 3.5, '25%');
INSERT INTO `training_part` (`ID студента`, `Середній бал`, `Відвідуваність`) VALUES (2, 4.7, '85%');

INSERT INTO `subjects` (`Назва предмета`, `Кількість годин`) VALUES ('PHP', 640);
INSERT INTO `subjects` (`Назва предмета`, `Кількість годин`) VALUES ('Англійська мова', 480);
INSERT INTO `subjects` (`Назва предмета`, `Кількість годин`) VALUES ('JavaScript', 320);";

if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>\n" . mysqli_error($conn);
}
mysqli_close($conn);
