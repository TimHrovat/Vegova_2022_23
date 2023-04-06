<form method="GET" action="izpis.php">
    <label for="x">Podatek: </label>
    <input type="number" name="x" required><br/>

    <input type="submit" name="sodi_delitelji" value="Sodi delitelji"> 
    <input type="submit" name="lihi_delitelji" value="Lihi delitelji"> 
    <input type="submit" name="vsi_delitelji" value="Vsi delitelji"> 
</form>


<style>
    input {
        margin-bottom: 10px;
    }

    table, tr, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>