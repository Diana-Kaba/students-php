<?php

$conn = mysqli_connect('localhost', 'root', '', 'study_group');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql1="ALTER TABLE `training_part` ADD `ID` INT NOT NULL AUTO_INCREMENT primary key;";
$sql2="UPDATE `training_part` SET `Відвідуваність` = '35%' WHERE `Середній бал` = 3.5";

if (mysqli_query($conn, $sql1)) {
    echo "The query 1 processed successfully";
} else {
    echo "Error the query 1 processed: " . mysqli_error($conn);
}
if (mysqli_query($conn, $sql2)) {
    echo "The query 2 processed successfully";
} else {
    echo "Error the query 2 processed: " . mysqli_error($conn);
}

mysqli_close($conn);