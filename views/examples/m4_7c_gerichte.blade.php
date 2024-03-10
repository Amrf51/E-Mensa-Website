<?php
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Page 1</title>
</head>
<body>


<ul>
    @forelse($ernesto as $ausgabe)
        <li>{{$ausgabe['name']}} :  {{$ausgabe['preis_intern']}} €</li>
    @empty
        <li>Keine Daten vorhanden</li>
    @endforelse
</ul>


</body>
</html>