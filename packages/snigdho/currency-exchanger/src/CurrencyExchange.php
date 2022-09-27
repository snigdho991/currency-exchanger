<?php

namespace Snigdho\CurrencyExchange;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CurrencyExchange {
    public function CurrencyConverter($amount, $currency) {

        $url = 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") ); 

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $xmlString = curl_exec ($ch);
        curl_close ($ch);
        
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