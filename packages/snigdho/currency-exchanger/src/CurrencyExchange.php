<?php

namespace Snigdho\CurrencyExchange;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CurrencyExchange {
    public function CurrencyConverter($amount, $currency) {

        $xmlString = file_get_contents('https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
        $xmlObject = simplexml_load_string($xmlString);
                
        $json = json_encode($xmlObject);
        $array = json_decode($json, true);

        $attrs = [];
        $a_two = [];

        $total = '';


        foreach ($array['Cube'] as $key => $value) {
            $attrs[$key] = $value;

            $single = array_reduce($array['Cube'], 'array_merge', array());
            $a_two  = array_column($single['Cube'], '@attributes');

        }


        foreach($a_two as $check_currency) {
                
            if ($check_currency['currency'] == strtoupper($currency)) {
                $total = $amount * $check_currency['rate'];
            }


        }

        return $total;


    }
}