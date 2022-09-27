<?php

namespace Snigdho\CurrencyExchange\Controllers;

use Illuminate\Http\Request;
use Snigdho\CurrencyExchange\CurrencyExchange;

class CurrencyExchangeController
{
    public function trigger_converter(CurrencyExchange $exchange, Request $request) {

        $amount  = $request->amount;
        $currency = $request->currency;
        
        $currency_convert = $exchange->CurrencyConverter($amount, $currency);

        return view('currency-exchanger::show', compact('currency_convert', 'currency', 'amount'));
    }
}
