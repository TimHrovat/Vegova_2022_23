<?php
session_start();

if (!isset($_SESSION["uime"])) {
    header("location: prijava.php");
}
?>

<h1>Nalaganje nove datoteke</h1>

<form action="nalozi.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="dat" required /> <br/>
    <input type="checkbox" name="prepisi" /> Prepiši obstoječo <br/>
    Tip datoteke: <select name="tip" required>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "galerija");
            $q = "select tID, tip from tipdatoteke order by tip";
            $rs = mysqli_query($conn, $q);

            while ($x = mysqli_fetch_assoc($rs)) {
                echo '<option value="' . $x["tID"] . '">' . $x["tip"] . '</option>';
            }
        ?>
    </select><br>
    Javna: <input type="radio" name="vidnost" value="javna" checked>
    Zasebna: <input type="radio" name="vidnost" value="zasebna"><br>
    <input type="submit" value="prenesi" /> <br/>
</form>

<br>

<h1>Prikaz lastne vsebine</h1>
<a href="ogledDatotek.php">Prikaz lastne vsebine</a>

<br><br>

<h1>Ogled javnih slik</h1>
<form action="ogledJavnihSlik.php">
    <select name="ime" required>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "galerija");
            $rs = mysqli_query($conn, "SELECT uName FROM uporabnik");
            while ($x = mysqli_fetch_assoc($rs))
                echo '<option value="'.$x["uName"].'">'.$x["uName"].'</option>';
        ?>
    </select><br>
    <input type="submit" value="Ogled">
</form>

<br>

<h1>Brisanje datotek</h1>
<a href="brisanjeDatotek.php">Meni za brisanje datotek</a>

<br><br>
<h1>Odjava</h1>
<form action="odjava.php">
    <input type="submit" value="Odjava">
</form>
