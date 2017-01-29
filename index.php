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
            foreach($beers as $beer){
                echo"<td>$beer->name</td>";
                echo"<td></td>";
                echo"<td>
                    <a href='#'>Delete</a>
                </td>";
            }
            ?>
        </table>
    </div>
</body>
</html>