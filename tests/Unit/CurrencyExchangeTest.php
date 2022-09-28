<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;


class CurrencyExchangeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_rest_api_is_valid()
    {
        $response =  $this->get('/'.request()->amount.'/'.request()->currency);
        $this->assertEquals(200, $response->status());

    }
}
