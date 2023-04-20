<form method="POST" action="register_script.php">
    <label for="uime">Uporabniško ime</label>
	<input type="text" name="uime" required /><br/>
    <label for="ime">Ime</label>
    <input type="text" name="ime" pattern="[A-Z][a-zA-Z]+" required /><br/>
    <label for="priimek">Priimek</label>
	<input type="text" name="priimek" pattern="[A-Z][a-zA-Z]+" required /><br/>
    <label for="email">Email</label>
	<input type="email" name="email" required /><br/>
    <label for="password">Geslo</label>
    <input type="password" name="geslo" minlength="8" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]+)*" required /><br/>

	<input type="submit" value="register" />
</form>
