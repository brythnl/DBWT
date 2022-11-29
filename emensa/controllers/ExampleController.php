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
        ));
    }

    public function m4_7b_kategorie() {
        $names = db_kategorie_select_name_asc();
        return view('examples.m4_7b_kategorie', 
            array(
            'names'=>$names    
        ));
    }

    public function m4_7c_gerichte() {
        $names_prices = db_gericht_select_namedesc_inpreis_over2();
        return view('examples.m4_7c_gerichte', 
            array(
            'names_prices'=>$names_prices
        ));
    }

    public function m4_7d_layout(RequestData $rd) { 
        return ($rd->query['no'] == 2 ? 
            view('examples.pages.m4_7d_page_2', array('title'=>2)) : 
            view('examples.pages.m4_7d_page_1', array('title'=>1))
        ); 
    }
}
