<!DOCTYPE html>
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
        <img src="food.jpg" alt="Bild"> </div>
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

    <section class="speisen">
        <h2 id="Speisen"> Köstlichkeiten, die Sie erwarten </h2>
        <?php
        $link = mysqli_connect("localhost", // Host der Datenbank
            "root",                 // Benutzername zur Anmeldung
            "newrootpassword",    // Passwort
            "emensawerbeseite"      // Auswahl der Datenbanken (bzw. des Schemas)
        // optional port der Datenbank
        );

        if (!$link) {
            echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
            exit();
        }

        $sql="SELECT name, preis_intern, preis_extern, GROUP_CONCAT(code)  
            FROM  gericht INNER JOIN gericht_hat_allergen
            on gericht.id=gericht_hat_allergen.gericht_id
            GROUP BY name  
            limit 5"; // group_concat kombiniert die Produkte für jede Kategorie und gibt sie in einer Zeichenkette aus

        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);


        if (!$result) {
            echo "Fehler während der Abfrage: ", mysqli_error($link);
            exit();
        }
        echo '<table>';
        echo'<tr>';
        echo'<th>Name</th>';
        echo'<th>Preis intern</th>';
        echo'<th>Preis extern</th>';
        echo'<th>Allergen</th>';
        echo'</tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo'<tr>';
            echo '<td>' . htmlspecialchars($row['name']) . '</td>';
            echo '<td>' . htmlspecialchars($row['preis_intern']) . '</td>';
            echo '<td>' . htmlspecialchars($row['preis_extern']) . '</td>';
            echo '<td>' . htmlspecialchars($row['GROUP_CONCAT(code)']) . '</td>';
            echo'</tr>';
        }


        $sql = "
SELECT gericht.name, GROUP_CONCAT(allergen.name), GROUP_CONCAT(gericht_hat_allergen.code)
FROM  gericht
inner JOIN gericht_hat_allergen
on gericht.id = gericht_hat_allergen.gericht_id
inner Join allergen on allergen.code=gericht_hat_allergen.code
GROUP BY gericht.name
limit 5
";

        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (!$result) {
            echo "Fehler während der Abfrage: ", mysqli_error($link);
            exit();
        }

        echo '<ul>';
        echo '<table>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li>' .$row['GROUP_CONCAT(allergen.name)'] . '  :  '.' <br> ' .$row['GROUP_CONCAT(gericht_hat_allergen.code)'];
        }
        mysqli_free_result($result);
        mysqli_close($link);
        ?>
    </section>
    <br>
    <section class="zahlen">
        <h2 id="Zahlen"> E-Mensa in Zahlen</h2>
        <div class="grid-container">
            <div class="grid-item"><?php
                $link=mysqli_connect( hostname: "localhost", username: "root", password: "newrootpassword", database: "emensawerbeseite");

                $update= "UPDATE Besuche SET anzahl= anzahl+1";
                $stmt = mysqli_prepare($link, $sql);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (!$link) { echo "Verbindung fehlgeschlagen: ", mysqli_connect_error(); exit();}

                $sql= "SELECT anzahl FROM Besuche";
                $stmt = mysqli_prepare($link, $sql);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if(!$result) {
                    echo "Fehler während der Abfrage: ", mysqli_connect_error($link);
                    exit();
                }
                $row=mysqli_fetch_assoc($result);
                echo $row["anzahl"];

                mysqli_free_result($result);
                mysqli_close($link); ?>

                Besuche</div>
            <div class="grid-item">
                <?php
                $Newsletter = fopen("Anmeldung.txt", 'r');//öffnet Anmeldung.txt Datei und liest diese

                $Neuladen = null;
                while ($line=fgets($Newsletter)){
                    $Neuladen = explode(";",$line); //der Array wird in der Anmeldung.txt Datei mit Semikolons getrennt
                }
                sizeof($Neuladen);
                $cnt = 0;
                foreach ($Neuladen as $item){
                    $cnt++; //beim Neuladen der Seite wird der Zähler erhöht
                }

                echo $cnt; //Zahl wird hier anschließend ausgegeben
                ?>
                Anmeldungen zum Newsletter

            </div>
            <div class="grid-item"> <?php
                $link=mysqli_connect( hostname: "localhost", username: "root", password: "newrootpassword", database: "emensawerbeseite");
                if (!$link) { echo "Verbindung fehlgeschlagen: ", mysqli_connect_error(); exit();}


                $sql= "SELECT COUNT(*) FROM gericht";
                $stmt = mysqli_prepare($link, $sql);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if(!$result) {
                    echo "Fehler während der Abfrage: ", mysqli_connect_error($link);
                    exit();
                }
                $row=mysqli_fetch_assoc($result);
                echo $row["COUNT(*)"];

                mysqli_free_result($result);
                mysqli_close($link);



                ?> Speisen</div> <!--Zählt die Anzahl der vorhandenen Gerichte -->

        </div>
        <br>
        <br>
        <a href="wunschgericht.php" method="GET"> Hier geht's zum Wunschgericht</a>
    </section>
    <section class="kontakt">
        <h2 id="Kontakt"> Interesse geweckt? Wir informieren Sie!</h2>
        <form method="post">
            <div class="grid-container2">

                <div class="grid-item2">
                    <label for="Name" >Ihr Name:</label>
                    <input required type="text"  name="name" maxlength="30" id="Name" placeholder="Vorname" size="20">
                </div>
                <div class="grid-item2">
                    <label for="email" > Ihre E-Mail:</label> <br>
                    <input type="text" name="email" maxlength="30" id="email"  size="20">
                </div>
                <div class="grid-item2">
                    <label for="Sprache">Newsletter bitte in:</label>
                    <select id="Sprache" name="Sprache">
                        <option value="de">Deutsch</option>
                        <option value="en">Englisch</option>
                    </select></div>
            </div>

            <br>
            <label>
                <input required type="checkbox">
            </label>Den Datenschutzbestimmungen stimme ich zu <br>
            <div class="button">
                <input type="submit" name= "submit" value="Zum Newsletter anmelden">
            </div>
            <?php
            if (isset($_POST["submit"])){
                $trashmails=["@rcpt.at","@damnthespam.at", "@wegwerfmail.de", "@trashmail."];
                $fehler=false;
                $email=$_POST["email"]??null;
                $name=$_POST["name"]??null;
                if (!$email ){
                    echo "Bitte geben sie eine Email ein"; $fehler=true;
                }elseif ($email && !filter_var($email,FILTER_VALIDATE_EMAIL)){
                    echo "Bitte geben sie eine richtige Email ein"; $fehler=true;
                }else {
                    foreach ($trashmails as $domain){
                        if (str_contains($email,$domain)){
                            echo "Bitte geben sie keine Trashmail an"; $fehler=true;
                        }
                    }

                }
                if(!$name){
                    echo "Bitte geben sie einen Namen ein"; $fehler=true;
                } elseif ($name && !ctype_alpha($name)){
                    echo "Bitte geben sie einen richtigen Namen ein"; $fehler=true;
                }
                if (!$fehler){
                    $file=fopen("Anmeldung.txt", "a");
                    fwrite($file, htmlspecialchars($email) . ";" . htmlspecialchars($name));
                }
            }
            //Prüft, ob die E-Mail und der Name korrekt eingegeben wurde;
            ?>
        </form>

    </section>
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
        Brosowski &amp; Dreshaj | <a href="impressum"> Impressum</a>
    </div>
</footer>
</body>

</html>

