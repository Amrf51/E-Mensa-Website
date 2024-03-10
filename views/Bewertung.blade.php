<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewertungsformular</title>

    <style>

        body {

            width: 800px;
            margin: auto;

        }

        form {
            width: 800px;
            padding-top: 40px;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
        }
        .stars{

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: space-around;
            flex-wrap: wrap;
            padding-top: 60px;


        }
        label {
            text-align: center;
        }
        #buttonneu{
            width: 200px;
        }
        .zusatz {
            text-align: center;
        }




        @media only screen and (max-width: 600px) {

            form {
                width: 400px;
                padding-top: 40px;
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
            }
            .stars{

                display: flex;
                flex-direction: column;
                justify-content: center;
                align-content: space-around;
                flex-wrap: wrap;
                padding-top: 60px;

            }
            label {
                text-align: center;
            }

            img{
                display: flex;

            }
            #buttonneu{
                width: 200px;
            }
        }



    </style>
</head>
<body>
<h1>Bewertungsformular</h1>
<section class="zusatz">
    @foreach($gericht as $g)
        {{$g["name"]}}
        <img id="bild" src="/img/gerichte/{{$g['bildname']}}" style="width:200px;"> @endforeach</section>
<form method="post" action="/bewertung">
    <label class="stars" for="rating">Sterne-Bewertung:
        <select name="top4" id="4">
            <option value="sehr_gut">Sehr gut</option>
            <option value="gut">Gut</option>
            <option value="schlecht">Schlecht</option>
            <option value="sehr_schlecht">Sehr schlecht</option>
        </select>
    </label>
    <br>

    <label for="comment">Bemerkung (mindestens 5 Zeichen):</label>
    <textarea name="comment" id="comment" required></textarea>
    <br>

    <?php if ( $_SESSION['login_ok'] = true): ?>
    <label for="highlighted">Hervorheben:</label>
    <input type="checkbox" name="highlighted" id="highlighted">
    <br>
    <?php endif; ?>

    <button id="buttonneu" type="submit">Bewertung absenden</button>
</form>
</body>
</html>