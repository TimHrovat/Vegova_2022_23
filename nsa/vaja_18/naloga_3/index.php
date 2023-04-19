<?php
require_once 'baza.php';

$conn = new mysqli("localhost", "root", "", "bazaOseb");

$kraji = $conn->query("SELECT * FROM kraj");

$conn->close();

?>

<style>
  table {
    margin-top: 16px;
    border-collapse: collapse;
  }

  th,
  td {
    border: 1px solid black;
    padding: 5px;
  }
</style>

<body>

  <form action="naloga_3.php">
    <select name="kraj">
      <?php while ($row = $kraji->fetch_assoc()) { ?>
        <option value="<?= $row['KID'] ?>" <?= $row['KID'] === $kraj ? 'selected' : '' ?>><?= $row['imeKraja'] ?></option>
      <?php } ?>
    </select>
    <button type="submit">Prikaži</button>
  </form>

</body>

</html>
