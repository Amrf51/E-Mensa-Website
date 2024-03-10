
<form action="/anmeldung_verifizieren" method="post">
    <label for="email">E-Mail:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Passwort:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Anmeldung">
</form>
@if(isset($msg)){{$msg}}@endif