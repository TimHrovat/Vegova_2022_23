<form method="GET" action="izpis.php">

        <?php 
            require_once("prostornina.php");

            foreach ($prostornina as $key => $value) {
                echo '<label for="'.$key.'">'.$key.'</label><br>';
                echo '<input type="checkbox" value="'.$key.'">';
            }
        ?>

    <input type="submit" value="izpis">
</form>