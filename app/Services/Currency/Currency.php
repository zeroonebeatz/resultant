<?php

namespace App\Services\Currency;


class Currency
{
    protected $loader;

    function __construct(CurrencyLoaderInterface $loader)
    {
        $this->loader = $loader;
    }

    public function all()
    {
        return $this->loader->all();
    }
}