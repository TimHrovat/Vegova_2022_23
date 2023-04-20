<?php
$servername = "127.0.0.1";
$username = "root";
$password = null;
$dbname = "geometrija";

// Ustvari povezavo z bazo podatkov
$conn = new mysqli($servername, $username, $password, $dbname);

// Preveri, če je prišlo do napake pri povezavi
if ($conn->connect_error) {
    die("Povezava ni uspela: " . $conn->connect_error);
}

// Preveri, če je obrazec poslan z metodo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Preveri, če sta vrednosti vneseni za "barvaID" in "barva"
    if (empty($_POST["barvaID"]) || empty($_POST["barva"])) {
        echo "Prosim, izpolnite vsa polja.";
    } else {
        // Pripravi SQL stavek za vstavljanje podatkov v tabelo "Barve"
        $sql = "INSERT INTO Barve (barvaID, barva)
    VALUES (?, ?)";

        // Pripravi SQL stavek za izvajanje
        $stmt = $conn->prepare($sql);

        // Poveži parametre s SQL stavkom
        $stmt->bind_param("is", $barvaID, $barva);

        // Nastavi vrednosti parametrov
        $barvaID = $_POST["barvaID"];
        $barva = $_POST["barva"];

        // Izvedi SQL stavek in preveri, če je bil uspešen
        if ($stmt->execute()) {
            echo "Zapis dodan.";
        } else {
            echo "Prišlo je do napake, zapis NI dodan.";
        }
    }

    // Zapri pripravljen SQL stavek in povezavo z bazo podatkov
    $stmt->close();
    $conn->close();
}
?>

<!-- Oblika za vnos podatkov -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Barva ID: <input type="number" name="barvaID"><br>
    Barva: <input type="text" name="barva"><br>
    <input type="submit" name="submit" value="Dodaj zapis">
</form>