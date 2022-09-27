<?php

use Snigdho\CurrencyExchange\Controllers\CurrencyExchangeController;
use Illuminate\Support\Facades\Route;

Route::get('/{amount}/{currency}', [CurrencyExchangeController::class, 'trigger_converter']);