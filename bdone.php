<?php
include("head.php");
include("Class/Class_bdmysqli.php");
$mysqli = new Class_bdmysqli();
if(isset($_POST) && !empty($_POST) || isset($_GET["id"]) && !empty($_GET)) {

    if (isset($_GET["id"])) {
        if ($_GET["id"]){
            $mysqli->delete($_GET);
        }
    } else {
        $mysqli->insert($_POST);
    }
}
?>
<body>
<div class="container">
    <div class="beers-table">
        <form method="post" action = "bdone.php" >
            <label >Nombre :</label>
            <input type="text" name="cerveza" value="">
            <label >Pais :</label>
            <input type="text" name="pais" value="">
            <input type="submit" name="add" value="Añadir cerveza" class="btn">
        </form>
        <?php
        if(isset($_GET["action"])){
            echo $mysqli->getTime()." Segundos";
        }
        ?>
        <table class="table">
            <tr>
                <th>Nombre</th>
                <th>Pais</th>
                <th>Accion</th>
            </tr>
            <?php
            $beers = $mysqli->select();
            foreach($beers as $beer){
                echo"<tr>
                        <td >$beer[1]</td>
                        <td>$beer[2]</td>
                        <td>
                        <a href='bdone.php?id=".$beer[0]."'>Delete</a>
                     </td>";
                echo"</tr>";
            }
            ?>
        </table>
        <div> <?php echo $mysqli->getTime(); ?> Segundos</div>
        <div>
            <a class="btn"href="index.php">Atras</a>
        </div>
    </div>

</div>
</body>
<?php
    include("footer.php");
?>
</html>