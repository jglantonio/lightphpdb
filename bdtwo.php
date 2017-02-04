<?php
include("head.php");
include("Class/Class_bdpdo.php");
$pdo = new Class_bdpdo();
if(isset($_POST) && !empty($_POST) || isset($_GET["id"]) && !empty($_GET)) {

    if (isset($_GET["id"])) {
        if ($_GET["id"]){
            $pdo->delete($_GET);
        }
    } else {
        $pdo->insert($_POST);
    }
}
?>
<body>
<div class="container">
    <form method="post" action = "bdone.php">
        <label>Nombre :</label>
        <input type="text" name="cerveza" value="">
        <label>Pais :</label>
        <input type="text" name="pais" value="">
        <input type="submit" name="add" value="Añadir cerveza">
    </form>
    <?php
    if(isset($_GET["action"])){
        echo $pdo->getTime()." Segundos";
    }
    ?>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Pais</th>
        </tr>
        <?php
        $beers = $pdo->select();
        foreach($beers as $beer){
            echo"<tr>
                        <td>".$beer['name']."</td>
                        <td>".$beer['country']."</td>
                        <td>
                        <a href='bdone.php?id=".$beer['id']."'>Delete</a>
                     </td>";
            echo"</tr>";
        }
        ?>
    </table>
    <div> <?php echo $pdo->getTime(); ?> Segundos</div>
</div>
</body>
</html>