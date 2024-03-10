<?php
/**
 * Diese Datei enthält alle SQL Statements für die Tabelle "gerichte"
 */
function db_gericht_select_all() {
    $link = connectdb();

    $sql = "SELECT id, name, beschreibung FROM gericht ORDER BY name";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}
function db_gericht_select_name_price() {
    $link = connectdb();

    $sql = "SELECT  name, preis_intern FROM gericht WHERE preis_intern >= '2,00' ORDER BY name DESC";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}
function db_gericht_select_gericht(){
    $link = connectdb();

    $sql="SELECT id, name, preis_intern, preis_extern,bildname, GROUP_CONCAT(code) AS allergen
            FROM  gericht INNER JOIN gericht_hat_allergen
            on gericht.id=gericht_hat_allergen.gericht_id
            GROUP BY name 
            ORDER BY name 
            limit 5";

    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($link);
    return $data;

}

function db_gericht_select_namebild($id){
    $link = connectdb();

    $sql="SELECT name, bildname FROM  gericht
where id='$id'";

    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($link);
    return $data;

}
function db_bewertung_insert($test,$gerichtid, $rating, $comment){
    $link = connectdb();

    $sql="INSERT  INTO Bewertung (UserID,DishID,Kommentar,SterneBewertung)VALUES ( '$test','$gerichtid','$comment','$rating')";

    $result= mysqli_query($link,$sql);

    mysqli_close($link);
}
