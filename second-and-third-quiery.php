<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Студенти</title>
    <style>
        table,th,tr,td {
            border: 1px solid black;
            padding: 10px;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<?php

$conn = new mysqli('localhost', 'root', '', 'study_group');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql1 = "SELECT `students`.`Ім'я`, `students`.`Прізвище`, DATE_FORMAT(`students`.`Дата народження`, '%d %b %Y'), `Середній бал`, `Відвідуваність` FROM students
JOIN `training_part` ON `students`.ID = `training_part`.`ID студента`
WHERE `Середній бал`> 4.5
ORDER BY `Середній бал` DESC;";
$sql2 = "SELECT `students`.`Ім'я`, `students`.`Прізвище`, `Назва предмета`, `Кількість годин` FROM students
JOIN `students_and_subjects` ON `students`.`ID` = `students_and_subjects`.`ID студента`
JOIN `subjects` ON `students_and_subjects`.`Предмет` = `subjects`.`Назва предмета`;";
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

if ($result1->num_rows > 0) {
    echo '<table><tr><th>Ім\'я</th><th>Прізвище</th><th>Дата народження</th><th>Середній бал</th><th>Відвідуваність</th></tr>';
    while ($row = $result1->fetch_assoc()) {
        echo "<tr><td>{$row['Ім\'я']}</td><td>{$row['Прізвище']}</td><td>{$row["DATE_FORMAT(`students`.`Дата народження`, '%d %b %Y')"]}</td><td>{$row['Середній бал']}</td><td>{$row['Відвідуваність']}</td></tr>";
    }
    echo '</table><br>';
}
if ($result2->num_rows > 0) {
    echo '<table><tr><th>Ім\'я</th><th>Прізвище</th><th>Назва предмета</th><th>Кількість годин</th></tr>';
    while ($row = $result2->fetch_assoc()) {
        echo "<tr><td>{$row['Ім\'я']}</td><td>{$row['Прізвище']}</td><td>{$row["Назва предмета"]}</td><td>{$row['Кількість годин']}</td></tr>";
    }
    echo '</table><br>';
} else {
    echo "<p>Немає результатів</p>";
}

$conn->close();
?>
</body>
</html>