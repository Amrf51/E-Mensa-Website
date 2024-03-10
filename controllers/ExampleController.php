<?php
require_once('../models/gericht.php');
require_once('../models/kategorie.php');

class ExampleController
{
    public function m4_7a_queryparameter(RequestData $rd) {
        $name = $rd->query['name'] ?? 'Es wurde kein Name abgefragt';
        return view('examples.m4_7a_queryparameter', ['data' => $name]);
    }
    public function m4_7b_kategorie () {
        $data = db_kategorie_select_name();
        return view('examples.m4_7b_kategorie',['data' => $data]);
    }
    public function m4_7c_gerichte() {
        $data=db_gericht_select_name_price();
        return view('examples.m4_7c_gerichte',['ernesto' => $data]);
    }
    public function m4_7d_page_1() {

        return view('pages.m4_7d_page_1');
    }
    public function m4_7d_page_2() {

        return view('pages.m4_7d_page_2');
    }
    public function m4_7d_layout(RequestData $rd){
        $no= ['no'=>$rd->query['no']?? '1',
        ];
        if(isset($rd->query['no'])) {
            if ($rd->query['no'] == "1"){
                return view('pages.m4_7d_page_1', $no);
            }
            if ($rd->query['no'] == "2") {
                return view('pages.m4_7d_page_2', $no);
            }
        }
        return view('pages.m4_7d_page_1', $no);
    }
    public function Hauptseite_layout() {
        return view('pages.Emensa', ['data' => []]);
    }
    public function gerichteuebersicht() {
        $data=db_gericht_select_gericht();
        return view('pages.Emensa', ['data' => $data]);
    }
    }