<?php

function insert_bewertung($userid, $gericht_id, $rating, $bewertung)
{
    $link = connectdb();
    $test = (int)$userid;
    $sql = " INSERT  INTO bewertung (UserID,DishID,Kommentar,SterneBewertung)VALUES ( $test,$gericht_id,'$bewertung', '$rating')";
    $result = mysqli_query($link, $sql);
    mysqli_close($link);
}

function db_bewertung($id)
{
    $link = connectdb();
    $sql = "SELECT *  FROM gericht WHERE id= '$id'";
    $result = mysqli_query($link, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_BOTH);
    mysqli_close($link);
    return $data;
}