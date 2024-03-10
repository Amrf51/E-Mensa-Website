<!DOCTYPE html>
<!--
- Praktikum DBWT. Autoren:
- Miranda Dreshaj, 3591563
- Valerija Brosowski, 3583522
-->
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>E-Mensa</title>
    <style>
        * {
            font-family: "Chalkboard", sans-serif;
        }
        body {
            margin: auto;
            align-content: center;
            border-width: 1px;
            border-style: solid;

        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid black;
            padding: 10px;
            background-color: #8b5a2b;
        }
        nav{
            display: flex;
            border: 1px solid black;
            padding: 15px;
            background-color: blanchedalmond;
        }
        nav a {
            margin: 0 15px 0 15px;
        }

        .logo {
            border: 1px solid black;
            margin: 10px;
            width: auto;
            padding: 15px;
            background-color: blanchedalmond;
        }

        .anfang{
            padding: 50px;
        }

        .text
        {
            border: 1px solid black;
            padding: 10px;
            background-color: white;
        }


        .speisen {
            padding: 50px;

        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            background-color: white;
        }

        .grid-container {
            font-weight: bold;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
            margin-bottom: 50px;
            padding: 20px;
        }
        .grid-item {
            text-align: center;
        }

        .grid-container2 {
            display: grid;
            grid-template-columns: 200px 200px 300px;
        }

        .grid-item2 select {
            display: block;
        }

        .zahlen {
            padding: 50px;
        }

        .kontakt {
            padding: 50px;
        }
        .button {
            text-align: right;
            margin-bottom: 50px;
        }

        .wichtig {
            padding: 50px;
        }
        .liste {
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }
        .bottom
        {
            text-align: center;
            margin-top: 50px;
        }
        .unten{
            border-top: 1px solid black;
            display: flex;
            justify-content: center;
            padding: 30px;
        }
        .foto{
            padding: 20px;
            display: flex;
            flex-direction: column;
            width: auto;
        }
        main {
            background-color: blanchedalmond;
            display: grid;
        }
        footer{
            background-color: #8b5a2b;
            color: blanchedalmond;
        }
    </style>

</head>
<body>
<header>
    <div class="logo">E-Mensa Logo</div>
    <nav id="main-nav">
        <a href=#Ankuendigung>Ankündigung</a>
        <a href=#Speisen>Speisen</a>
        <a href=#Zahlen>Zahlen</a>
        <a href=#Kontakt>Kontakt</a>
        <a href=#Wichtigfueruns>Wichtig für uns</a>

    </nav>
</header>
<main>
    <div class="foto">
        <img src="img/food.jpg" alt="Bild"> </div>
    <section class="anfang">
        <h2 id="Ankuendigung">Bald gibt es Essen auch online ;)</h2>
        <div class="text">Lorem ipsum doler sit amet, consectetur adipisicing elit, sed do eiusmad tempor incididunt ut labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. ouis aute irure dolar in reprehenderit in voluptate velit esse cillum
            dolore eu fuaiat nulla pariatur. Excepteur sint accaecat cupidatat non proident, sunt in culpa qui
            officia deserünt mollit anim id est laborum.
            sed ut perspiciatis unde amnis iste natus error sit voluptatem accusantium doloremque laudantium,
            totam rem aperiam, eaque ipsa quae alo illo inventore veritatis et quasi architecto beatae vitae
            dicta Sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
            sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</div>
    </section>

    <br>


    <section class="wichtig">
        <h2 id="Wichtigfueruns">Das ist uns wichtig</h2>
        <div class="liste">
            <ul>
                <li>Beste frische saisonale Zutaten</li>
                <li>Ausgewogene abwechslungsreiche Gerichte</li>
                <li>Sauberkeit</li>
            </ul>
        </div>
    </section>
    <section class="bottom">
        <h3>Wir freuen uns auf Ihren Besuch!</h3>
    </section>
</main>

<footer>
    <div class="unten">
        (c) E-Mensa GmbH |
        Houdaifa &amp; Amr | <a href="impressum"> Impressum</a>
    </div>
</footer>
</body>

</html>

