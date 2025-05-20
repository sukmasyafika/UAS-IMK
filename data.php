<?php
$conn = mysqli_connect("localhost", "root", "", "mahasiswa");

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
$rows = [];

while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}

header('Content-Type: application/json');
echo json_encode($rows);
