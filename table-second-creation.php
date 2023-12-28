<?php

$conn = mysqli_connect('localhost', 'root', '', 'study_group');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql1="SET NAMES utf8mb4;";
$sql2="SET CHARACTER SET utf8mb4;";
if (mysqli_query($conn, $sql1)) {
    echo "SET CHARACTER SET 1 successfully";
} else {
    echo "Error SET CHARACTER SET: " . mysqli_error($conn);
}
if (mysqli_query($conn, $sql2)) {
    echo "SET CHARACTER SET 2 successfully";
} else {
    echo "Error SET CHARACTER SET: " . mysqli_error($conn);
}

$sql = "CREATE TABLE `training_part` (
`ID студента` INT NOT NULL,
`Середній бал` FLOAT NOT NULL,
`Відвідуваність` VARCHAR(255) NOT NULL
);";
if (mysqli_query($conn, $sql)) {
    echo "Table `training_part` created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);