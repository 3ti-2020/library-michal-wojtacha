<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="cont">
    <div class="sider">
    <form action="insert.php" method="post">
    <p>Imie</p>
    <input type="text" id="imie">
    <p>Nazwisko</p>
    <input type="text" id="Nazwisko">
    <p>Tytul</p>
    <input type="text" id="tytul"> <br>
    <input type="submit" value="DODAj"> 
    </form>
    </div>
    <div class="mainer">
    <?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $result = $conn->query("SELECT id_krzyz, imie, nazwisko, tytul, isbn FROM krzyz, autorzy, tytuly WHERE krzyz.id_autor=autorzy.id_autor AND krzyz.id_tytul=tytuly.id_tytul");

    echo("<table>");
    echo("<tr>
    <th>id_krzyz</th>
    <th>imie</th>
    <th>nazwisko</th>
    <th>tytul</th>
    <th>isbn</th>
    <th>Delete</th>
    </tr>");
    while( $wiersz = $result->fetch_assoc() ) {
        echo("<tr>");
        echo("<td>".$wiersz['id_krzyz']."</td>".
        "<td>".$wiersz['imie']."</td>".
        "<td>".$wiersz['nazwisko']."</td>".
        "<td>".$wiersz['tytul']."</td>". 
        "<td>".$wiersz['isbn']."</td>".
        "<td>
        <form action='delete.php' method='POST'>
        <input type='hidden' value=".$wiersz['id_krzyz'].">
        <input type='submit' value='delete'>
        </form> </td>"
    );
        echo("</tr>");
    }
    echo("</table>");
    ?>
    </div>
    </div> 
</body>
</html>