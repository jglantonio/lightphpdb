<?php include("head.php");?>
<body>
    <div class="container">
        <form method="post" action = "submit.php">
            <label>Nombre :</label>
            <input type="text" name="cerveza" value="">
            <label>Pais :</label>
            <input type="text" name="pais" value="">
            <input type="submit" name="add" value="Añadir cerveza">
        </form>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Pais</th>
            </tr>
            <?php
            include("Class/Class_bdmysqli.php");
            $mysqli = new Class_bdmysqli();
            $beers = $mysqli->select();
            foreach($beers as $beer){
                echo"<tr>
                        <td>$beer[1]</td>
                        <td>$beer[2]</td>
                    <td>
                    <a href='#'>Delete</a>
                </td>";
                echo"</tr>";
            }
            ?>
        </table>
        <div> <?php echo $mysqli->getTime(); ?> Segundos</div>
    </div>
</body>
</html>