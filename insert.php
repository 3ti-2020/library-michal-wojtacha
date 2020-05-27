<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "library";
 $conn = new mysqli($servername, $username, $password, $dbname);
 $sql = "INSERT INTO autorzy (id_autor, imie, nazwisko) VALUES (NULL, '".$_POST['imie']."', '".$_POST['nazwisko']."') ";
 mysqli_query($conn, $sql);
 header('Location: http://127.0.0.1/lib/index.php');
?>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "library";
 $conn = new mysqli($servername, $username, $password, $dbname);
 $isbn = rand(0,999);
 $sql = "INSERT INTO tytuly(id_tytul, tytul, isbn) VALUES (NULL , '".$_POST['tytul']."', $isbn) ";
 mysqli_query($conn, $sql);
 header('Location: http://127.0.0.1/lib/index.php');
?> 