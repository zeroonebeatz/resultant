<?php

namespace App\Services\Currency;

use GuzzleHttp\Client;

class CurrencyLoaderFromApi implements CurrencyLoaderInterface
{
    use CurrencyTrait;

    protected $url;
    protected $rawData;
    protected $data = [];

    /**
     * LoadCurrencyFromApi constructor.
     * @param $url string
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function all()
    {
        return $this
            ->load()
            ->setData()
            ->getData();

    }

    protected function load()
    {
        $client = new Client();
        $res = $client->get($this->url);
        $res->getBody();

        $this->rawData = json_decode((string)$res->getBody());

        return $this;
    }

    protected function setData() //TODO refactor
    {
        if (isset($this->rawData->stock) && !empty($this->rawData->stock)){
            $this->data = $this->prepareData($this->rawData->stock);
        }

        return $this;
    }

    protected function prepareData(array $data)
    {
        $prepared = array_reduce($data, function($carry, $item){
            $carry[] = [
              'name' => $item->name,
              'amount' => $this->prepareAmount($item->price->amount),
              'volume' => $this->prepareVolume($item->volume),
            ];

            return $carry;
        });

        return $prepared;
    }

    protected function getData()
    {
        return $this->data;
    }
}