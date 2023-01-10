<form method="GET" action="izpis.php">
    <label for="x">Vpiši drugo število: </label>
    <input type="number" name="x" step="0.1" required><br/>

    <label for="y">Vpiši drugo število: </label>
    <input type="number" name="y" step="0.1" required><br/>

    <label for="submit">Izberi operacijo</label>
    <input type="submit" name="plus" value="plus"> 
    <input type="submit" name="krat" value="krat"> 
</form>


<style>
    input {
        margin-bottom: 10px;
    }
</style>