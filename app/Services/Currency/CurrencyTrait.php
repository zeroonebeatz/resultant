<?php

namespace App\Services\Currency;


trait CurrencyTrait
{
    protected function prepareAmount($amount)
    {
        return number_format($amount, 2, ',', '');
    }

    protected function prepareVolume($volume)
    {
        return (int)$volume;
    }
}