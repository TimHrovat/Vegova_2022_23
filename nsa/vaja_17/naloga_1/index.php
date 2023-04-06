<form action="izpis.php" method="get">
    <input type="number" name="stolpci" max="9" min="1" pattern="[1-9]" required /><br />
    <input type="number" name="vrstice" max="9" min="1" pattern="[1-9]" required /><br/>

    <label for="diagonala">Barva diagonale</label>
    <input type="color" name="diagonala" id="diagonala" required /><br/>
    <label for="ostalo">Barva ostalega</label>
    <input type="color" name="ostalo" id="ostalo" required /><br/>

    <input type="submit" value="submit" />
</form>