<?php
?>

        <!DOCTYPE html>
<html lang="de">
<head>
    <title>Page 1</title>
    <style type="text/css">
        li:nth-child(even){font-weight: bold;}
    </style>
</head>
<body>


<ul>
    @forelse($data as $ergebnisse)
        <li>{{$ergebnisse['name']}}</li>
    @empty
        <li>Keine Daten vorhanden</li>
    @endforelse
</ul>

</body>
</html>