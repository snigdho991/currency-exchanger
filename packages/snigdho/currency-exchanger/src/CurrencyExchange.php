<?php

namespace Snigdho\CurrencyExchange;

use Illuminate\Support\Facades\Http;

class CurrencyExchange {
    public function currency_converter($amount, $currency) {
        
        $xmlString = file_get_contents('https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
        $xmlObject = simplexml_load_string($xmlString);
                
        $json = json_encode($xmlObject);
        $array = json_decode($json, true);

        $attrs = [];
        $a_two = [];
        $a_three = [];

        foreach ($array['Cube'] as $key => $value) {
            $attrs[$key] = $value;

            foreach($attrs[$key] as $k => $v) {
                $a_two[$k] = $v;

            }
        }

        foreach($a_two['Cube'] as $k_two => $v_two) {
            $a_three[$k_two] = $v_two;
        }

        $a_three = array_map('current', $a_three);

        foreach($a_three as $check_currency) {
            if($check_currency['currency'] == $currency) {
                $total = $amount * $check_currency['rate'];
            }
        }

        dd($total);

    }
}