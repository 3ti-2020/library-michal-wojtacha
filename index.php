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
    <input type="text" name="imie">
    <p>Nazwisko</p>
    <input type="text" name="nazwisko">
    <p>Tytul</p>
    <input type="text" name="tytul"> <br>
    <input type="submit" value="DODAJ"> 
    </form>
    <?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "library";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $result_autor = $conn->query("SELECT * FROM autorzy");
    $result_tytuly = $conn->query("SELECT * FROM tytuly");

    echo("<form action='krzyz.php' method='POST'  class='insert'>");
    echo("<select name='autor'>");
    while($wiersz=$result_autor->fetch_assoc() ){
        echo("<option value='".$wiersz['id_autor']."'>".$wiersz['imie']." ".$wiersz['nazwisko']."</option>");
    }
    echo("</select>");

    echo("<select name='tytul'>");
    while($wiersz=$result_tytuly->fetch_assoc() ){
        echo("<option value='".$wiersz['id_tytul']."'>".$wiersz['tytul']."</option>");
    }
    echo("</select>");

    echo("<input type='submit' value='DODAJ'>");
    echo("</form>");
    ?>
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
        echo("<tr class='row'>");
        echo("<td>".$wiersz['id_krzyz']."</td>".
        "<td>".$wiersz['imie']."</td>".
        "<td>".$wiersz['nazwisko']."</td>".
        "<td>".$wiersz['tytul']."</td>". 
        "<td>".$wiersz['isbn']."</td>".
        "<td>
        <form action='delete.php' method='POST'>
        <input type='hidden' name='id' value=".$wiersz['id_krzyz'].">
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