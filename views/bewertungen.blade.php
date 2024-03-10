<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewertungen</title>
</head>
<body>

<table>
    <tr>
        <td>UserID</td>
        <td>GerichtID</td>
        <td>Kommentar</td>
        <td>Sterne Bewertung</td>
    </tr>

    @foreach($bewertungen as $bewertung)
        <tr @if($bewertung['Hervorgehoben']) style="background-color: #0dcaf0" @endif>
            <td>{{$bewertung['UserID']}}</td>
            <td>{{$bewertung['DishID']}}</td>
            <td>{{$bewertung['Kommentar']}}</td>
            <td>{{$bewertung['sternebewertung']}}</td>
            @if(!$bewertung['Hervorgehoben'])
                <td><a href="/hervorheben?id={{$bewertung['id']}}">Hervorheben</a></td>
            @else
                <td><a href="/hervorheben_aufheben?id={{$bewertung['id']}}">Aufheben</a></td>
            @endif
        </tr>
    @endforeach
</table>

</body>
</html>
