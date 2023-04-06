<form action="izpis.php" method="get">
    <input type="text" pattern="[a-zčšž]{3,20}" name="beseda" placeholder="vnos besede" /><br />

    <label for="tip1">Soglasniki</label>
    <input type="radio" name="tip" id="tip1" value="sog" /><br />

    <label for="tip2">Kombinacija</label>
    <input type="radio" name="tip" id="tip2" value="kombinacija" /></br>

    <input type="submit" value="submit" />


</form>