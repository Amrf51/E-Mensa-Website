<?php
function db_get_user_data($email){
    $link = connectdb();

    $sql = "SELECT * FROM benutzer WHERE email = '$email'";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}
function inkrement_anmeldung($email){
    $link = connectdb();
    mysqli_begin_transaction($link);

    $sql= "SELECT id FROM benutzer where email = '$email' " ;
    $result = mysqli_query($link, $sql);
    $id = mysqli_fetch_all($result,MYSQLI_ASSOC)[0]['id'];
    $sql2 = "call anzahlanmeldungen('$id')";
    mysqli_query($link,$sql2);
    mysqli_commit($link);
    mysqli_close($link);

}

function update_letzteanmeldung ($email){
    $link = connectdb();
    mysqli_begin_transaction($link); //

    $sql= "update benutzer set letzteanmeldung = now() where email = '$email' " ;
    $result = mysqli_query($link, $sql);

    mysqli_commit($link);
    mysqli_close($link);

}
function letzterfehler ($email){
    $link = connectdb();
    mysqli_begin_transaction($link);

    $sql= "update benutzer set letzterfehler = now() where email = '$email' " ;
    $result = mysqli_query($link, $sql);

    mysqli_commit($link);
    mysqli_close($link);

}
function db_benutzer_suchen($email, $passwort){
    $link = connectdb();

    $sql = "SELECT * FROM benutzer WHERE email = '$email'";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);
    if (empty($data)){
        return false;
    }elseif (password_verify($passwort, $data [0]['passwort'])){
        return true;

    }
    return false;

    mysqli_close($link);
}
function get_name($email){
    $link = connectdb();

    $sql = "SELECT * FROM benutzer WHERE email = '$email'";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data[0] ['name'];
}