<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');

class ExampleController
{
    // call views of respective examples
    public function m4_7a_queryparameter(RequestData $rd) {
        return view('examples.m4_7a_queryparameter', 
           array( 
            'request'=>$rd,
            'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}",
        ));
    }

    public function m4_7b_kategorie(RequestData $rd) {
        $names = db_kategorie_select_name_asc();
        return view('examples.m4_7b_kategorie', 
            array(
            'request'=>$rd,
            'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}",
            'names'=>$names    
        ));
    }

    public function m4_7c_gericht(RequestData $rd) {
        return view('examples.m4_7c_gericht', array(
            'request'=>$rd,
            'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}",
        ));
    }
}
