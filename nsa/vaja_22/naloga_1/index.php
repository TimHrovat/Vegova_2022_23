<form action="shrani.php" method="GET">
    <label for="stavbaid">StavbaID</label>
    <input type="number" min="0" name="stavbaid" id="stavbaid" required /> <br />
    <label for="naslov">Naslov</label>
    <input type="text" minlength="2" maxlength="30" name="naslov" id="naslov" pattern="[A-ZČŠŽ][A-ZČŠŽa-zčšž]{2,30}" required /> <br />
    <label for="kraj">Kraj</label>
    <input type="text" minlength="2" maxlength="30" name="kraj" id="kraj" pattern="[A-ZČŠŽ][A-ZČŠŽa-zčšž]{2,30}" required /> <br />
    <input type="submit" value="shrani" />
</form>