<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');

class ExampleController
{
    // call views of respective examples
    public function m4_7a_queryparameter(RequestData $rd) {
        return view('examples.m4_7a_queryparameter', 
           array( 
            'query_param'=>$rd->query['name'],
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

    public function m4_7c_gerichte(RequestData $rd) {
        $names_prices = db_gericht_select_namedesc_inpreis_over2();
        return view('examples.m4_7c_gerichte', array(
            'request'=>$rd,
            'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}",
            'names_prices'=>$names_prices
        ));
    }

    public function m4_7d_page_1(RequestData $rd) {
        
    }

    public function m4_7d_page_2(RequestData $rd) {
    
    }
}
