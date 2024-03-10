<?php
/**
 * Mapping of paths to controlls.
 * Note, that the path only support 1 level of directory depth:
 *     /demo is ok,
 *     /demo/subpage will not work as aspected
 */
return array(
    "/"            => "HomeController@index",
    "/demo"        => "DemoController@demo",
    '/dbconnect'   => 'DemoController@dbconnect',

    // Erstes Beispiel:
    '/m4_7a_queryparameter' => "ExampleController@m4_7a_queryparameter",
    '/m4_7b_kategorie' => 'ExampleController@m4_7b_kategorie',
    '/m4_7c_gerichte' => 'ExampleController@m4_7c_gerichte',
    '/m4_7d_page_1'=> 'ExampleController@m4_7d_page_1',
    '/m4_7d_page_2'=> 'ExampleController@m4_7d_page_2',
    '/m4_7d_layout' => 'ExampleController@m4_7d_layout',
    '/Hauptseite_layout' => 'ExampleController@Hauptseite_layout',
    '/Hauptseite_layout' => 'ExampleController@gerichteuebersicht',
    '/anmeldung'=>'HomeController@anmeldung',
    '/anmeldung_verifizieren'=>'AnmeldungsController@anmeldungVerifizieren',
    '/abmeldung' => 'AnmeldungsController@abmeldung',
    '/bewertung'=> 'AnmeldungsController@bewertung',
    '/bewertungen' => 'AnmeldungsController@bewertungen',
    '/meinebewertungen' => 'AnmeldungsController@meinebewertungen',
    '/loeschen' => 'AnmeldungsController@loeschen',
    '/hervorheben' => 'AnmeldungsController@hervorheben',
    '/hervorheben_aufheben' => 'AnmeldungsController@hervorheben_aufheben'

);