<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meine Bewertungen</title>
</head>
<body>

<table>
    <tr>
        <td>UserID</td>
        <td>GerichtID</td>
        <td>Kommentar</td>
        <td>Sterne Bewertung</td>
        <td>Löschen</td>
    </tr>

    @foreach($bewertungen as $bewertung)
        <tr>
            <td>{{$bewertung['UserID']}}</td>
            <td>{{$bewertung['DishID']}}</td>
            <td>{{$bewertung['Kommentar']}}</td>
            <td>{{$bewertung['sternebewertung']}}</td>
            <td><a href="/loeschen?id={{$bewertung['id']}}">Löschen</a></td>
        </tr>
    @endforeach
</table>

</body>
</html>