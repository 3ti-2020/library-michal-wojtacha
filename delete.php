<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "library";
 $conn = new mysqli($servername, $username, $password, $dbname);
 $id = $_POST['id'];
 $sql = "DELETE from krzyz WHERE id_krzyz='$id'";
 mysqli_query($conn, $sql);
 header('Location: http://127.0.0.1/lib/index.php');
?>